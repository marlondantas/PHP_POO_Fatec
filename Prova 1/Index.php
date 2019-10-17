<?php
    
    session_start();

    if (!isset($_SESSION['lista'])){
        $_SESSION['lista'] = array();
    }

    include ('codigo.php');

    $entrada = 0;
    
    $cd = new codigo();

    if(isset($_GET['entrada']))
    {
        if($_GET['entrada'] == "")
        {
            header('Location: index.php?bk');
            quit();
        }
        $entrada = $_GET['entrada'];
        //$cd->Validar($entrada);

        $arrayl = $_SESSION['lista'];

        array_push($arrayl, $entrada, $cd->Validar($entrada));
        
        $_SESSION['lista'] = $arrayl;

        //print_r ($arrayl);

    }
    elseif (isset($_GET['bk']))
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
        Entrada em branco!</div>";
    }



?>
<!DOCTYPE html>
<html class="bg-light">
    <head>
        <title>Prova 1 - Charles</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <table  >
                <tr>
                    <th colspan=2 style="text-align: center;">
                        <h1>Código de barra</h1>
                    </th>

                </tr>

                <tr border="1">
                    <form action="" method="GET">
                    <td>
                        <input type="text" name="entrada">
                    </td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="Validar!">
                    </td>
                    </form>
                </tr>

                <?php 
                if(isset($_SESSION['lista']))
                {
                    echo "<tr>".
                            "<th colspan=\"2\" style=\"text-align: center;\"><h3>".
                            "Historico".
                            "</h3></th>".
                    "</tr>";


                    for ($i = 0;$i < count($_SESSION['lista'])-1; $i=$i+2) {
                        echo "<tr>";

                        echo "<td>".$_SESSION['lista'][$i]."</td>";

                        $tipo = "success";
                        if($_SESSION['lista'][$i+1] == "ERRADO")
                        {
                            $tipo= "danger";
                        }

                        echo "<td><div class=\"alert alert-$tipo\">";
                        
                        echo $_SESSION['lista'][$i+1];

                        echo "</div></td>";

                        echo "</tr>";
                    }
                }
                ?>

            </table>
        </center>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>