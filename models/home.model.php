<?php

function insertSpace($text, $pos) { 
    $new = $text;
    for ($i = 0; $i < strlen($text); $i += $pos) {
        $vor = substr($new, 0, $i);
        $nach = substr($new, $i);
        if (strpos($vor, " ")  == false) {
                $new = $vor . ' ' . $nach; 
        }
    } 
    return $new;
}

$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM post order by created_at desc');
$stmt->execute();
$posts = $stmt->fetchAll();

$ups = trim($_POST['ups']    ?? '');
$downs = trim($_POST['downs']    ?? '');
$id = trim($_POST['id']    ?? '');
$ups++;
$downs++;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['upcount'])) {
        $count = $dbh->exec("UPDATE `post` SET up_votes = $ups WHERE id = $id");
        
    }
    else if (isset($_POST['downcount'])){
        $count = $dbh->exec("UPDATE `post` SET down_votes = $downs WHERE id = $id");
    }
    header("Refresh:0; url=index.php?page=home");
}
