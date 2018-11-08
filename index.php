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
            font-family: Arial, sans-serif;
            text-align: center;
            color: #444;
        }

        h1{
            font-size: 24px;
        }

        .busca{
            border: none;
            width: 210px;
            height: 20px;
            background-color: transparent;
            outline: none;
           
        }
        .busca:hover, .busca:active{
            outline: none;
        }

        #btn-busca{
            color: #777;
            background-color: transparent;
            border: none;
        }

        .form{
            background-color: #eee;
            width: 250px;
            height: 30px;
            border-radius: 5px;
            margin: auto;
            padding: 5px 5px 5px 0px;
            box-sizing: border-box;
            color: #777;
            display: inline;
        }

        table{
            clear: both;
            width: 75%;
            margin: auto;
            text-align: center;
            border: 1px solid #ddd;
            margin-top: 30px;
            font-size: 15px;
        }

        th{
            background-color: #4CAF50;
            background-color: rgb(65, 72, 85);
            color: #fff;
            padding: 10px;
        }
        #acoes{
            width: 130px;
        }
        td{
            height: 30px;
        }
     
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover, tr:nth-child(even):hover {
            background-color: #dedede;
        }
        .add{
            display: block;
            text-align: center;
            background-color: tomato;
            width: 190px;
            padding: 15px;
            color: white;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 13px;
            margin: 30px auto 0;
        }
        .add:hover{
            margin-top: 28px;
            box-shadow: 0px 10px 15px #cecece;
        }
        .add:active{
            margin-top: 29px;
            box-shadow: 0px 5px 10px #cecece;
        }
        a{
            color: #444;
            text-decoration: none;
            background-color: rgb(197, 221, 255); 
            padding: 5px 15px;
            margin: 1px;
        }
        table a:hover{
            text-decoration: underline;
        }



    </style>
</head>
<body>
<header>
        <h1>Lista de usuários</h1>
        <form method='GET'>
            <div class='form'>
                <button id='btn-busca' type="submit" value="Buscar"><i class="fas fa-search"></i></button>
                <input class='busca' placeholder='Search' maxlength="40" name='nome'>
            </div>
        </form>
        
    </header>
<table>

    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th id="acoes">Ações</th>
    </tr>
    <?php


require 'config.php';

    if(isset($_GET['nome']) && empty($_GET['nome']) == false){
        $nome = addslashes($_GET['nome']);
        $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%';";
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0){
            echo '<a href="index.php" style="background-color: transparent; font-size: 20px;"><i style="margin-top: 15px;" class="far fa-arrow-alt-circle-left"></i></a>';
            $x = 0;
            foreach($sql->fetchAll() as $usuario){
                $x += 1;
                echo '<tr>';
                echo '<td>'.$usuario['nome'].'</td>';
                echo '<td>'.$usuario['email'].'</td>';
                echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a><a href="excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
                echo '</tr>';
            }
            echo "<p style='font-size: 12px;'> A pesquisa retornou $x resultado(s)</p>";
        }else{
            
            echo '<a href="index.php" style="background-color: transparent; font-size: 20px;"><i style="margin-top: 15px;" class="far fa-arrow-alt-circle-left"></i></a>';
            echo '<p style="color: rgb(169, 44, 43); font-size: 12px;"> Usuário não encontrado </p>';
        }
        
    } else {
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $usuario){
            echo '<tr>';
            echo '<td>'.$usuario['nome'].'</td>';
            echo '<td>'.$usuario['email'].'</td>';
            echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a><a href="excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
            echo '</tr>';
        }
    }
}
    ?>
</table>
<a class='add'
href="add.php">Adicionar novo usuário</a>
</body>
</html>