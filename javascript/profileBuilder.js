$(document).ready(function(){
    verifyStatusFriend();

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
        if($(this).attr('class') == "friendRequest"){
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

    $(document).on('click', '.acceptFriend', function(){
        $.ajax({
            url: 'importIdFriendship.php',
            method: 'POST',
            data:{
                id: this.id
            },
            success: function(response){
                $.ajax({
                    url: 'decideChangeRequest.php',
                    method: 'POST',
                    data:{
                        accept:1,
                        id:response
                    }
                })
            }
        })
    })

    function verifyStatusFriend(){
        $.ajax({
            url: 'friendStatusVerify.php',
            method: 'POST',
            data:{
                id:$('.friendRequest').attr('id')
            },
            success: function(response){
                if(response == 2){
                    $('.friendRequest').html('<i class="fas fa-user-plus"></i> Solicitar Amizade');
                }
                else if(response == 1){
                    $('.friendRequest').html('Solicitação enviada!');
                }
                else if(response == 0){
                    $('.friendRequest').removeClass('friendRequest').addClass('acceptFriend');
                    $('.acceptFriend').html('<i class="fas fa-user-plus"> Aceitar Solicitação');
                }
                else{
                    $('.friendRequest').remove();
                }
            }
        }) 
    }
 })