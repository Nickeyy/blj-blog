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

$stmt = $dbh->prepare('SELECT * FROM post');
$stmt->execute();
$posts = $stmt->fetchAll();