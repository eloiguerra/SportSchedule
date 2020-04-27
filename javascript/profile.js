$(document).ready(function(){
    loadProfilePhoto();
    loadProfileAbout();

    $('#asideToggle').on('click', function(){
        $('.aside').removeClass('hidden');
        $('.divAsideToggle').addClass('hidden');
        $('.closeAside').removeClass('hidden');
    }) 
 
    $('.closeAside').on('click', function(){
        $('.aside').addClass('hidden');
        $('.divAsideToggle').removeClass('hidden');
        $('.closeAside').addClass('hidden');
    })
 
    $('.logout').on('click', function(){
        windows.location.href = 'logout.php'
    })

    $('#inputProfilePhoto').on('change', function(){
        if($(this).val() == ''){
            $('#labelPhotoProfile').html('Nenhuma foto selecionada');
        }
        else{
            $('#changeProfilePhoto').submit();
        }
    })

    $('#profilePhoto').mouseover(function(){
        $('#changeProfilePhoto').addClass('d-flex')
    }).mouseout(function(){
        $('#changeProfilePhoto').removeClass('d-flex');
    });

    $('#changeProfilePhoto').on('submit', function(event){
        event.preventDefault();
        
        let photo = $('#inputProfilePhoto').val().trim();
        
        if(photo != ''){
            var fd = new FormData();
            var files = $('#inputProfilePhoto')[0].files[0];
            fd.append('file',files);
        
            $.ajax({
                url: 'importPhoto.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    console.log(response);
                    if(response != 0){
                        $('#changeProfilePhoto').trigger("reset");
                        loadProfilePhoto();
                    }else{;
                        $('.error').html('O arquivo enviado não possui um formato válido!');
                        $('.error').slideDown('slow');
						setTimeout(function(){
							$('.error').slideUp('slow');
						},3000);
                    }
                },
            });
        }
    });

    $(document).on('click', '#addDescription', function(){
        $('#modal-description').addClass('d-flex');
        
        $('#modal-description').on('click', function(e){
            if(e.target.id == 'modal-description' || e.target.className == 'dismiss'){
                $('#modal-description').removeClass('d-flex');
            }
        })
    })

    $('#editDescription').on('input', function(){
        let limit = 255;
        let digitedChars = $(this).val().length;
        let remainChars = limit - digitedChars;

        $('.remainChars').html('Restam ' + remainChars + ' caracteres ');
    })

    $('#formEditDescription').on('submit', function(event){
        event.preventDefault();
        
        $.ajax({
            url: 'importDescription.php',
            method: 'POST',
            data: {
                description:$('#editDescription').val()
            },
            success: function(){
                loadProfileAbout();
                $('#modal-description').removeClass('d-flex');
                $('#addDescription').remove();
            }
        })
    })

    function loadProfilePhoto(){
        $.ajax({
            url: 'exportPhoto.php',
            success: function(response){
                $('#profilePhoto').css("background-image", "url("+response+")");
            }
        })
    }

    function loadProfileAbout(){
        $.ajax({
            url: 'exportAbout.php',
            dataType: 'json',
            success: function(response){
                $('#name').html('<i class="fas fa-user infoIcon"></i>' + response.FULL_NAME);
                $('#dateOfBirth').html('<i class="fas fa-birthday-cake infoIcon"></i>' + response.DATEOFBIRTH);
                if(response.DESCRIPTION != null){
                    $('.profileDescription').html('<h2 class = "title"> Descrição </h2>'+'<p class = "userDescription">'+response.DESCRIPTION+'</p>');
                }
                else{
                    $('#listAbout').append('<li id = "addDescription" class = "itemAbout link"> <i class="fas fa-plus-circle infoIcon"></i> Adicionar sua descrição </li>');
                }
            }
        })
    }
 })