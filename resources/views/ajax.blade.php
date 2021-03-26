<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Ajax</title>
</head>
<body>
    <div>
        <table>
            <thead id="thead"> 
                <th>name</th>
                <th>type</th>
                <th>price</th>
            </thead>  
             
        </table>
    </div>
</body>
</html>
<script>
 $.ajax({
        type : "GET",
        data : "",
        url : '/ajax/coba',
        success : function(result){

            $('#thead').after(result)
        }
 })


















    // $.ajax({
    //     type : "GET",
    //     data : "",
    //     url : '/ajax/coba',
    //     success : function(result){
    //         var Obj = JSON.parse(result);
    //         $.each(Obj, function(key, va){
    //             console.log(va);
    //             // var barisBaru = $("<tr>")
    //             // barisBaru.html("<td>"+ val.name +"</td><td>"+val.type+"</td><td>"+val.price+"</td>");
    //             // var data = $('#data');
    //             // data.append(barisBaru);
    //         })
    //     }
    // })
</script>

