<?php

    require (ROOT_PATH ."/model/Veiculos.php");

    class Veiculos
    {
        public $marca;
        public $modelo;
        public $valor;

        public static $instance;
    
        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new DaoUsuario();
    
            return self::$instance;
        }
    
        public function Inserir() {
            try {
                $sql = "INSERT INTO veiculos (       
                    `marca`,`modelo`,`valor`) 
                    VALUES (
                    :marca,:modelo,:valor)";
    
                $p_sql = Coon::getInstance()->prepare($sql);
    
                $p_sql->bindValue(":marca", $this->marca);
                $p_sql->bindValue(":modelo", $this->modelo);
                $p_sql->bindValue(":valor", $this->valor);   
    
                $p_sql->execute();
                
                return  Coon::lastInsertId();

            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }

        public function Buscar() {
            try {
                $sql = "SELECT * FROM veiculos";
                $p_sql = Coon::getInstance()->prepare($sql);
                // $p_sql->bindValue(":cod", $user);

                // return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
                $p_sql->execute();

                return $p_sql->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação(Buscar), foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }


    }

    class views extends Veiculos
    {

        public function impPhoto($marca,$modelo,$valor,$foto)
        {
            echo "<div class=\"grid-item\">";
            echo "<figure class=\"effect-bubba\">";
            echo "    <img src=\"$foto\" alt=\"Image\" class=\"img-fluid tm-img\">";
            echo "    <figcaption>";
            echo "        <h2 class=\"tm-figure-title\">$marca - <strong>$modelo</strong></h2>";
            echo "        <p class=\"tm-figure-description\"><strong> - R$ $valor - </strong></p>";
            echo "        <a href=\"img/tm-img-01.jpg\"></a>";
            echo "    </figcaption>";           
            echo "</figure>";
            echo "</div>";
        }

        public function r_carros()
        {



            $Exxit="";

            //for

            foreach ($this->Buscar() as $user)
            {
            //      echo $user['ID'].' - '.$user['marca'].'<br>';
            
            $Exxit=$Exxit. "<div class=\"grid-item\">";
            $Exxit=$Exxit. "<figure class=\"effect-bubba\">";
            $Exxit=$Exxit. "    <img src=\"img\car\\".$user['ID'].".jpg\" alt=\"Image\" class=\"img-fluid tm-img\">";
            $Exxit=$Exxit. "    <figcaption>";
            $Exxit=$Exxit. "        <h2 class=\"tm-figure-title\">".$user['modelo']." - ".$user['marca']."</h2>";
            $Exxit=$Exxit. "        <p class=\"tm-figure-description\"><strong> - R$ ".$user['valor']." - </strong></p>";
            $Exxit=$Exxit. "        <a href=\"img/tm-img-01.jpg\"></a>";
            $Exxit=$Exxit. "    </figcaption>";
            $Exxit=$Exxit. "</figure>";
            $Exxit=$Exxit. "</div>";

            }

            return $Exxit;
        }

    }
?>