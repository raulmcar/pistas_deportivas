<?php
    require_once('bd.php');

    class Pista{
        private string $tipo_pista;
        private string $estado;
        private float $precio;
        private ?string $hora_ultima_reserva;
        private string $polideportivo;

        public function __construct(string $tipo_pista, string $estado, float $precio, string $polideportivo){
            $this->tipo_pista = $tipo_pista;
            $this->estado = $estado;
            $this->precio = $precio;
            $this->polideportivo = $polideportivo;
        }

        public function __destruct(){
            $this->tipo_pista = "";
            $this->estado = "";
            $this->precio = "";
            $this->hora_ultima_reserva = "";
            $this->polideportivo = "";
        }

        public function registrarPista(){
            $registro = false;

            try{
                $pdo = new BD();
                $bdConexion = $pdo->getPDO();

                $consulta = $bdConexion->prepare("INSERT INTO pista(tipo_pista, estado, precio, id_polideportivo)
                    VALUES (?,?,?,?)");

                $consulta->bindParam(1, $this->tipo_pista);
                $consulta->bindParam(2, $this->estado);
                $consulta->bindParam(3, $this->precio);
                $consulta->bindParam(4, $this->polideportivo);

                $consulta->execute();
                $registro = true;
                return $registro;

            }
            catch(PDOException $e){
                echo "Error al registrar la pista: " . $e->getMessage();

                return $registro;
            }
        }

        public static function desplegarPistas(){

            try{
                $pdo = new BD();
                $bdConexion = $pdo->getPDO();

                $consulta = $bdConexion->prepare("SELECT * FROM pista");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();

                $pistas = [];

                while ($pista = $consulta->fetch()){
                    $pistas[] = $pista;
                }

                return $pistas;
            }
            catch(PDOException $e){
                echo "Error al mostrar las pistas: " . $e->getMessage();
                return $pistas = [];
            }
        }

        public static function eliminarPista(int $id_pista){
            $borrado = false;

            try{
                $pdo = new BD();
                $bdConexion = $pdo->getPDO();

                $consulta = $bdConexion->prepare("DELETE FROM pista WHERE id_pista = '$id_pista'");

                $consulta->execute();
                $borrado = true;
                return $borrado;
            }
            catch(PDOException $e){
                echo "Ha habido un error al eliminar la pista: " . $e->getMessage();

                return $borrado;
            }
        }


    }


?>
