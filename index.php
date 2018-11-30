<?php
    $page=$_GET['page'] ?? 'home';

    $pages =[
        'home',
        'blog',
        'otherblog'
    ];
    ?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rick and Morty Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One" rel="stylesheet">
</head>
<body>

<?php
    if (!in_array($page,$pages)){
        include 'views/home.view';
    }
    else{
        include 'views/' . $page . '.view.php';
    }
?>
</body>
</html>