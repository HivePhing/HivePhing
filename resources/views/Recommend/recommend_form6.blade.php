<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 6</title>
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
        echo $value1." && ".$value2." && ".$value3." && ".$value4." && ".$value5." && ".$value6." && ".$value7;  
        ?>
      <form action='{{url('recommend7')}}' enctype="multipart/form-data" role="form"
      method="post">
      <h1>Total Area</h1>
      <input type="radio" name="sqft" value="sq_ft"> Sq_ft<br>
      <input type="radio" name="sqft" value="10sq_ft"> 10 Sq_ft<br>
        <input type="text" name="area"><br>
        <input type="submit">
      </form>
</body>
</html>