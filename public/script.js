

$('.pick_item').hide()
let coitem = document.querySelector('.item');
let item = document.querySelectorAll('.pick_item');
let menu = document.querySelectorAll('.tambah');
let url = "user/all";
 





    $.ajax({
        type : "GET",
        data : "",
        
        url : url,
        success : function(result){
            $('.list_menu').append(result);
            

            $('.tambah').click(function(e){  
               
                
                
                    
                    
           
               
                coitem.querySelector('#' + e.currentTarget.id).style.display = 'block'; 
                

            });
            
                          
        }
     })
     



$('#burger').click(function(){
    $.ajax({
        type : "GET",
        data : "",
        
        url : 'user/burger',
        success : function(result){
            $('.list_menu').html(result);
                 


            $('.tambah').click(function(e){  
                
                
                   
                    
           
               
             
                coitem.querySelector('#' + e.currentTarget.id).style.display = 'block'; 
                

            });
            
                          
        }
     })
})
$('#all').click(function(){
    $.ajax({
        type : "GET",
        data : "",
        
        url : url,
        success : function(result){
            $('.list_menu').html(result);
                    


            $('.tambah').click(function(e){  
                let harga = e.target.offsetParent.id.split('$'); 
                let total = 0;
                
                    
                    
           
             
             
                coitem.querySelector('#' + e.currentTarget.id).style.display = 'block'; 
                

            });
            
                          
        }
     })
})

$('#pizza').click(function(){
    $.ajax({
        type : "GET",
        data : "",
        
        url : 'user/pizza',
        success : function(result){
            $('.list_menu').html(result);
                 


            $('.tambah').click(function(e){  
                
                
                   
                    
           
               
             
                coitem.querySelector('#' + e.currentTarget.id).style.display = 'block'; 
                

            });
            
                          
        }
     })
})
$('#drink').click(function(){
    $.ajax({
        type : "GET",
        data : "",
        
        url : 'user/drink',
        success : function(result){
            $('.list_menu').html(result);
                 


            $('.tambah').click(function(e){  
                
                
                   
                   
           
               
             
                coitem.querySelector('#' + e.currentTarget.id).style.display = 'block'; 
                

            });
            
                          
        }
     })
})
let arr = [];
let arritem = [];
let total = 0;
let totalitem;

for(let i = 0; i <= item.length;i++){
    
    item[i].querySelector('#plus').addEventListener('click', function(e){
    
      
        
    let price = item[i].querySelector('H2').textContent;
    let arrprice = price.split('$');
    let data = parseInt(item[i].querySelector('#data').textContent); 
    data += 1;
    arritem[i] = data;

    totalitem = arritem.reduce((val, nilaiSekarang)=>{
        return val + nilaiSekarang;
    },0)
    
    $('#jumitem').text(totalitem + " item")
    
     item[i].querySelector('#data').innerHTML = String(data);
     let cost = parseInt(arrprice[1]) * data ;
     
     arr[i] = cost; 
     let coststring = String("$" + cost);
    item[i].querySelector('H3').innerHTML = coststring;   
    
    
    total = arr.reduce((val, nilaiSekarang)=>{
        return val + nilaiSekarang
    },0)
   
   
    totalString = String('$' + total);
    
    document.querySelector('#subtotal').innerHTML = totalString;
    document.querySelector('#total').innerHTML = totalString; 
    
    
    
   

    
    
    
 

})
    item[i].querySelector('#min').addEventListener('click', function(){
    let price = item[i].querySelector('H2').textContent;
    let arrprice = price.split('$');
    let price2 = item[i].querySelector('H3').textContent;
    let arrprice2 = price2.split('$');
    let data = parseInt(item[i].querySelector('#data').textContent); 
    if(data == 0){
        data = 0;
        arritem[i] = data;
    }
    else{
        data -= 1;
        arritem[i] = data;
    }

    totalitem = arritem.reduce((val, nilaiSekarang)=>{
        return val + nilaiSekarang;
    },0)
    $('#jumitem').text(totalitem + " item")
    
    
    item[i].querySelector('#data').innerHTML = data;
    let cost2 = parseInt(arrprice2[1]) - parseInt(arrprice[1]) ;
    let coststring2 = String("$" + cost2);
    item[i].querySelector('H3').innerHTML = coststring2;
    arr[i] = cost2;
    
    total = 0;
    total = arr.reduce((val, nilaiSekarang)=>{
        return val + nilaiSekarang
    },0)
   
    totalString = String('$' + total);
    
    document.querySelector('#subtotal').innerHTML = totalString;
    document.querySelector('#total').innerHTML = totalString;
    
    
   
    
   })    
  
   
}








