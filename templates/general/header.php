<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/Logo.bmp" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>DICODEV</title>
</head>
<body>
<header class="bg0">
    <nav class="header row container-fluid col-100">
        <ul class="nav col-50 row">
            <li class="h1 row">
                <a href="?home"><img src="../img/Logo.bmp" alt=""></a>
            </li>
            
        </ul>
        <ul class="nav2 row col-50">
            <li class="toggle-container">
                    <input type="checkbox" id="switch" name="theme" class="theme-input"/><label for="switch" class="theme-label">Toggle</label>
            </li>
            <?php
            if(isset($_SESSION['userId'])) {
            ?>
                <li>
                    <a href="?auth=profile">
                    
                    </a>
                </li>
                <li>
                    <a class="btn-nav-login" href="?auth=profile"><span>
                        <img class="user-solid"
                            src="../img/user-solid.svg"
                            alt="user logo"
                            
                             
                            />
                        </span>
                        <?= htmlspecialchars($_SESSION['userUsername']); ?></a>
                </li>
                <li>
                    <!-- <a class="btn-nav-sign" href="?auth=logout">Logout</a> -->
                    <nav role="navigation">
                            <div id="menuToggle">
                                
                                <input type="checkbox" />
                                
                                
                                <span></span>
                                <span></span>
                                <span></span>
                            
                                <ul id="menu">
                                <a href="?home"><li>Home</li></a>
                                <a href="#"><li>About</li></a>
                                <a href="#"><li>Info</li></a>
                                <a href="#"><li>Contact</li></a>
                                <a href="http://tessard.pro/formation" target="_blank"><li>TESSARD</li></a>
                                <a href="?auth=logout"><li>Déconnexion</li></a>
                            </ul>
                            </div>
                        </nav>
                </li>
            <?php 
            }
            else {
                ?> 
                
                <li>
                    <a class="btn-nav-sign" href="?auth=signup">Inscription</a>
                </li>
                <li>
                    <a class="btn-nav-login" href="?auth=login">
                        <span>
                        <img class="user-solid"
                            src="../img/user-solid.svg"
                            alt="user logo"
                            
                             
                            />
                        </span>
                        Connection</a>
                </li>
                <li>
                    <nav role="navigation">
                            <div id="menuToggle">
                                
                                <input type="checkbox" />
                                
                                
                                <span></span>
                                <span></span>
                                <span></span>
                            
                                <ul id="menu">
                                <a href="?home"><li>Home</li></a>
                                <a href="#"><li>About</li></a>
                                <a href="#"><li>Info</li></a>
                                <a href="#"><li>Contact</li></a>
                                <a href="http://tessard.pro/formation" target="_blank"><li>TESSARD</li></a>
                                </ul>
                            </div>
                        </nav>
                </li>
            <?php 
            }
            ?>
        </ul>
    </nav>
</header>