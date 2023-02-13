<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $page_title ?>
    </title>
    <link rel="stylesheet" href="http://localhost/voyages/styles/defaultblog.css">
    <link rel="stylesheet" href="http://localhost/voyages/styles/login.css">
    <link rel="stylesheet" href="http://localhost/voyages/styles/register.css">
    <link rel="stylesheet" href="http://localhost/voyages/styles/articles.css">
    <link rel="stylesheet" href="http://localhost/voyages/styles/popups.css">
    <link rel="stylesheet" href="http://localhost/voyages/styles/article.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cf646263c8.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- HIDDEN BLOCK (EDIT/DELETE ARTICLE) -->
    <div class="popups-container fixed z-10">
        <div class="cross-close">
            <span></span>
            <span></span>
        </div>
        <div class="popups-menu__delete">
            <form action="" method="post" class="delete__form">
                <div class="popups-menu__form-container space-y-6">
                    <h2>Are you sure you want to delete this article?</h2>
                    <p>You will not be able to restore it later</p>
                    <button type="submit">Delete article</button>
                </div> 
            </form>
        </div>
        <div class="popups-menu__edit">
            <form action="" method="post" enctype="multipart/form-data" class="edit__form">
                <div class="popups-menu__form-container space-y-6">
                    <h2>Edit article</h2>
                    <div>                        
                        <label for="edit_title">Title</label>
                        <textarea name="title" id="edit_title" cols="30" rows="2" name="title"></textarea>
                    </div>
                    <div>
                        <label for="edit_category">Category</label>
                        <select name="category" id="edit_category" style="color: black;">                            
                        </select>
                    </div>
                    <div>
                        <label for="edit_content">Article</label>
                        <textarea name="content" id="edit_content" cols="30" rows="10" name="content"></textarea>
                    </div>
                    <div class="fake-input__wrapper">
                        <label for="edit_img" class="relative z-10" id="fake_label">ADD FILE
                            <input type="file" id="edit_img" name="image" class="absolute top-0 left-0 w-full h-full z-20">
                            <p class="absolute" id="filename-container"></p>                            
                        </label>                                       
                    </div>
                    <button type="submit">confirm changes</button>
                </div> 
            </form>
        </div>
    </div>
    <!-- END OF HIDDEN BLOCK (EDIT/DELETE ARTICLE) -->

    <header>
        <div class="main-container header-container">
            <div class="logo-block">
                <p class="logo"><a href="http://localhost/voyages/">MyMysicStuffBlog</a></p>
            </div>
            <div class="nav-block__wrapper flex space-x-8">
                <nav class="nav-block">
                    <ul class="space-x-6">                        
                        <li class="page-select">Voyages page
                            <ul class="page-select__list flex-col">
                                <li><a href="http://localhost/voyages/voyages">Main page</a></li>
                                <li><a href="">Country</a></li>
                            </ul>
                        </li>
                        <li><a href="http://localhost/voyages/articles">Blog</a></li>
                        <li class="cat-select">
                            Categories
                            <ul class="cat-select__list flex-col">
                                <li><a href="http://localhost/voyages/articles/sort/1">Guitars</a></li>
                                <li><a href="http://localhost/voyages/articles/sort/2">Amplifiers</a></li>
                                <li><a href="http://localhost/voyages/articles/sort/3">Pedals</a></li>
                                <li><a href="http://localhost/voyages/articles/sort/4">Speakers/Headphones</a></li>
                            </ul>
                        </li>
                        <li><a href="http://localhost/voyages/account/register">Sign in</a></li>
                        <li><a href="http://localhost/voyages/account/login">Sign up</a></li>
                    </ul>
                </nav>
                <?php if (isset($_SESSION['logged_user'])): ?>
                    <div class="user-data">
                        <p>
                            <i class="fa-solid fa-user"></i>Hi, <?= ucfirst($_SESSION['logged_user']) ?>
                        </p>
                        <i class="fa-solid fa-arrow-right-to-bracket">LogOut</i>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </header>
    <div class="main-container">
        <?php include $page_content ?>
    </div>
    <footer>
        <div class="logo-block">
            <p class="logo">MyMysicStuffBlog</p>
        </div>
    </footer>
    <script src="http://localhost/voyages/scripts/script.js"></script>
    <script src="http://localhost/voyages/scripts/register.js"></script>
    <script src="http://localhost/voyages/scripts/login.js"></script>
    <script src="http://localhost/voyages/scripts/editArticle.js"></script>
    <script src="http://localhost/voyages/scripts/deleteArticle.js"></script>
    <script src="http://localhost/voyages/scripts/addComment.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</body>

</html>