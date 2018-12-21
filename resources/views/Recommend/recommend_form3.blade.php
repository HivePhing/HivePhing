<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 3</title>
</head>
<body>
    <?php
        $value1 = session()->get('city');
        $value2 = session()->get('business_hub');
        $value3 = session()->get('new_old');
        $value4 = session()->get('in_ex_both');
        echo $value1." && ".$value2." && ".$value3." && ".$value4;  
        ?>
      <form action='{{url('recommend4')}}' enctype="multipart/form-data" role="form"
      method="post">
      <hr>building type<hr>
      home<br>
        <input type="radio" name="building_type" value="condo"> Condo<br>
        <input type="radio" name="building_type" value="apartment"> Apartment<br>
        <input type="radio" name="building_type" value="lone_chin"> Lone Chin <br>
        <input type="radio" name="building_type" value="bangalo"> Bangalo <br>
        home<br>
        <input type="radio" name="building_type" value="office"> Office<br>
        <input type="radio" name="building_type" value="shop"> Shop<br>
        <input type="radio" name="building_type" value="hotel"> Hotel<br>
        <input type="radio" name="building_type" value="factory"> Factory<br>
        <input type="radio" name="building_type" value="Workshop"> Workshop<br>
        <input type="radio" name="building_type" value="Store"> Store(Go daung)<br>
        <input type="radio" name="building_type" value="Monasty"> Monasty<br>
        <input type="submit">
      </form>
</body>
</html>