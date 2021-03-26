$('.sileft').click(function(){

    $('.sidebar').css('left', '0')
})

$('.wallet').click(function(){    
    $('.fa-times').show()
    
    $('.list_item').fadeIn(500)
    

    
})
$('.times').click(function(){
    $('.list_item').fadeOut()
})
$('#back').click(function(){
    $('.sidebar').css('left', '-130px')
})
if ($(window).width() == 1288) {
    $('.sidebar').css('left', '0')
    
    
}

if ($(window).width() <= 1287) {
    $('.sidebar').css('left', '-130px')
    
    
}


    $(window).resize(function() {
        
            $('.sidebar').css('left', '0')
            
            if ($(window).width() <= 1287) {
                $('.sidebar').css('left', '-130px')
                
                
            }
        }
        
        
    
      );
      
