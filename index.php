<?php 
session_start();
require_once('includes/functions.php');
?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dan's Blog</title>
    <script src="includes/js/jquery/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="includes/bootstrap/bootstrap-3.3.4-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/bootstrap/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
    <script src="includes/bootstrap/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <script src="includes/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="includes/js/main.js"></script>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
    <?php print_r($_SESSION);?>
    <header id="main_header">
        <nav id="main_nav" class="navbar navbar-default">
            <ul id="main_menu" class="navbar-header">
                <li><a>Home</a></li>
                <li><a>Explore</a></li>
                <li><a>Manage</a></li>
                <li>
                    <div class="login_dialog collapse" id="mini_login_form">
                        <form class="login_form login_small">
                            <input type="text" name="login_name" placeholder="email">
                            <input type="password" name="login_pass" placeholder="password">
                            <button type="button" class="login_submit btn btn-default" name="login_submit" onclick="login_user(this);">Login</button>
                        </form>
                    </div>
                    <a data-toggle="modal" onclick="$('#mini_login_form').toggle()" class="login_link">Login</a>
                    <a data-toggle="modal" class="logout_link hidden">Login</a></li>
            </ul>
<?php
if(is_loggedin()){
    $greeting = $_SESSION['userinfo']['greeting'];
    $avatar = $_SESSION['userinfo']['avatar'];
}
else{
    $greeting = 'Hello, Anonymous user.';
    $avatar = 'images/538474-user_512x512.png';
}
?>
            <nav id="user_info">
                <img src="<?=$avatar;?>" class="avatar avatar_small">
                <span class="greeting"><?=$greeting;?></span>
            </nav>
        </nav>

    </header>
    <main id="main_content" class="container col-md-offset-1 col-md-10">
        <?php
            include('includes/views/create.php');
        ?>
    </main>



</body>
</html>