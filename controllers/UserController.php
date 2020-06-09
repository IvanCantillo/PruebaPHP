<?php 
    require_once ('models/UserModel.php');
    class UserController {

        public $message;

        public function index() {
            session_start();
            if( isset( $_SESSION['usuario']['id'] ) ){
                header('location: '. URL_BASE .'inicio/index/');
            }else{
                require_once ('views/index.php');
            }
        }
        public function response( $message ){
            return [
                'message' => $message
            ];
        }
        public function register() {
            session_start();
            if( isset( $_SESSION['usuario']['id'] ) ){
                header('location: '. URL_BASE .'inicio/index/');
            }else{
                require_once ('views/register.php');
            }
        }
        public function signIn() {
            if( isset( $_POST['email'] ) ){
                $objUser = new UserModel();
                $objUser->setEmail( $_POST['email'] );
                $objUser->setPassword( $objUser->password_encrypt( $_POST['password'] ) );
                $resLogin = $objUser->login();
                if( $resLogin != 'user-not-exist' ){
                    $this->message = 'ok';
                    session_start();
                    $_SESSION['usuario'] = [
                        'id' => $resLogin['id'],
                        'nombre' => $resLogin['nombre'] . ' ' . $resLogin['apellido'],
                        'rol' => $resLogin['fk_rol']
                    ];
                }else{
                    $this->message = $resLogin;
                }
                echo json_encode( $this->response( $this->message ) );
            }
        }
        public function signUp() {
            if( isset( $_POST['email'] ) ){
                $objUser = new UserModel();
                $objUser->setNombre( $_POST['nombre'] );
                $objUser->setApellido( $_POST['apellido']  );
                $objUser->setTelefono( $_POST['telefono'] );
                $objUser->setTipo_documento( $_POST['tipo_documento']  );
                $objUser->setNumero_documento( $_POST['numero_documento']  );
                $objUser->setEmail( $_POST['email']  );
                $objUser->setPassword( $objUser->password_encrypt( $_POST['password']  ) );

                $resRegister = $objUser->register();

                if( $resRegister != 'user-exist' ){
                    $this->message = 'ok';
                    $resLogin = $objUser->login();
                    session_start();
                    $_SESSION['usuario'] = [
                        'id' => $resLogin['id'],
                        'nombre' => $resLogin['nombre'] . ' ' . $resLogin['apellido'],
                        'rol' => $resLogin['fk_rol']
                    ];
                }else {
                    $this->message = $resRegister;
                }
                echo json_encode( $this->response( $this->message ) );
            }
        }
        public function salir() {
            session_start();
            session_destroy();
            header('location: '. URL_BASE .'user/index/');
        }
    }