<?php

class Evento{
    private $table = "eventos";
    private $conexion;

    private $id;
    private $nombre;
    private $tipo;
    private $fecha;
    private $descripcion;
    private $img;

    private $local;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param mixed $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    public function insert(){

        $insert = $this->conexion->prepare("INSERT INTO eventos(nombre,tipo,fecha,descripcion,idLocal)
                                            VALUES(:nombre,:tipo,:fecha,:descripcion,:idLocal)");

        $insert->execute(array(
            "nombre" => $this->nombre,
            "tipo" => $this->tipo,
            "fecha" => $this->fecha,
            "descripcion" => $this->descripcion,
            "idLocal" => $this->local,
        ));

        $this->conexion = null;
    }

    public function getAll(){

        $select = $this->conexion->prepare("SELECT * FROM ".$this->table);
        $select->execute();
        $result = $select->fetchAll();
        $this->conexion = null;

        return $result;
    }
}