<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> Login </title>
        <meta charset = "UTF-8">
        <meta name= viewport content= width=device-width initial-scale=1>
        <script src = "javascript/jquery-min.js"></script>
        <script src = "javascript/index.js"></script>
        <script src = "javascript/map.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrOLViOEcD853xRHXT2_fBZ3VSK4ZVkoc&callback=initMap"
    async defer></script>
        <link rel = "stylesheet" href = "./css/cssReset.css">
        <link rel = "stylesheet" href = "./img/icons/css/all.min.css">
        <link rel = "stylesheet" href = "./css/index.css">
    </head>
    <body>
        <span class = "error"> </span>
        <div class = "container">
            <section class = "sectionForms">
                <div class = "divRegisterUser hidden">
                    <form class = "" id = "formRegisterUser">
                        <div class = "form-head">
                            <img src = "./img/SportScheduleLogo4.png" width="300x" height="180px">
                        </div>
                        <div class = "form-body">
                            <div class = "input-block">
                                <label for = "emailRegister"> <i class="fas fa-envelope"></i> </label>
                                <input type = "text" id = "emailRegister" name = "emailRegister" placeholder = "E-mail">
                            </div>
                            <p class = "msgError" id = "errorEmailRegister"> </p>
                            <div class = "input-block">
                                <label for = "nameRegister"> <i class="fas fa-user"></i> </label>
                                <input type = "text" name = "nameRegister" id = "nameRegister" placeholder = "Nome">
                            </div>
                            <p class = "msgError" id = "errorNameRegister"> </p>
                            <div class = "input-block">
                                <label for = "passwordRegister"> <i class="fas fa-key"></i> </label>
                                <input type = "password" name = "passwordRegister" id = "passwordRegister" placeholder = "Senha">
                            </div>
                            <p class = "msgError" id = "errorPasswordRegister"> </p>
                            <div class = "input-block">
                                <label for = "dateOfBirthRegister"> <i class="fas fa-birthday-cake"></i> </label>
                                <input type = "text" name = "dateOfBirthRegister" id = "dateOfBirthRegister" placeholder = "Data de nascimento">
                            </div>
                            <p class = "msgError" id = "errorDateOfBirthRegister"> </p>
                            <div class = "input-block">
                                <input type = "submit" class = "inputSubmit" name = "submitRegister" id = "submitRegister" value = "Cadastrar">
                            </div>     
                        </div>
                        <div class = "form-footer">
                            <p class = "link" id = "login"> Já tenho uma conta ! </p>
                        </div>
                    </form>
                </div>
                
                <div class = "divLoginUser">
                    <form class = "" id = "formLoginUser">
                        <div class = "form-head">
                            <img src = "./img/SportScheduleLogo4.png" width="300x" height="180px">
                        </div>
                        <div class = "form-body">
                            <div class = "input-block">
                                <label for = "emailLogin"> <i class="fas fa-envelope"></i> </label>
                                <input type = "text" id = "emailLogin" name = "emailLogin" placeholder = "E-mail">
                            </div>
                            <p class = "msgError" id = "errorEmailLogin"> </p>
                            <div class = "input-block">
                                <label for = "passwordLogin"> <i class="fas fa-key"></i> </label>
                                <input type = "password" name = "passwordLogin" id = "passwordLogin" placeholder = "Senha">
                            </div>
                            <p class = "msgError" id = "errorPasswordLogin"> </p>
                            <div class = "input-block">
                                <input type = "submit" class = "inputSubmit" name = "submitLogin" id = "submitLogin" value = "Login">
                            </div> 
                        </div>
                        <div class = "form-footer">   
                            <p class = "link" id = "register"> Ainda não tem uma conta ? </p>   
                        </div>
                    </form>
                </div>     
            </section>
            
            <section class = "sectionMap">
                <div class = "map-style">
                    <div class = "map-head">
                        <p> Torneios próximos a você </p>
                    </div>
                    <div id = "map"></div>
                </div>
                
            </section>
        </div>
    </body>
</html>