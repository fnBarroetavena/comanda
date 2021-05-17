<?php
// "mesa": {
//     "id": "int", //auto
//     "estado": "string", //["con cliente esperando pedido", "con cliente comiendo", "con cliente pagando", "cerrada"],
//     "foto?": "img",
//     "cuenta": "doble"
// },
class Mesa{
    private $id;
    private $estado;
    private $foto;
    private $cuenta;
    
    public function __construct($id, $estado, $foto, $cuenta)
    {
        $this->id = $id;
        $this->estado = $estado;
        $this->foto = $foto;
        $this->cuenta = $cuenta;
    }

    public function GetId(){
        return $this->id;
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function GetEstado(){
        return $this->estado;
    }

    public function SetEstado($estado){
        $this->estado = $estado;
    }

    public function GetFoto(){
        return $this->foto;
    }

    public function SetFoto($foto){
        $this->foto = $foto;
    }

    public function GetCuenta(){
        return $this->cuenta;
    }

    public function SetCuenta($cuenta){
        $this->cuenta = $cuenta;
    }
}

?>