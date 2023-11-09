<?php
require_once 'Model/persona.php';

class PersonaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Persona();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/persona.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Persona();
        
        if(isset($_REQUEST['Idproducto'])){
            $alm = $this->model->getting($_REQUEST['Idproducto']);
        }
        
        require_once 'View/header.php';
        require_once 'View/persona-editar.php';
        require_once 'View/footer.php';
    }
    
    public function Guardar(){
        $alm = new Persona();
        
        $alm->Idproducto = $_REQUEST['Idproducto'];
        $alm->caducidad = $_REQUEST['caducidad'];
        $alm->precio = $_REQUEST['precio'];
        $alm->tamano = $_REQUEST['tamano'];
        $alm->promocion = $_REQUEST['promocion'];
        $alm->distribuidora = $_REQUEST['distribuidora'];
        $alm->idSucursal = $_REQUEST['idSucursal'];
        $alm->nombreProduc = $_REQUEST['nombreProduc'];

        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

        $alm->Idproducto > 0 
           ? $this->model->Actualizar($alm)
           : $this->model->Registrar($alm);

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->Idproducto > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['Idproducto']);
        header('Location: index.php');
    }
}
