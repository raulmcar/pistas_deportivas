<?php
require_once('bd.php');


    class Usuario{
        private string $nombre;
        private string $apellidos;
        private string $email;
        private string $contrasena;
        private string $telefono;
        private string $dni;
        private string $fecha_nacimiento;
        private ?string $tipo_usuario;

        public function __construct(string $nombre, string $apellidos, string $email, string $contrasena, string $telefono, string $dni, string $fecha_nacimiento){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->contrasena = password_hash($contrasena, PASSWORD_BCRYPT);
            $this->telefono = $telefono;
            $this->dni = $dni;
            $this->fecha_nacimiento = $fecha_nacimiento;
            $this->tipo_usuario = null;
        }

        public function __destruct(){
            $this->nombre = "";
            $this->apellidos = "";
            $this->email = "";
            $this->contrasena = "";
            $this->telefono = "";
            $this->dni = "";
            $this->fecha_nacimiento = "";
            $this->tipo_usuario = "";
        }

        public function registrarCliente(){
            $registro = false;

            try{
                $pdo = new BD();

                $bdConexion = $pdo->getPDO();
        
                $consulta = $bdConexion->prepare("INSERT INTO usuario(nombre, apellidos, email, contrasena, telefono, dni, fecha_nacimiento)
                    VALUES (?,?,?,?,?,?,?)");

                $consulta->bindParam(1, $this->nombre);
                $consulta->bindParam(2, $this->apellidos);
                $consulta->bindParam(3, $this->email);
                $consulta->bindParam(4, $this->contrasena);
                $consulta->bindParam(5, $this->telefono);
                $consulta->bindParam(6, $this->dni);
                $consulta->bindParam(7, $this->fecha_nacimiento);

                $consulta->execute();

                $registro = true;

                return $registro;
            } 
            catch(PDOException $e){
                echo "Error al insertar los datos: " . $e->getMessage();

                return $registro;
            }
        }

        public function comprobarCorreo(string $email){
            $existe = false;

            try{
                $pdo = new BD();

                $bdConexion = $pdo->getPDO();

                $consulta = $bdConexion->prepare("SELECT email FROM usuarios");

                $consulta->setFetchMode(PDO::FETCH_ASSOC);

                $consulta->execute();

                $listaEmails = [];

                while ($fila = $consulta->fetch()) {
                    $listaEmails[] = $fila['email'];
                }

                foreach ($listaEmails as $correo) {
                    if ($correo === $email) {
                        $existe = true;
                        break; 
                    }
                }
            }
            catch(PDOException $e){
                echo "Error al consultar los datos: " . $e->getMessage();
            }

            return $existe;
        }
    }
    


?>