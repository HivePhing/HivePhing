<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 4</title>
</head>
<body>
    <?php
        $value1 = session()->get('city');
        $value2 = session()->get('business_hub');
        $value3 = session()->get('new_old');
        $value4 = session()->get('in_ex_both');
        $value5 = session()->get('building_type');
        echo $value1." && ".$value2." && ".$value3." && ".$value4." && ".$value5;  
        ?>
      <form action='{{url('recommend5')}}' enctype="multipart/form-data" role="form"
      method="post">
      <hr>What do you want to paint?<hr>
      home<br>
        <input type="radio" name="item" value="ceiling"> ceiling<br>
        <input type="radio" name="item" value="wall"> wall<br>
        <input type="radio" name="item" value="door"> door <br>
        <input type="radio" name="item" value="floor"> floor <br>
        <input type="radio" name="item" value="kyee_kway_baung"> kyee_kway_baung<br>
        <input type="radio" name="item" value="cabinet"> cabinet<br>
        <input type="radio" name="item" value="steel_structure"> steel_structure <br>
        <input type="radio" name="item" value="other"> other <br>
        <input type="submit">
      </form>
</body>
</html>