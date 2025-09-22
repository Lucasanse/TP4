<?php
class AbmAuto
{

    /**
     * Carga un objeto Auto con todos los datos
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('patente', $param) && array_key_exists('marca', $param) && array_key_exists('modelo', $param) && array_key_exists('nroDni', $param)) {
            $objPersona = new Persona();
            $objPersona->setNroDni($param['nroDni']);
            $objPersona->cargar();

            $obj = new Auto();
            $obj->setear($param['patente'], $param['marca'], $param['modelo'], $objPersona);
        }
        return $obj;
    }

    /**
     * Carga un objeto Auto solo con la clave (patente)
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['patente'])) {
            $obj = new Auto();
            $obj->setPatente($param['patente']);
            $obj->cargar();
        }
        return $obj;
    }

    /**
     * Verifica que esté seteada la clave primaria
     */
    private function seteadosCamposClaves($param)
    {
        return isset($param['patente']);
    }

    // ------------------ ABM ------------------

    public function alta($param)
    {
        $resp = false;

        // Verificar si ya existe la patente
        $existe = $this->buscar(['patente' => $param['patente']]);
        if (count($existe) <= 0) {
            // Ya existe la patente, no inserto
            $elObjAuto = $this->cargarObjeto($param);
            if ($elObjAuto != null && $elObjAuto->insertar()) {
                $resp = true;
            }
        }

        return $resp;
    }


    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjAuto = $this->cargarObjetoConClave($param);
            if ($elObjAuto != null && $elObjAuto->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjAuto = $this->cargarObjeto($param);
            if ($elObjAuto != null && $elObjAuto->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param != NULL) {
            if (isset($param['patente']))
                $where .= " and Patente ='" . $param['patente'] . "'";
            if (isset($param['marca']))
                $where .= " and Marca ='" . $param['marca'] . "'";
            if (isset($param['modelo']))
                $where .= " and Modelo =" . $param['modelo'];
            if (isset($param['DniDuenio']))
                $where .= " and DniDuenio ='" . $param['DniDuenio'] . "'";
        }
        $objAuto = new Auto();
        $arreglo = $objAuto->listar($where);
        return $arreglo;
    }
}
