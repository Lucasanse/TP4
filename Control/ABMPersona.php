<?php
class AbmPersona
{

    /**
     * Carga un objeto Persona con todos los datos
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('nroDni', $param) && array_key_exists('nombre', $param) && array_key_exists('apellido', $param)) {
            $obj = new Persona();
            $obj->setear(
                $param['nroDni'],
                $param['apellido'],
                $param['nombre'],
                $param['fechaNac'] ?? null,
                $param['telefono'] ?? null,
                $param['domicilio'] ?? null
            );
        }
        return $obj;
    }

    /**
     * Carga un objeto Persona solo con la clave (nroDni)
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['nroDni'])) {
            $obj = new Persona();
            $obj->setear($param['nroDni'], null, null, null, null, null);
        }
        return $obj;
    }

    /**
     * Verifica que esté seteada la clave primaria
     */
    private function seteadosCamposClaves($param)
    {
        $resp = false;

        if (is_array($param)) {
            if (isset($param['nroDni'])) {
                $resp = true;
            }
        } elseif (is_object($param) && method_exists($param, 'getNroDni')) {
            if ($param->getNroDni()) {
                $resp = true;
            }
        }

        return $resp;
    }


    // --- CRUD ---
    public function alta($param)
    {
        $resp = false;

        // Verificar si ya existe el DNI
        $existe = $this->buscar(['nroDni' => $param['nroDni']]);
        if (count($existe) <= 0) {
            // No existe, entonces lo inserto
            $objPersona = $this->cargarObjeto($param);
            if ($objPersona != null && $objPersona->insertar()) {
                $resp = true;
            }
        }

        return $resp;
    }


    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona != null && $elObjtPersona->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtPersona = $this->cargarObjeto($param);
            if ($elObjtPersona != null && $elObjtPersona->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param != NULL) {
            if (isset($param['nroDni']))
                $where .= " and nroDni ='" . $param['nroDni'] . "'";
            if (isset($param['apellido']))
                $where .= " and apellido ='" . $param['apellido'] . "'";
            if (isset($param['nombre']))
                $where .= " and nombre ='" . $param['nombre'] . "'";
        }
        $arreglo = Persona::listar($where);
        return $arreglo;
    }
}
