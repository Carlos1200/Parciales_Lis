<?php
    $cursos=array(array(25,15,10),array(10,5,2),array(8,4,1),array(12,8,4),array(30,15,10),array(90,25,67));

    function MostrarDatos(){
        global $cursos;
        foreach($cursos as $key=>$value){
            $idioma='';
            if($key==0){
                $idioma='Ingles';
            }elseif($key==1){
                $idioma='Frances';
            }elseif($key==2){
                $idioma='Mandarin';
            }elseif($key==3){
                $idioma='Ruso';
            }elseif($key==4){
                $idioma='Portugues';
            }elseif($key==5){
                $idioma='Japones';
            }

            echo "<div class='col-4 my-2'>";
            echo "<div class='bg-primary' style='--bs-bg-opacity: .7;'>";
            echo "<p class='fs-5 text-center m-0 w-full'>$idioma</p>";
            echo "</div>";
            foreach($value as $key2=>$value2){
                $color="";
                $dificultad='';
                if($key2==0){
                    $color="bg-success";
                    $dificultad='basico';
                }elseif($key2==1){
                    $color="bg-warning";
                    $dificultad='intermedio';
                }elseif($key2==2){
                    $color="bg-danger";
                    $dificultad='Avanzado';
                }
                echo "<div class='row mx-1'>";
                echo "<div class='$color col p-0' style='--bs-bg-opacity: .7;'>";
                echo "<p class='fs-5 text-center'>$dificultad</p>";
                echo "</div>";
                echo "<div class='$color col p-0' style='--bs-bg-opacity: .7;'>";
                echo "<p class='fs-5 text-center'>$value2</p>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Array Declarativo</title>
</head>
<body class="container-fluid bg-secondary">
    <h1 class="text-center my-5 text-white">Array Declarativo</h1>
    <div class="row ">
        <?php
            MostrarDatos();
        ?>
    </div>
    
</body>
</html>