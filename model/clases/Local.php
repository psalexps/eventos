<?php

class Local{
    private $table = "locales";
    private $conexion;

    private $id;
    private $nombre;
    private $categoria;
    private $direccion;
    private $telefono;
    private $email;
    private $img;

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
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAll(){

        $select = $this->conexion->prepare("SELECT * FROM ".$this->table);
        $select->execute();
        $result = $select->fetchAll();
        $this->conexion = null;

        return $result;
    }

    public function getNameId(){

        $select = $this->conexion->prepare("SELECT idLocal,nombreLocal FROM ".$this->table);
        $select->execute();
        $result = $select->fetchAll();
        $this->conexion = null;

        return $result;
    }

    public function insert(){

        $insert = $this->conexion->prepare("INSERT INTO locales(nombreLocal,categoria,direccion,telefono,email)
                                            VALUES(:nombre,:categoria,:direccion,:telefono,:email)");

        $insert->execute(array(
            "nombre" => $this->nombre,
            "categoria" => $this->categoria,
            "direccion" => $this->categoria,
            "telefono" => $this->telefono,
            "email" => $this->email
        ));

        $this->conexion = null;
    }

    public function update(){

        $update = $this->conexion->prepare("UPDATE locales SET nombreLocal=:nombre,categoria=:categoria,direccion=:direccion,telefono=:telefono,email=:email WHERE idLocal=:id");

        $update->execute(array(
            "nombre" => $this->nombre,
            "categoria" => $this->categoria,
            "direccion" => $this->direccion,
            "telefono" => $this->telefono,
            "email" => $this->email,
            "id" => $this->id
        ));

        $this->conexion = null;
    }

    public function delete(){

        $delete = $this->conexion->prepare("DELETE FROM locales WHERE idLocal=:id");

        $delete->execute(array(
           "id" => $this->id
        ));

        $this->conexion = null;
    }

}