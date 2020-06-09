<?php 
require_once ('models/CasoModel.php');
    class InicioController {
        public function index() {
            session_start();
            if( !isset( $_SESSION['usuario']['id'] ) ){
                header('location: '. URL_BASE .'user/index/');
            }
            $objCasos = new CasoModel();
            $objCasos->setFk_usuario( $_SESSION['usuario']['id'] );
            $resCasos = $objCasos->getAllCasos();
            require_once ('views/home.php');
        }
        public function crear( ) {
            session_start();
            if( isset( $_POST['direccion'] ) ){
                $objCaso = new CasoModel();
                $objCaso->setDireccion( $_POST['direccion'] );
                $objCaso->setMotivo( $_POST['motivo'] );
                $objCaso->setFk_usuario( $_SESSION['usuario']['id'] );
                $objCaso->create();
                header('location: '. URL_BASE . 'inicio/index/');
            }
        }

        public function eliminar( $id ) {
            session_start();
            $objCaso = new CasoModel();
            $objCaso->setId( $id );
            $objCaso->delete();
            header('location: '. URL_BASE . 'inicio/index/');
        }

        public function actualizar( $id ) {
            session_start();
            if( !isset( $_SESSION['usuario']['id'] ) ){
                header('location: '. URL_BASE .'user/index/');
            }
            $objCaso = new CasoModel();
            $objCaso->setId( $id );
            $objCaso->setFk_usuario( $_SESSION['usuario']['id'] );
            $resCaso = $objCaso->getCasosById( $id );
            require_once ('views/actualizar.php');
        }

        public function update( $id ) {
            session_start();
            $objCaso = new CasoModel();
            $objCaso->setId( $id );
            $objCaso->setMotivo( $_POST['motivo'] );
            $objCaso->setDireccion( $_POST['direccion'] );
            $objCaso->update();
            header('location: '. URL_BASE . 'inicio/index/');
        }

    }