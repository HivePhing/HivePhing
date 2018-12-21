<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 5</title>
</head>
<body>
    <?php
        $value1 = session()->get('city');
        $value2 = session()->get('business_hub');
        $value3 = session()->get('new_old');
        $value4 = session()->get('in_ex_both');
        $value5 = session()->get('building_type');
        $value6 = session()->get('item');
        echo $value1." && ".$value2." && ".$value3." && ".$value4." && ".$value5." && ".$value6;  
        ?>
      <form action='{{url('recommend6')}}' enctype="multipart/form-data" role="form"
      method="post">
      <h1>Room type</h1>
        <input type="radio" name="room" value="living_room"> living_room<br>
        <input type="radio" name="room" value="bedroom"> bedroom<br>
        <input type="radio" name="room" value="bathroom"> bathroom <br>
        <input type="radio" name="room" value="dining_room"> dining_room <br>
        <input type="radio" name="room" value="toilet"> toilet<br>
        <input type="radio" name="room" value="kitchen"> kitchen<br>
        <input type="radio" name="room" value="wa_yan_tar"> wa_yan_tar <br>
        <input type="submit">
      </form>
</body>
</html>