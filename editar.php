<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            background-color: #eee;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form{
            width: 400px;
            text-align: center;
            background-color: #fff;
            padding-bottom: 20px;
            margin: 20px auto;
            border-bottom: 5px solid #888;
            height: 340px;
            color: #777;
        }
        
        h1{
            color: #fff;
            font-size: 20px;
            background-color: rgb(65, 72, 85);
            padding: 30px 20px;
            margin-bottom: 35px;
            border-radius: 3px 5px 0 0;
            text-transform: uppercase;
            font-family: Arial, sans-serif;
            font-weight: 400px;
            font-size: 16px;
        }

        .fas{
            display: inline-block;
            width: 40px;
            padding: 10px;
            height: 40px;
            background-color: #eee;
        }

        input{
            display: inline-block;
            width: 250px;
            margin: 4px auto;
            height: 40px;
            background-color: #eee;
            padding-left: 5px;
            border: none;
            border-bottom: 1px solid transparent;
            outline: none;
        }

        input:active, input:hover{
            outline: none;
            border-bottom: 1px solid rgb(98, 200, 239);
        }

        button{
            display: block;
            text-align: center;
            background-color: rgb(0, 213, 254);
            background-color: rgb(87, 194, 221);
            padding: 15px;
            color: white;
            width: 290px;
            margin: 40px auto 0;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 12px;
            border: none;
            font-weight: 600; 
        }

        button:hover{
            background-color: rgb(0, 189, 255);
            cursor: pointer;
        }

    </style>
    <?php
require 'config.php';

$id = 0;
if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $sql = "UPDATE usuarios SET nome = '$nome', email='$email' WHERE id ='$id'";
    $pdo->query($sql);
    header('Location: index.php');
}

    $sql = "SELECT * FROM usuarios WHERE id ='$id'";
    $sql = $pdo->query($sql);
      if($sql->rowCount() > 0){
          $dado = $sql->fetch();
      }else{
        header('Location: index.php');
    }

?>
</head>
<body>
<form method="POST">
    <h1>Insira as alterações dos dados</h1>
    <div>
        <label><i class="fas fa-user"></i></label>
        <input type="text" name='nome' value="<?php echo $dado['nome']; ?>">
    </div>
    <div>
        <label><i class="fas fa-envelope"></i></label>
        <input type="text" name='email' value="<?php echo $dado['email']; ?>">
    </div>
    <button type="submit">Atualizar</button>
</form>
</body>
</html>
