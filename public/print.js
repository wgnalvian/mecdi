let item1 = document.querySelectorAll('.pick_item')

$('#submit').click(function(){
    for( a = 0; a <= item.length;a++){
        item[a].querySelector('.val').setAttribute("value", item[a].querySelector('#data').textContent) 
        item[a].querySelector('.val_price').setAttribute("value", item[a].querySelector('H3').textContent)       
        document.querySelector('.jumitem').setAttribute("value", document.querySelector('#jumitem').textContent)
        document.querySelector('.subtotal').setAttribute("value", document.querySelector('#subtotal').textContent)
        document.querySelector('.total').setAttribute("value", document.querySelector('#total').textContent)
        
    }
   
})

$('input.search').on('keyup',function(){
 keyword = $(this).val()
 console.log(keyword)
    

     $.ajax({
        method : "POST",
        url : "/user/search",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        data : { keyword:keyword},            
        success : function(res){
            $('.list_menu').html(res);
        }
     })
                          
      
})