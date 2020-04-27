<?php
    require_once('./class/Conexao.php');
    require_once('./class/User.php');

    if(!isset($_GET['id'])):
        header("Location:home.php");
    else:
        $user = new User();
        $result = $user->profileVisit($_GET['id']);
        if($result->PROFILE_TYPE == 'public'):
            echo '
            <!DOCTYPE html>
            <html lang = "en">
                <head>
                    <title> Perfil </title>
                    <meta charset = "utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <script src = "javascript/jquery-min.js"></script>
                    <script src = "javascript/profileBuilder.js"></script>
                    <link rel = "stylesheet" href = "./css/cssReset.css">
                    <link rel = "stylesheet" href = "./img/icons/css/all.min.css">
                    <link rel = "stylesheet" href = "./css/profileBuilder.css">
                </head>
                <body>
                    <span class = "error"></span>
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
                                    <li><a href = "logout.php" class = ""> <i class="fas fa-sign-out-alt"></i> Sair </a></li>
                                </ul>
                            </div>
                        </aside>
                        
                        <section class = "sectionPubli">
                            <header class = "header">
                                <form id = "mainSearchForm">
                                    <input type = "text" id = "mainSearchInput" class = "mainSearch" placeholder = "pesquisa">
                                    <button type = "submit" class = "buttonMainSearch"><i class="fas fa-search"></i></button>    
                                </form>
                                <ul class = "listUsers hidden"></ul>
                                <button type = "button" class = "friendRequest" id = '.$_GET['id'].'><i class="fas fa-user-plus"></i> Solicitar Amizade</button>
                            </header>
                        </section>
            
                        <section class = "sectionInfo">
                            <div id = "profilePhoto" class = "profilePhoto" style = "background-image:url('.$result->PROFILE_PHOTO.')"></div>
                            
                            <div class = "profileAbout">
                                <div class = "title">
                                    <h2> Sobre </h2>
                                </div>
                                <ul id = "listAbout" class = "listAbout">
                                    <li id = "name" class = "itemAbout"><i class="fas fa-user infoIcon"></i>'.$result->FULL_NAME.'</li>
                                    <li id = "dateOfBirth" class = "itemAbout"><i class="fas fa-birthday-cake infoIcon"></i>'.$result->DATEOFBIRTH.'</li>
                                </ul>

                                <div class = "profileDescription">
            ';
                                if($result->DESCRIPTION != null):
                                    echo $result->DESCRIPTION;      
                                endif;
            echo '
                                </div>
                            </div>
                        </section>
                    </section>
                </body>
            </html>
            ';
        else:
            
        endif;
    endif;
?>
