<?php 
    require_once ('config/Conexion.php');
    class UserModel {
        private $id;
        private $nombre;
        private $apellido;
        private $telefono;
        private $tipo_documento;
        private $numero_documento;
        private $email;
        private $password;
        private $fk_rol;
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
    
        public function getNombre(){
            return $this->nombre;
        }
    
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    
        public function getApellido(){
            return $this->apellido;
        }
    
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
    
        public function getTelefono(){
            return $this->telefono;
        }
    
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
    
        public function getTipo_documento(){
            return $this->tipo_documento;
        }
    
        public function setTipo_documento($tipo_documento){
            $this->tipo_documento = $tipo_documento;
        }
    
        public function getNumero_documento(){
            return $this->numero_documento;
        }
    
        public function setNumero_documento($numero_documento){
            $this->numero_documento = $numero_documento;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function setPassword($password){
            $this->password = $password;
        }

        public function getFk_rol(){
            return $this->fk_rol;
        }
    
        public function setFk_rol($fk_rol){
            $this->fk_rol = $fk_rol;
        }

        // ------------------

        public function login() {
            $sqlEmail = 'SELECT * FROM usuarios WHERE email = :email';
            $email = $this->conexion->prepare( $sqlEmail );
            $email->execute( array( ":email" => $this->email ) );
            if ($email->rowCount() > 0) {
                $sqlLogin = $sqlEmail .= " AND password = :password";
                $login = $this->conexion->prepare( $sqlLogin );
                $login->execute( array( ":email" => $this->email, ':password' => $this->password ) );
                return $login->fetch( PDO::FETCH_ASSOC );
            }else {
                return 'user-not-exist';
            }
        }

        public function password_encrypt( $password ){
            return hash("sha256", $password);
        }

        public function register() {
            $sqlEmail = 'SELECT * FROM usuarios WHERE email = :email';
            $email = $this->conexion->prepare( $sqlEmail );
            $email->execute( array( ":email" => $this->email ) );
            if( $email->rowCount() > 0 ){
                return 'user-exist';
            }else {
                $sqlRegister = 'INSERT INTO `usuarios`(`nombre`, `apellido`, `telefono`, `tipo_documento`, `numero_documento`, `email`, `password`, `fk_rol`) VALUES (:nom, :ape, :tel, :tipo_doc, :num_doc, :email, :pass, 1)';
                $register = $this->conexion->prepare( $sqlRegister );
                $register->execute(  array( ':nom' => $this->nombre, ':ape' => $this->apellido, ':tel' => $this->telefono, ':tipo_doc' => $this->tipo_documento, ':num_doc' => $this->numero_documento, ':email' => $this->email, ':pass'=> $this->password) );
            }
        }

    }