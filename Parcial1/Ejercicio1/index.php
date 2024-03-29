<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css"> 
    <link rel="stylesheet" href="css/style.css"> 
    <title>Conversor de Divisas</title>
</head>
<?php
    $from="USD";
    $to="EUR";
    $amount=0;
    $result=0;

    $USD=[
        "USD"=>1,
        "EUR"=>0.9,
        "GBP"=>0.8,
        "JPY"=>110.5,
    ];
    $EUR=[
        "USD"=>1.1,
        "EUR"=>1,
        "GBP"=>0.9,
        "JPY"=>120.5,
    ];
    $GBP=[
        "USD"=>1.2,
        "EUR"=>1.1,
        "GBP"=>1,
        "JPY"=>130.5,
    ];
    $JPY=[
        "USD"=>0.0092,
        "EUR"=>0.0089,
        "GBP"=>0.0086,
        "JPY"=>1,
    ];

    if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['amount'])){
        $from=$_POST['from'];
        $to=$_POST['to'];
        $amount=$_POST['amount'];
        $result=convert($from,$to,$amount);
    }
    
    function convert($from,$to,$amount){
        global $USD,$EUR,$GBP,$JPY;
        if($from=="USD"){
            return $amount*$USD[$to];
        }else if($from=="EUR"){
            return $amount*$EUR[$to];
        }else if($from=="GBP"){
            return $amount*$GBP[$to];
        }else if($from=="JPY"){
            return $amount*$JPY[$to];
        }
    }
?>
<body>
    <main>
        <div>
        <h1>Mi Conversor</h1>
        <form action="index.php" method="post">
            <label for="amount">Cantidad:</label>
            <input type="number" name="amount" id="amount" value="<?php echo $amount; ?>">
            <br>
            <label for="from">De:</label>
            <img class="bandera" id="fromImage" src="./img/<?php echo $from ?>.svg" alt="USD">
            <select name="from" id="from">
                <option value="USD" <?php if($from == 'USD') echo 'selected'; ?>>Dolar</option>
                <option value="EUR" <?php if($from == 'EUR') echo 'selected'; ?>>Euro</option>
                <option value="GBP" <?php if($from == 'GBP') echo 'selected'; ?>>Libra</option>
                <option value="JPY" <?php if($from == 'JPY') echo 'selected'; ?>>Yen</option>
            </select>
            <br>
            <label for="to">A:</label>
            <img class="bandera" id="toImage" src="./img/<?php echo $to ?>.svg" alt="USD">
            <select name="to" id="to">
                <option value="USD" <?php if($to == 'USD') echo 'selected';?>>Dolar</option>
                <option value="EUR" <?php if($to == 'EUR') echo 'selected';?>>Euro</option>
                <option value="GBP" <?php if($to == 'GBP') echo 'selected'; ?>>Libra</option>
                <option value="JPY" <?php if($to == 'JPY') echo 'selected'; ?>>Yen</option>
            </select>
            <br>
            <input type="submit" value="Convertir">
        </form>
        <?php if($amount > 0): ?>
            <p class="resultado">
                <?php echo $amount . ' <img class="bandera" src="./img/'.$from.'.svg" alt="from">   son ' . $result .    ' <img class="bandera" src="./img/'.$to.'.svg" alt="to"> '; ?>
            </p>
        <?php endif; ?>
        </div>
    </main>
</body>
</html>
<script src="./js/app.js"></script>