<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Estacionamento</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form method="POST" action="start.php">
                        <label>Quantidade de vagas:</label>
                        <div class="input-group">
                            <input type="text" class="form-control"  name="q" >
                            <input class="btn btn-primary" type="submit" value="Salvar">
                        </div>            
                    </form>
                </div>
            </div>

        </div>
        
        </center>
    </body>
</html>