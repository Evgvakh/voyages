<?php
require_once 'application/common/article.php';
extract($data[0]);

$art_content = $contenu;
$art_id = $id;
$art_user = $id_user;

require_once 'application/common/comment.php';

$comments = [];
foreach ($comment_data as $key => $value) {
    extract($value);
    $comments[$key] = new Comment($id, $id_user, $id_article, $created, $contenu);
}

?>

<div class="article-container">
    <div class="article-header flex justify-between">
        <div>
            <p>CATEGORY | <a href="http://localhost/voyages/articles/sort/<?= $id_category ?>"><?=
                  Article::getCategoryName($art_id) ?></a>
            </p>
            <div class="articles-link space-x-6">
                <?php if (
                    (isset($_SESSION['logged_user'])) &&
                    ($_SESSION['logged_user'] === 'admin' ||
                        $_SESSION['logged_user'] === 'moderateur' ||
                        $_SESSION['logged_user'] === Article::getUserName($art_id))
                ): ?>
                    <a data-id="<?= $art_id ?>" id="edit_article" href="#">Edit article <i
                            class="fa-solid fa-pen-to-square"></i></a>
                <?php endif; ?>
                <?php if (
                    isset($_SESSION['logged_user']) &&
                    ($_SESSION['logged_user'] === 'admin' ||
                        $_SESSION['logged_user'] === Article::getUserName($art_id))
                ): ?>
                    <a data-id="<?= $art_id ?>" id="delete_article" href="#">Delete article <i class="fa-solid fa-trash"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <p>Date</p>
    </div>
    <h2>
        <?= $titre ?>
    </h2>
    <p>Written by <u>
            <?= ucfirst(Article::getUserName($art_id))?>
        </u></p>
    <div class="article-img" style="background-image: url(http://localhost/voyages/<?= $img ?>);"></div>
    <p class="article-content">
        <?= nl2br($art_content)?>
    </p>

    <div class="comments-container">
        <h3>comments</h3>
        <?php foreach ($comments as $key => $val):?>
            <div class="comments-item"> 
                <p class="comments-item__head"><b style="cursor: pointer;"><u><?= ucfirst(Comment::getUserName($val->id))?></u></b> wrote at <span class="italic"><?=$val->created?></span></p>
                <p class="comments-item__content">
                    <?= $val->comment_contenu ?>
                </p>
            </div>
        <?php endforeach;?>
        <div class="comments-container__leave-comment">
            <form action="http://localhost/voyages/articles/addComment/<?=$art_id?>" method="post">
                <div class="comments-container__form-container flex flex-col">
                    <h4>Leave your comment here:</h4>
                    <input type="text" name="user_id" id="user_id" value="" style="display: none;">
                    <textarea name="content" id="comment_text" cols="30" rows="7" ></textarea>
                    <button id="add_comment" data-id="<?=$_SESSION['logged_user']?>">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>