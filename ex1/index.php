<?php
    include("classe.php");

    $pa = new perimetro();

    $saida = "";

    if(isset($_GET['o'])){
        if ($_GET['o'] == "1"){
            echo "Altura: ". $_POST['h']."<br>";
            echo "Larguira: ". $_POST['b']."<br>";
            $saida = $pa->retangulo($_POST['h'],$_POST['b']);
        }
        if ($_GET['o'] == "2"){
            echo "Lado: ". $_POST['a']."<br>";
            $saida = $pa->quadrado($_POST['a']);
        }
        if ($_GET['o'] == "3"){
            echo "Altura". $_POST['a']."<br>";
            echo "Larguira". $_POST['b']."<br>";
            $saida = $pa->paralelogramo($_POST['a'], $_POST['b']);
        }
        if ($_GET['o'] == "4"){
            echo "Altura: ". $_POST['a']."<br>";
            echo "Base: ". $_POST['b']."<br>";
            echo "Largura: ". $_POST['c']."<br>";
            echo "Base maior: ". $_POST['B']."<br>";
            $saida = $pa->trapezio($_POST['a'],$_POST['b'],$_POST['c'],$_POST['B']);
        }
    }

?>
<html>
    <head>
        <title>Perimetro dos objetos</title>
    
        <script>
        
        
        </script>

        <style>
        
        table{
            background-color: antiquewhite;
        }

        .objetos{
            position: absolute;

            padding: 0px;
            border: 0px;

            top: 50%;
            left: 50%;

        }

        .forma{
            height: 200px;
            width: 200px;
        }      

        .css3button {
            
            bottom: 10px;

            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            color: #ffffff;
            padding: 10px 20px;
            background: -moz-linear-gradient(
                top,
                #0f0f0f 0%,
                #000000);
            background: -webkit-gradient(
                linear, left top, left bottom,
                from(#0f0f0f),
                to(#000000));
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            border-radius: 0px;
            border: 3px solid #000000;

            height: 100%;
            width: 100%;
        }


        </style>

    </head>
    <body>
        <br>
        <center>
        <table border='1'>
            <tr>
                <th>Retângulo</th>
                <th>Quadrado</th>
                <th>Paralelogramo</th>
                <th>Traoézio</th>
            </tr>
            <tr>
                <td>
                    <div>
                        <form method="POST" action="?o=1">
                            <input name="h" type="text" placeholder="h"><br>
                            <input name="b" type="text" placeholder="b"><br>
                            <input class="css3button" type="submit" value="Enviar">
                        </form>
                    </div>
                </td>
                <td>
                    <div>
                        <form  method="POST" action="?o=2">
                            <input name="a" type="text" placeholder="a"><br>
                            <input class="css3button"  type="submit" value="Enviar">
                        </form>
                    </div>
                </td>
                <td>
                    <div>
                        <form  method="POST" action="?o=3">
                            <input name="a" type="text" placeholder="a"><br>
                            <input name="b" type="text" placeholder="b"><br>
                            <input class="css3button" type="submit" value="Enviar">
                        </form>
                    </div>
                </td>
                <td>
                    <div>
                        <form  method="POST" action="?o=4">
                            <input name="a" type="text" placeholder="a"><br>
                            <input name="b" type="text" placeholder="b"><br>
                            <input name="c" type="text" placeholder="c"><br>
                            <input name="B" type="text" placeholder="B"><br>
                            <input class="css3button" type="submit" value="Enviar">
                        </form>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3"><strong>Perimetro</strong></td>
                <td colspan="1"><strong><?php echo $saida;?><strong></td>
            </tr>
            <tr>
                <td>Alunos:</td>
                <td>Cauan M. Siqueira</td>
                <td>Marlon Dantas</td>
                <td>Milena Ribeiro</td>        
            </tr>
        </table>
    </center>
    </body>
</html>