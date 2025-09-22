<?php
class Auto
{
    private $patente;
    private $marca;
    private $modelo;
    private $duenio; // objeto Persona
    private $mensajeoperacion;

    public function __construct()
    {
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->duenio = null;
    }

    public function setear($patente, $marca, $modelo, $objPersona)
    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDuenio($objPersona);
    }

    // Getters y Setters
    public function getPatente()
    {
        return $this->patente;
    }
    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    public function getMarca()
    {
        return $this->marca;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getDuenio()
    {
        return $this->duenio;
    }
    public function setDuenio($duenio)
    {
        $this->duenio = $duenio;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($mensaje)
    {
        $this->mensajeoperacion = $mensaje;
    }

    // --- MÉTODOS BASE DE DATOS ---
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente = '" . $this->getPatente() . "'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($row = $base->Registro()) {
                    $objPersona = new Persona();
                    $objPersona->setNroDni($row['DniDuenio']);
                    $objPersona->cargar();

                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objPersona);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("Auto->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO auto(Patente, Marca, Modelo, DniDuenio) 
                VALUES('" . $this->getPatente() . "','" . $this->getMarca() . "'," . $this->getModelo() . ",'" . $this->getDuenio()->getNroDni() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET Marca='" . $this->getMarca() . "', Modelo=" . $this->getModelo() . ",
                DniDuenio='" . $this->getDuenio()->getNroDni() . "' WHERE Patente='" . $this->getPatente() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente='" . $this->getPatente() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = [];
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto ";
        if ($parametro != "") {
            $sql .= " WHERE " . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            while ($row = $base->Registro()) {
                $objPersona = new Persona();
                $objPersona->setNroDni($row['DniDuenio']);
                $objPersona->cargar();

                $obj = new Auto();
                $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objPersona);
                array_push($arreglo, $obj);
            }
        }
        return $arreglo;
    }
}
