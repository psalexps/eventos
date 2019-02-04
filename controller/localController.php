<?php

include_once 'indexController.php';

class localController extends indexController{
    private $conectar;
    private $conexion;

    public function __construct(){
        require_once __DIR__ . '/../model/clases/Conexion.php';
        require_once __DIR__ . '/../model/clases/Local.php';

        $this->conectar = new Conexion();
        $this->conexion = $this->conectar->conexion();
    }

    public function index(){

        $local = new Local($this->conexion);

        $locales = $local->getAll();

        $this->render('localView',array(
            "locales" => $locales
        ));
    }

    public function crearLocal(){

        if (isset($_POST['nombre'])){

            $local = new Local($this->conexion);
            $local->setNombre($_POST['nombre']);
            $local->setCategoria($_POST['categoria']);
            $local->setDireccion($_POST['direccion']);
            $local->setTelefono($_POST['telefono']);
            $local->setEmail($_POST['email']);
            $local->insert();

        }

        header('Location: index.php?controller=local&action=index');

    }

    public function modificarLocal(){
        
        if (isset($_POST['nombre'])){

            $local = new Local($this->conexion);
            $local->setId($_POST['idLocal']);
            $local->setNombre($_POST['nombre']);
            $local->setCategoria($_POST['categoria']);
            $local->setDireccion($_POST['direccion']);
            $local->setTelefono($_POST['telefono']);
            $local->setEmail($_POST['email']);
            $local->update();

        }

    }

    public function eliminarLocal(){

        $local = new Local($this->conexion);
        $local->setId($_POST['idLocal']);
        $local->delete();

    }
}
