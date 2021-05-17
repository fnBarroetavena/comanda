<?php
// "producto": {
//     "id": "int", //auto
//     "tipo": "string", //["bebida", "comida"]
//     "nombre": "string" //["vino", "cerveza", "empanadas", etc...]
// },
class Producto{
    private $id;
    private $nombre;
    private $tipo;
    
    public function __construct($id, $nombre, $tipo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function GetId(){
        return $this->id;
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function GetNombre(){
        return $this->nombre;
    }

    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }

    public function GetTipo(){
        return $this->tipo;
    }

    public function SetTipo($tipo){
        $this->tipo = $tipo;
    }
}

?>