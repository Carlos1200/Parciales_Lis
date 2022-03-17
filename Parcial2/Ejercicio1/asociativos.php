<?php
    $cursos=[
        'Ingles'=>[
            'basico'=>25,
            'intermedio'=>15,
            'Avanzado'=>10
        ],
        'Frances'=>[
            'basico'=>10,
            'intermedio'=>5,
            'Avanzado'=>2
        ],
        'Mandarin'=>[
            'basico'=>8,
            'intermedio'=>4,
            'Avanzado'=>1
        ],
        'Ruso'=>[
            'basico'=>12,
            'intermedio'=>8,
            'Avanzado'=>4
        ],
        'Portugues'=>[
            'basico'=>30,
            'intermedio'=>15,
            'Avanzado'=>10
        ],
        'Japones'=>[
            'basico'=>90,
            'intermedio'=>25,
            'Avanzado'=>67
        ],
    ];

    function MostrarDatos(){
        global $cursos;
        foreach($cursos as $key=>$value){
            echo "<div class='col-4 my-2'>";
            echo "<div class='bg-primary' style='--bs-bg-opacity: .7;'>";
            echo "<p class='fs-5 text-center m-0 w-full'>$key</p>";
            echo "</div>";
            foreach($value as $key2=>$value2){
                $color="";
                if($key2=="basico"){
                    $color="bg-success";
                }elseif($key2=="intermedio"){
                    $color="bg-warning";
                }elseif($key2=="Avanzado"){
                    $color="bg-danger";
                }
                echo "<div class='row mx-1'>";
                echo "<div class='$color col p-0' style='--bs-bg-opacity: .7;'>";
                echo "<p class='fs-5 text-center'>$key2</p>";
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
    <title>Array Asociativo</title>
</head>
<body class="container-fluid bg-secondary">
    <h1 class="text-center my-5 text-white">Array Asociativo</h1>
    <div class="row ">
        <?php
            MostrarDatos();
        ?>
    </div>
    
</body>
</html>