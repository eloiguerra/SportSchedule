$(document).ready(function(){
    $('#register').on('click', function(){
        $('.divLoginUser').addClass('hidden');
        $('.divRegisterUser').removeClass('hidden');
    })

    $('#login').on('click', function(){
        $('.divRegisterUser').addClass('hidden');
        $('.divLoginUser').removeClass('hidden');
    })


    $('#formLoginUser').on('submit', function(event){
        event.preventDefault();

        let email = $('#emailLogin').val().trim();
        let password = $('#passwordLogin').val().trim();
        let submitter = true;

        
        if(email == ''){
            $('#errorEmailLogin').html('O campo está vazio');
            $('#emailLogin').addClass('border-error');
            submitter = false;
        }
        else{
            let expression = new RegExp(/^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2,3}$/);
            if(!expression.test(email)){
                $('#errorEmailLogin').html('E-mail inválido');
                $('#emailLogin').addClass('border-error');
                submitter = false;
            }
        }

        $('#emailLogin').on('keyup', function(){
            setTimeout(function(){
                $('#errorEmailLogin').html('');
                $('#emailLogin').removeClass('border-error');
            }, 800);
        })

        if(password == ''){
            $('#errorPasswordLogin').html('O campo está vazio');
            $('#passwordLogin').addClass('border-error');
            submitter = false;
        }
        else if (password.length < 8 || password.length > 16){
            $('#errorPasswordLogin').html('A senha deve conter entre 8 e 16 caracteres');
            $('#passwordLogin').addClass('border-error')
            submitter = false;
        }

        $('#passwordLogin').on('keyup', function(){
            setTimeout(function(){
                $('#errorPasswordLogin').html('');
                $('#passwordLogin').removeClass('border-error');
            }, 800);
        })

        if(submitter){
            $.ajax({
                url: 'loginUser.php',
                method: 'post',
                data: $('#formLoginUser').serialize(),
                success: function(result){
                    console.log(result);
                    if(result){
                        window.location.href = "home.php";
                    }
                    else{
                        $('.error').html('E-mail ou senha inválidos !');
                        $('.error').slideDown('slow');
						setTimeout(function(){
							$('.error').slideUp('slow');
						},3000);
                    }
                }
            })
        }

    })


    $('#formRegisterUser').on('submit', function(event){
        event.preventDefault();

        let email = $('#emailRegister').val().trim();
        let name = $('#nameRegister').val().trim();
        let password = $('#passwordRegister').val().trim();
        let date = $('#dateOfBirthRegister').val().trim();
        let submitter = true;

        if(email == ''){
            $('#errorEmailRegister').html('O campo está vazio');
            $('#emailRegister').addClass('border-error');
            submitter = false;
        }
        else{
            let expression = new RegExp(/^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2,3}$/);
            if(!expression.test(email)){
                $('#errorEmailRegister').html('E-mail inválido');
                $('#emailRegister').addClass('border-error');
                submitter = false;
            }
        }

        $('#emailRegister').on('keyup', function(){
            setTimeout(function(){
                $('#errorEmailRegister').html('');
                $('#emailRegister').removeClass('border-error');
            }, 800);
        })

        if(name == ''){
            $('#errorNameRegister').html('O campo está vazio');
            $('#nameRegister').addClass('border-error');
            submitter = false;
        }
        else{
            let expression = new RegExp(/^[A-ZÀ-Ÿ][A-zÀ-ÿ']+\s([A-zÀ-ÿ']\s?)*[A-ZÀ-Ÿ][A-zÀ-ÿ']+$/);
            if(!expression.test(name)){
                $('#errorNameRegister').html('Nome inválido');
                $('#nameRegister').addClass('border-error');
                submitter = false;
            }
        }

        $('#nameRegister').on('keyup', function(){
            setTimeout(function(){
                $('#errorNameRegister').html('');
                $('#nameRegister').removeClass('border-error');
            }, 800);
        })

        if(password == ''){
            $('#errorPasswordRegister').html('O campo está vazio');
            $('#passwordRegister').addClass('border-error');
            submitter = false;
        }
        else if (password.length < 8 || password.length > 16){
            $('#errorPasswordRegister').html('A senha deve conter entre 8 e 16 caracteres');
            $('#passwordRegister').addClass('border-error')
            submitter = false;
        }

        $('#passwordRegister').on('keyup', function(){
            setTimeout(function(){
                $('#errorPasswordRegister').html('');
                $('#passwordRegister').removeClass('border-error');
            }, 800);
        })
        
        if(date == ''){
            $('#errorDateOfBirthRegister').html('Digite sua data de nascimento');
            $('#dateOfBirthRegister').addClass('border-error')
            submitter = false;
        }
        else{
            let expression = new RegExp(/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/);
            if(!expression.test(date)){
                $('#errorDateOfBirthRegister').html('Data de nascimento inválida');
                $('#dateOfBirthRegister').addClass('border-error')
                submitter = false;
            }
        }

        $('#dateOfBirthRegister').on('keyup', function(){
            setTimeout(function(){
                $('#errorDateOfBirthRegister').html('');
                $('#dateOfBirthRegister').removeClass('border-error');
            }, 800);
        })

        if(submitter){
            $.ajax({
                url: 'registerUser.php',
                method: 'POST',
                data: $('#formRegisterUser').serialize(),
                success: function(result){
                    console.log(result)
                    if(result){
                        //window.location.href = "home.php"
                    }
                    else{
                        $('.error').html('O email digitado já está sendo usado');
                        $('.error').slideDown('slow');
						setTimeout(function(){
							$('.error').slideUp('slow');
						},3000);
                    }
                },
            })
        }
    })
})