<?php 
    require_once ('config/Conexion.php');
    class CasoModel {
        private $id;
        private $direccion;
        private $motivo;
        private $fk_usuario;
        private $conexion;

        public function __construct(){
            $this->conexion = Conexion::Conectar();
        }

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getDireccion(){
            return $this->direccion;
        }
    
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
    
        public function getMotivo(){
            return $this->motivo;
        }
    
        public function setMotivo($motivo){
            $this->motivo = $motivo;
        }

        public function getFk_usuario(){
            return $this->fk_usuario;
        }
    
        public function setFk_usuario($fk_usuario){
            $this->fk_usuario = $fk_usuario;
        }
         
        // --------------------------

        public function getAllCasos() {
            $sqlCasos = 'SELECT casos.*, usuarios.fk_rol FROM casos INNER JOIN usuarios ON casos.fk_usuario = usuarios.id WHERE fk_rol = 2';
            $casos = $this->conexion->prepare( $sqlCasos );
            $casos->execute( array( ":fk_usuario" => $this->fk_usuario ) );
            return $casos;
        }

        public function getCasosById() {
            $sqlCasos = 'SELECT * FROM casos WHERE fk_usuario = :fk_usuario AND id = :id';
            $casos = $this->conexion->prepare( $sqlCasos );
            $casos->execute( array( ":fk_usuario" => $this->fk_usuario, ":id" => $this->id ) );
            return $casos->fetch( PDO::FETCH_ASSOC );
        }

        public function create() {
            $sqlCreate = 'INSERT INTO `casos`(`direccion`, `motivo`, `fk_usuario`) VALUES (:direccion, :motivo, :fk_usuario)';
            $create = $this->conexion->prepare( $sqlCreate );
            $create->execute( array( ":direccion" => $this->direccion, ':motivo' => $this->motivo, ":fk_usuario" => $this->fk_usuario ) );
            return $create;
        }

        public function delete() {
            $sqlDelete = 'DELETE FROM `casos` WHERE id = :id';
            $delte = $this->conexion->prepare( $sqlDelete );
            $delte->execute( array( ":id" => $this->id ) );
            return $delte;
        }

        public function update() {
            $sqlUpdate = 'UPDATE `casos` SET `direccion` = :dir,`motivo`= :moti WHERE id = :id';
            $update = $this->conexion->prepare( $sqlUpdate );
            $update->execute( array( ":dir" => $this->direccion, ":moti" => $this->motivo, ":id" => $this->id) );
            return $update;
        }

    }