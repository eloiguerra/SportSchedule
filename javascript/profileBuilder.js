$(document).ready(function(){
    verifyFriend();

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

    $('.friendRequest').on('click', function(){
        $.ajax({
            url: 'friendRequest.php',
            method: 'POST',
            data:{
                id:this.id
            },
            success: function(response){
                if(response == 2){
                    $('.friendRequest').html('Pedido enviado com sucesso !');
                }
                else if(response == 1){
                    $('.friendRequest').html('Sua solicitação de amizade ainda não foi aceita !');
                }
                else{
                    $('.friendRequest').remove();
                }
            }
        })
    })

    function verifyFriend(){
        $.ajax({
            url: 'friendRequest.php',
            method: 'POST',
            data:{
                id: $('.friendRequest').attr('id')
            },
            success: function(response){
                if(response == 2){
                    $('.friendRequest').html('Pedido enviado com sucesso !');
                }
                else if(response == 1){
                    $('.friendRequest').html('Sua solicitação de amizade ainda não foi aceita !');
                }
                else{
                    $('.friendRequest').remove();
                }
            }
        }) 
    }
 })