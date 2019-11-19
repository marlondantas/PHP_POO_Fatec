<?php
    session_start();
    $quant = 0;

    //ver numero de carrpos
    if(isset($_POST['q']))
    {
        $_SESSION['quantidade'] = intval($_POST['q']);
        $_SESSION['QuantAtual'] = $_SESSION['quantidade'];
        $quant = $_SESSION['quantidade'];
    }
    if(!isset($_SESSION['quantidade']))
    {
        header("Location: index.php");
    }

    // Session array
    if(!isset($_SESSION['hist']))
    {
        $_SESSION['hist'] = array();
    }
    
    if(isset($_POST['entrada']))
    {
        $placa = $_POST['placa'];
        $HE = $_POST['horaE']; 

        $carro_atual = array(
            "placa"=>$placa,
            "horaE"=>$HE,
            "horaS"=>$HS,
            "tp"=>$TP,
        );
        array_push($_SESSION['hist'],$carro_atual);
        $_SESSION['carro'] = $carro_atual;

        if($_SESSION['QuantAtual']<=0){
            header("Location: start.php?e");
        }
        else{
            $_SESSION['QuantAtual']-=1;
            header("Location: start.php?s");
        }

    }
    
    if(isset($_GET['kill']))
    {
        session_destroy();
        header("Location: Index.php");
    }

    // 

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Estacionamento</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <center>

        <!-- Recibo -->
        <?php if(isset($_GET['s'])){
            echo "<table class=\"table table-striped  text-center\" border=\"2\">";
            echo "    <tr>";
            echo "        <th colspan=\"5\"> Carros movido</th>";
            echo "    </tr>";
            echo "    <tr>";
            echo "        <th>Placa</th>";
            echo "        <th>Hora de Entrada</th>";
            echo "        <th>Hora de Saída</th>";
            echo "        <th>Total a Pagar</th>";
            echo "        <th><button></button></th>";
            echo "    </tr>";
            
            $carro_atual = $_SESSION['carro'];

            echo "    <tr>";
            echo "        <th>".$carro_atual['placa']."</th>";
            echo "        <th>".$carro_atual['horaE']."</th>";
            echo "        <th>".$carro_atual['horaS']."</th>";
            echo "        <th>".$carro_atual['tp']."</th>";
            echo "        <th><a href= \"start.php\">SALVAR</a></th>";
            echo "    </tr>";

            echo "</table>  ";
        } ?>

        <!-- ERRO  -->
        <?php if(isset($_GET['e'])){
            echo "<table class=\"table table-striped  text-center\" border=\"2\">";
            echo "    <tr>";
            echo "        <th colspan=\"5\"> ERRO</th>";
            echo "    </tr>";      
            echo "    <tr>";
            echo "        <th colspan=\"5\"><a href= \"start.php\">TENTAR NOVAMENTE</a></th>";
            echo "    </tr>";
            echo "</table>  ";
        } ?>
        
        <br>


        <!-- Adicionar carro -->
        <table  class="table table-striped  text-center" border="2">
                <tr>
                    <th colspan="3"> Adicionar Carro</th>
                </tr>
                <tr>
                    <th colspan="3"><?php echo $_SESSION['QuantAtual']." / ". $_SESSION['quantidade']; ?></th>
                </tr>
                <tr>
                    <th>Placa</th>
                    <th>Hora de Entrada</th>
                    <th>buttao</th>
                </tr>
                <tr>
                    <form method="POST" action="start.php">
                    <td><input type="text" name="placa"></td>
                    <td><input type="text" name="horaE"></td>
                    <td><input type="submit" value="Salvar" name="entrada"></td>
                    </form>
                </tr>
            </table>

        
        <br>

        <!-- retirar carro-->
        <table class="table table-striped  text-center" border="2">
            <tr>
                <th colspan="3"> Carros estacionados</th>
            </tr>
            <tr>
                <th colspan="3"><?php echo $_SESSION['QuantAtual']." / ". $_SESSION['quantidade']; ?></th>
            </tr>
            <tr>
                <th>Placa</th>
                <th>Hora de Saída</th>
                <th>X</th>
            </tr>

            <!-- Lista de carros -->

                <?php 
                
                $list = $_SESSION['hist'];

                foreach ($list as &$value) {
                    if($value['horaS'] == ""){
                    echo "<tr>";
                    echo "        <td>".$value['placa']."</td>";
                    echo "<form method=\"POST\" action=\"sair.php?placa=".$value['placa']."\">";
                    echo "        <td><input type=\"text\" name=\"horaS\"></td>";
                    echo "        <td>"."<input type='submit'value='Salvar!'>"."</td>";
                    echo "</form>";
                    echo "</tr>";
                    }
                }
                
                ?>

        </table>

        <br>

        <!-- Historico de carros -->
        <table class="table table-striped  text-center" border="2">
            <tr>
                <th colspan="4">Historicos</th>
            </tr>
            <tr>
                <th>Placa</th>
                <th>Hora de Entrada</th>
                <th>Hora de Saída</th>
                <th>Total a Pagar</th>
            </tr>

            <?php 
                
                $list = $_SESSION['hist'];
                foreach ($list as &$value) {
                    echo "<tr>";
                    echo "        <td>".$value['placa']."</td>";
                    echo "        <td>".$value['horaE']."</td>";
                    echo "        <td>".$value['horaS']."</td>";
                    echo "        <td>R$";

                    if($value['horaS'] != ""){
                       echo ($value['horaS']-$value['horaE']);
                    }

                    echo "</td>";
                    
                    echo "</tr>";
                }
                
            ?>
        </table>
        </center>
    </body>
</html>