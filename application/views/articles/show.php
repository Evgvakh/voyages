<?php
require_once 'application/common/article.php';
$articles = [];

foreach ($data as $key => $value) {
    extract($value);    
    $articles[$key] = new Article($id, $titre, $contenu, $img, $id_category, $id_user);
}
?>

<p style="border: 3px solid brown">
    Ici y aura les articles. Tous ou filtrees. 
</p>
    <?php foreach ($articles as $key => $value): ?>
        <div>
            <span style="display: none;"><?=$value->id?></span>
            <h3><?=$value->title?>: </h3>
            <p><?=$value->content?></p>
        </div>
    <?php endforeach;?>