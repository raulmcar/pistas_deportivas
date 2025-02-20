<?php
    require_once('bd.php');

    class Polideportivo{
        private string $nombre;
        private string $direccion;
        private string $extension;

        public function __construct(string $nombre, string $direccion, string $extension){
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->extension = $extension;
        }

        public function __destruct(){
            $this->nombre = "";
            $this->direccion = "";
            $this->extension = "";
        }

        public function registrarPolideportivo(){
            $registro = false;

            try{
                $pdo = new BD();
                $bdConexion = $pdo->getPDO();

                $consulta = $bdConexion->prepare("INSERT INTO polideportivo(nombre, direccion, extension)
                    VALUES (?,?,?)");

                $consulta->bindParam(1, $this->nombre);
                $consulta->bindParam(2, $this->direccion);
                $consulta->bindParam(3, $this->extension);

                $consulta->execute();
                $registro = true;
                return $registro;
            }
            catch(PDOException $e){
                echo "Error al insertar los datos del polideportivo: " . $e->getMessage();

                return $registro;
            }
        }

        public function comprobarPolideportivo(string $nombrePolideportivo){
            $existe = false;

            try{
                $pdo = new BD();
                $bdConexion = $pdo->getPDO();
                $consulta = $bdConexion->prepare("SELECT nombre FROM polideportivo WHERE nombre = '$nombrePolideportivo'");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();

                $fila = $consulta->fetch();

                if($fila){
                    $existe = true;
                } else {
                    $existe = false;
                }
            }
            catch(PDOException $e){
                echo "Error al consultar los datos: " . $e->getMessage();
            }

            return $existe;
        }

        public static function desplegarPolideportivo(){

            try{
                $pdo = new BD();
                $bdConexion = $pdo->getPDO();
                $consulta = $bdConexion->prepare("SELECT id_polideportivo, nombre FROM polideportivo");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();

                $polideportivos = [];

                while ($polideportivo = $consulta->fetch()){
                    $polideportivos[] = $polideportivo;
                }

                return $polideportivos;
            }
            catch(PDOException $e){
                echo "Error al mostrar los polideportivos " . $e->getMessage();
                return $polideportivos = [];
            }
        }


    }
?>