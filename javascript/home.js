$(document).ready(function(){
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
        window.location.href = 'logout.php';
    })

    $('#mainSearchInput').on('keyup', function(){
        if($(this).val().length > 0){
            $.ajax({
                url: 'searchUser.php',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    search:$(this).val()
                },
                success: function(response){
                    if(response != 0){
                        $('.listUsers').empty();
                        $('.listUsers').removeClass('hidden');
                        $.each(response, function(index, item){
                            $('.listUsers').append('<li class = "searchItem">\
                            <a href = "./profileBuilder.php?id='+item.EMAIL+'">\
                            <img src = "./'+item.PROFILE_PHOTO+'" width = "40px" height = "40px">'+item.FULL_NAME+'</a></li>');
                        });
                    }
                    else{
                        console.log(response);
                    }
                }
            })
        }
    })

    $('.notifications').on('click', loadFriendRequest);

    $(document).on('click', '.acceptFriend', function(){
        let target = $(this).closest('[data-id]');

        $.ajax({
            url: 'decideChangeRequest.php',
            method: 'POST',
            data:{
                accept:1,
                id: target.data('id')
            },
            success: function(response){
                console.log(response);
                loadFriendRequest();
            }
        })
    })

    $(document).on('click', '.deleteFriend', function(){
        let target = $(this).closest('[data-id]');

        $.ajax({
            url: 'decideChangeRequest.php',
            method: 'POST',
            data:{
                accept:0,
                id: target.data('id')
            },
            success: function(response){
                console.log(response);
                loadFriendRequest();
            }
        })
    })

    function loadFriendRequest(){
        $.ajax({
            url: 'loadFriendsRequest.php',
            method: 'POST',
            dataType: 'json',
            success: function(response){
                if(response == ''){
                    $('.listNotifications').empty();
                    $('.listNotifications').removeClass('hidden');
                    $('.listNotifications').append('<li> Sem pedidos de amizades restantes </li>');
                }
                else{
                    $('.listNotifications').empty();
                    $('.listNotifications').removeClass('hidden');
                    $.each(response, function(index, item){
                        $('.listNotifications').append('<li class = "listItem" data-id="'+item.ID_FRIENDSHIP+'">\
                            <div class = "listItemPhoto">\
                                <img src = "./'+item.PROFILE_PHOTO+'" width = "35px" height = "35px">\
                                <div class = "listItemPlus">\
                                    <p class = "listItemTitle">'+item.FULL_NAME+'</p>\
                                    <button class = "acceptFriend"><i class="fas fa-check"></i></button> <button class = "deleteFriend"><i class="fas fa-ban"></i></button>\
                                </div>\
                            </div>\
                        </li>');
                    })
                }
            }
        })
    }

})