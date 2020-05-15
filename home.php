<?php
    session_start();
    if(!isset($_SESSION['user'])):
        header('Location:index.php');
    endif;
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> Home </title>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src = "javascript/jquery-min.js"></script>
        <script src = "javascript/home.js"></script>
        <!--<script src = "javascript/map.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrOLViOEcD853xRHXT2_fBZ3VSK4ZVkoc&callback=initMap"
    async defer></script>-->
        <link rel = "stylesheet" href = "./css/cssReset.css">
        <link rel = "stylesheet" href = "./img/icons/css/all.min.css">
        <link rel = "stylesheet" href = "./css/home.css">
    </head>
    <body>
        <section class = "container">
            <div class = "divAsideToggle">
                <i class="fas fa-bars" id = "asideToggle"></i>
            </div>
           
            <aside class = "aside hidden">
                <div class = "navHead">
                    <div class = "closeAside">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class = "navLogo">
                        <img src = "./img/SportScheduleLogo4.png" width="250x" height="150px"/>
                    </div>
                </div>

                <div class = "navMenu">
                    <ul>
                        <li><a href = "home.php" class = ""> <i class="fas fa-home"></i> Home </a></li>
                        <li><a href = "profile.php" class = ""> <i class="fas fa-user"></i> Perfil </a> </li>
                        <li><a href = "events.php" class = ""> <i class="fas fa-calendar-check"></i> Eventos </a></li>
                        <li><a href = "settings.php" class = ""> <i class="fas fa-cog"></i> Configurações </a></li>
                        <li><a href = "logout.php" class = "red"> <i class="fas fa-sign-out-alt"></i> Sair </a></li>
                    </ul>
                </div>
            </aside>

            <main class = "main">
                <header class = "header">
                    <form id = "mainSearchForm">
                        <input type = "text" id = "mainSearchInput" class = "mainSearch" placeholder = "pesquisa">
                        <button type = "submit" class = "buttonMainSearch"><i class="fas fa-search"></i></button>    
                    </form>
                    <ul class = "listUsers hidden"></ul>
                </header>
            </main>

            <section class = "chatbox">
                <div class = "iconbox">
                    <div class = "notifications">
                        <i class="fas fa-user-plus"></i>
                        <ul class = "listNotifications hidden">
                            
                        </ul>
                    </div>
                </div>
            </section>
        </section>
    </body>
</html>