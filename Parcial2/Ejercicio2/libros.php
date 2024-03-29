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
        if(!preg_match("/^(?:ISBN(?:-13)?:?\ )?(?=[0-9]{13}$|(?=(?:[0-9]+[-\ ]){4})[-\ 0-9]{17}$)97[89][-\ ]?[0-9]{1,5}[-\ ]?[0-9]+[-\ ]?[0-9]+[-\ ]?[0-9]$/", $isbn)){
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

            $librosstring=json_encode($_POST);
            $librosParced=json_decode($librosstring);
            $librosCookie=[];
            if(array_key_exists('libros',$_COOKIE)){
                $librosCookie=json_decode($_COOKIE['libros']);
            }
            $arrayLibros=array_merge($librosCookie, [$librosParced]);
            setcookie('libros', json_encode($arrayLibros), time()+60*60*24*365);

            $libro=new Libro($arrayLibros);
            $libro->imprimirLibros();

        }else{
            redirect('formulario.php?error=true');
        }
        
    }else{
        $librosCookie=[];
        if(array_key_exists('libros',$_COOKIE)){
            $librosCookie=json_decode($_COOKIE['libros']);
        }
        $libro=new Libro($librosCookie);
        $libro->imprimirLibros();
    }

    class Libro{
        public $libros=[];

        public function __construct($args=[]){
            
            $this->libros=$args;
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
                    <h1 class="text-center my-5 text-white">Libros en inventario</h1>
                    <form action="formulario.php" method="get">
                        <button class="btn btn-warning">Regresar</button>
                    </form>
                    <div class="row ">
                        <?php
                            foreach($this->libros as $book){
                                ?>
                                    <div class="col-4 my-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-center"><?php echo $book->titulo ?></h3>
                                                <p class="card-text"><?php echo $book->autor ?></p>
                                                <p class="card-text"><?php echo $book->edicion.'°, '.$book->lugar.', '.$book->editorial.', '.$book->year ?></p>
                                                <p class="card-text"><?php echo $book->isbn ?></p>
                                                <br>
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