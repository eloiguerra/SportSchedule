<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> Perfil </title>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src = "javascript/jquery-min.js"></script>
        <script src = "javascript/profile.js"></script>
        <link rel = "stylesheet" href = "./css/cssReset.css">
        <link rel = "stylesheet" href = "./img/icons/css/all.min.css">
        <link rel = "stylesheet" href = "./css/profile.css">
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

            </section>

            <section class = "sectionInfo">
                <div id = "profilePhoto" class = "profilePhoto">
                    <form method = "post" action = "" id = "changeProfilePhoto" enctype = "multipart/form-data" class = "">
                        <input type = "file" id = "inputProfilePhoto" name = "inputProfilePhoto">
                        <label for = "inputProfilePhoto" id = "labelPhotoProfile" class = "label"><i class="fas fa-camera formIcon"></i> Trocar foto de perfil <label>
                    </form>
                </div>
                
                <div class = "profileAbout">
                    <div class = "title">
                        <h2> Sobre </h2>
                    </div>
                    <ul id = "listAbout" class = "listAbout">
                        <li id = "name" class = "itemAbout"></li>
                        <li id = "dateOfBirth" class = "itemAbout"> </li>
                    </ul>

                    <div class = "profileDescription"></div>
                </div>
            </section>
        </section>

        <div id = "modal-description" class = "modal-container">
            <div class = "modal">
                <button class = "dismiss">x</button>
                <div class = "title">
                    <label for = "editDescription"> Adicione uma descrição ao seu perfil </label>
                </div>
                <form id = "formEditDescription">
                    <textarea id = "editDescription" maxlength = "255"></textarea>
                    <div class = "editDescriptionFooter">
                        <input type = "submit" class = "neonButton" value = "Adicionar">
                        <p class = "remainChars">Restam 255 caracteres</p>
                    </div>
                </form>
                
            </div>
        </div>
    </body>
</html>