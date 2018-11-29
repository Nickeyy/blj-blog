<?php
    include 'models/blog.model.php';
    ?>

<div class="wrapper">

<h1 class="form-title">Nickeyys Blog</h1>

<form action="index.php?page=blog" method="post">

    <fieldset>
        <legend class="form-legend">Machen Sie ein super coolen BLOG genau HIER:</legend>
        <div class="form-group">
            <label class="form-label" for="name">Ihr super cooler NICKNAME!</label>
            <input class="form-control" type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Ihr super cooler Title</label>
            <input class="form-control" type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="note" class="form-label">Ihr super cooler Eintrag</label>
            <textarea name="text" id="text" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="link">Ihr super cooler Link, für Ihr super cooles Bild</label>
            <input class="form-control" type="text" id="link" name="link">
        </div>
    </fieldset>
    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Absenden">
        <a href="index.php" class="btn">Zurück zum Blog</a>
    </div>

</form>
</div>
