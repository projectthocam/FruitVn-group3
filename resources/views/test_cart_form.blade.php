<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
</head>
<body>
    <form id='cart' method="post" action='/cart'>
    <input type="hidden" name="_token"value="{{csrf_token()}}">
    <input type="text" name='name' value=''>
    <br>
    <input type="text" name='age' value=''>
    <button type="submit" class="btn btn-primary">Submit</button>
    <h1> Thông tin: </h1>
    <div id="test"></div>
    </form>
    <script type="text/javascript">
        $('#cart').on('submit',function(e){
            e.preventDefault();
            let name = $('.name').val();
            let age = $('.age').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "cart",
                type:"POST",
                data:{
                    name:name,
                    age:age,
                },
                success:function(data){
                    console.log(data);
                },
            });
        });
    </script>
</body>

</html>