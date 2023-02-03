<?php 
extract($data[0]);

require_once 'application/common/comment.php';

$comments = [];
foreach ($comment_data as $key => $value) {
    extract($value);    
    $comments[$key] = new Comment($id, $id_user, $id_article, $created, $updated, $contenu);
}

?>

<p>SHOW ONE ARTICLE</p>

<h3>ARTICLE SUR LE SUJET DE <?=$titre?></h3>
<h4>Le contenu: </h4>
<p><?=$contenu?></p>

<h4>Les commentaires:</h4>
<?php foreach ($comments as $key => $val):?>
    <div>
        <p><u>User <?=$val->id_user?> a ecrit: </u></p>
        <p><?=$val->contenu ?></p>
    </div>
<?php endforeach;?>


