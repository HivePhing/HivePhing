<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 7</title>
</head>
<body>
    <?php
        $value1 = session()->get('city');
        $value2 = session()->get('business_hub');
        $value3 = session()->get('new_old');
        $value4 = session()->get('in_ex_both');
        $value5 = session()->get('building_type');
        $value6 = session()->get('item');
        $value7 = session()->get('room');
        $value8 = session()->get('sqft');
        $value9 = session()->get('area');
        echo $value1." && ".$value2." && ".$value3." && ".$value4." && ".$value5." && ".$value6." && ".$value7." && ".$value8." && ".$value9;  
        ?>
      <form action='{{url('recommend8')}}' enctype="multipart/form-data" role="form"
      method="post">
      <h1>Supply Paint</h1>
      <input type="radio" name="yes_no" value="yes"> yes<br>
      <input type="radio" name="yes_no" value="no"> no<br>
        <input type="submit">
      </form>
</body>
</html>