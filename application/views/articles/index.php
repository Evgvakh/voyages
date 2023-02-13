<?php
require_once 'application/common/article.php';
require_once 'application/models/ArticlesModel.php';
$articles = [];

foreach ($data as $key => $value) {
    extract($value);          
    $articles[$key] = new Article($id, $titre, $contenu, $img, $id_category, $id_user);    
}
?>


<div class="articles__main-container">    
    <?php foreach ($articles as $key => $value): ?>
        <div class="articles__item">
            <div class="articles-item__img-block" style="background-image: url(http://localhost/voyages/<?= $value->image ?>);">                
            </div>            
            <div class="articles-right">
                <div class="articles-item__text-content">
                    <h2>
                        <?= $value->title ?>
                    </h2>
                    <div class="articles-about flex justify-between">
                        <p class="user ">
                            Written by <u><?= ucfirst($value->getUserName($value->id))?></u>                            
                        </p>                        
                        <p class="category">
                            Category | <a href="http://localhost/voyages/articles/sort/<?=$value->categoriesID?>"><?= $value->getCategoryName($value->id)?></a>
                        </p>
                    </div>
                    <p id="contentPar">
                        <?= $value->content ?>
                    </p>
                </div>
                <div class="articles-link space-x-14">
                    <?php if ((isset($_SESSION['logged_user'])) &&
                    ($_SESSION['logged_user'] === 'admin' || 
                     $_SESSION['logged_user'] === 'moderateur' ||
                     $_SESSION['logged_user'] === $value->getUserName($value->id))):?>
                        <a data-id="<?=$value->id?>" id="edit_article" href="#">Edit article <i class="fa-solid fa-pen-to-square"></i></a>
                    <?php endif;?>
                    <?php if (isset($_SESSION['logged_user']) &&
                    ($_SESSION['logged_user'] === 'admin' || 
                     $_SESSION['logged_user'] === $value->getUserName($value->id))):?>
                        <a data-id="<?=$value->id?>" id="delete_article" href="#">Delete article <i class="fa-solid fa-trash"></i></a>
                    <?php endif;?>
                        <a href="http://localhost/voyages/articles/showOne/<?=$value->id?>" class="font-bold">Read article <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>