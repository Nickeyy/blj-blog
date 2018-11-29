<?php
$errors=[];

$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) ){
    $created_by    = trim($_POST['name']    ?? '');
    $post_title   = trim($_POST['title']   ?? '');
    $post_text = trim($_POST['text'] ??'');
    $created_at = date("Y-m-d H:i:s");
    $post_link = trim($_POST['link']??'Hallo');

        if($created_by===''){
            $errors[] = "Bitte geben Sie einen Nickname an.";
        }
        if($post_title===''){
            $errors[]="Geben Sie einen Titel ein.";
        }
        if($post_text ===''){
            $errors[]= "Geben Sie ihrem Blog einen Titel";
        }
    if(sizeof ($errors)===0){
    $stmt = $dbh->prepare("INSERT INTO post (created_by, created_at, post_title, post_text, post_link) VALUES(:cr_by, :cr_at, :p_ti, :p_te, :p_li) ");
    $stmt->execute([':cr_by' => $created_by, ':cr_at' => $created_at,':p_ti' => $post_title,':p_te' => $post_text, ':p_li'=> $post_link]);

    header("Location: http://10.20.16.101/blog/index.php");
    }
   else{
        foreach($errors as $error){?>
        <ul>
        <li><?= $error?></li>
        </ul><?php
       }
    }
}

?>