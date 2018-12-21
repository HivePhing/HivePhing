<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 1</title>
</head>
<body>
    <?php
        $value1 = session()->get('city');
        $value2 = session()->get('business_hub');
        echo $value1." && ".$value2;  
        ?>
      <form action='{{url('recommend2')}}' enctype="multipart/form-data" role="form"
      method="post">
        <input type="radio" name="new_old" value="new"> New<br>
        <input type="radio" name="new_old" value="old"> Old<br>
        <input type="submit">
      </form>
</body>
</html>