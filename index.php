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
    <title>Nickeyy Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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