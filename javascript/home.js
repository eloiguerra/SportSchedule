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

   /*$(document).on('click', '.searchItem', function(){
        $.post("profileBuilder.php", {email: this.id} );
        window.location.href = "profileBuilder.php";
   })*/
})