<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form</title>
</head>
<body class="bg-secondary container-sm">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center text-white my-2">Formulario</h1>
        <form action="libros.php" method="get" class="pl-5">
            <button class="btn btn-success">Ver Libros</button>
        </form>
    </div>
    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center">
            <?php if($_GET['error'] == 'true'): ?>
                <p class="fs-4">Hay errores en el formulario</p>
            <?php endif ?>
        </div>
    <?php endif ?>
    <form method="POST" action="libros.php">
        <div class="form-group">
            <label for="autor" class="text-white fs-4">Autor</label>
            <input type="text" name="autor" class="form-control" id="autor" placeholder="Apellido,Nombre">  
        </div>
        <div class="form-group">
            <label for="titulo" class="text-white fs-4">Título del libro</label>
            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título del libro">   
        </div>
        <div class="form-group">
            <label for="edicion" class="text-white fs-4">Número de edición</label>
            <input type="text" name="edicion" class="form-control" id="edicion" placeholder="Número de edición">   
        </div>
        <div class="form-group">
            <label for="lugar" class="text-white fs-4">Lugar de publicación</label>
            <input type="text" name="lugar" class="form-control" id="lugar" placeholder="Lugar de publicación">   
        </div>
        <div class="form-group">
            <label for="editorial" class="text-white fs-4">Editorial</label>
            <input type="text" name="editorial" class="form-control" id="editorial" placeholder="Editorial">   
        </div>
        <div class="form-group">
            <label for="year" class="text-white fs-4">Año de edición</label>
            <input type="text" name="year" class="form-control" id="year" placeholder="Año de edición">   
        </div>
        <div class="form-group">
            <label for="isbn" class="text-white fs-4">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN">   
        </div>
        <div class="form-floating mt-4">
            <textarea class="form-control" placeholder="Ingrese notas" id="notas" name="notas" style="height: 100px; min-height: 100px;"></textarea>
            <label for="notas">Notas</label>
        </div>
        <div class="text-center my-3">
            <input type="submit" name="enviar" value="Registrar Libro" class="btn btn-primary btn-lg">
        </div>
    </form> 
</body>
</html>