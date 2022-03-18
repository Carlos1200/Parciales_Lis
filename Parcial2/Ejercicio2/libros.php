<?php
    function redirect($url){
        header('Location: ' . $url, true);
        die();
    }
    function validar(){
        //validate with regular expressions
        $autor = $_POST['autor'];
        $titulo = $_POST['titulo'];
        $edicion = $_POST['edicion'];
        $lugar = $_POST['lugar'];
        $editorial = $_POST['editorial'];
        $year = $_POST['year'];
        $isbn = $_POST['isbn'];
        $notas = $_POST['notas'];

        $errores = [];

        if(empty($autor)){
            $errores['autor'] = "El autor es obligatorio";
        }
        //validate autor with regular expressions can contain only letters, spaces and commas
        if(!preg_match("/^[a-zA-Z\s,]+$/", $autor)){
            $errores['autor'] = "El autor solo puede contener letras, espacios y comas";
        }
        if(empty($titulo)){
            $errores['titulo'] = "El título es obligatorio";
        }
        //validate regex with letters, spaces and commas
        if(!preg_match("/^[a-zA-Z\s,]+$/", $titulo)){
            $errores['titulo'] = "El titulo no es válido";
        }
        if(empty($edicion)){
            $errores['edicion'] = "La edición es obligatoria";
        }
        //validate regex with numbers
        if(!preg_match("/^[0-9]+$/", $edicion)){
            $errores['edicion'] = "La edición no es válida";
        }
        if(empty($lugar)){
            $errores['lugar'] = "El lugar es obligatorio";
        }
        if(empty($editorial)){
            $errores['editorial'] = "La editorial es obligatoria";
        }

        if(empty($year)){
            $errores['year'] = "El año es obligatorio";
        }
        //validate year with regex with numbers
        if(!preg_match("/^[0-9]+$/", $year)){
            $errores['year'] = "El año no es válido";
        }
        if(empty($isbn)){
            $errores['isbn'] = "El ISBN es obligatorio";
        }
        //validate isbn with regex with numbers
        if(!preg_match("/^(97(8|9))?\d{9}(\d|X)$/", $isbn)){
            $errores['isbn'] = "El ISBN no es válido";
        }
        if(empty($notas)){
            $errores['notas'] = "Las notas son obligatorias";
        }

        return $errores;

    }

    if(isset($_POST['enviar'])){
        $errores=validar();
        if(count($errores) == 0){
            $libro=new Libro($_POST);
            $libro->imprimirLibros();

        }else{
            redirect('formulario.php?error=true');
        }
        
    }

    class Libro{
        public $libros=[];

        public function __construct($args){
            $librosstring=json_encode($args);
            $librosParced=json_decode($librosstring);
            $librosCookie=[];
            if(array_key_exists('libros',$_COOKIE)){
                $librosCookie=json_decode($_COOKIE['libros']);
            }
            $arrayLibros=array_merge($librosCookie, [$librosParced]);
            setcookie('libros', json_encode($arrayLibros), time()+60*60*24*365);
            $this->libros=$arrayLibros;
        }

        public function imprimirLibros(){
            ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                    <title>Libros</title>
                </head>
                <body class="container-fluid bg-secondary">
                    <h1 class="text-center my-5 text-white">Array Declarativo</h1>
                    <div class="row ">
                        <?php
                            foreach($this->libros as $book){
                                ?>
                                    <div class="col-4 my-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="text-center"><?php echo $book->titulo ?></h3>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Autor: <?php echo $book->autor ?></p>
                                                <p class="card-text">Edición: <?php echo $book->edicion ?></p>
                                                <p class="card-text">Lugar: <?php echo $book->lugar ?></p>
                                                <p class="card-text">Editorial: <?php echo $book->editorial ?></p>
                                                <p class="card-text">Año: <?php echo $book->year ?></p>
                                                <p class="card-text">ISBN: <?php echo $book->isbn ?></p>
                                                <p class="card-text">Notas: <?php echo $book->notas ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    
                </body>
                </html>
            <?php
        }
    }
?>