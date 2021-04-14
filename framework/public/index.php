<?php 

session_start();

include '../app/config.php';
include '../app/autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>APP PHP</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            outline: none;
            border: none;
            text-decoration: none;
            list-style: none;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
        }

        .section{
           width: 100%;
            float: left;
        }

        .content{
            max-width: 1500px;
            margin: 0 auto;
        }

        .alert-danger{
            width: 100%;
            background-color: #e6c8c8;
            text-align: center;
            padding: 20px;
            color: #f25c5c;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            font-weight: lighter;
            margin: 15px 0;
        }
        .alert-success{
            width: 100%;
            background-color: #cce6c8;
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #337829;
            border: none;
            border-radius: 5px;
            font-weight: lighter;
        }

    </style>
</head>
<body>

<?php include '../app/Views/header.php' ?>

<?php  new Rotas(); ?>

<?php include '../app/Views/footer.php' ?>

</body>
</html>