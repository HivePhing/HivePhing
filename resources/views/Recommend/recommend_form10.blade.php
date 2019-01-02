<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 10</title>
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
        $value10 = session()->get('yes_no');
        $value11 = session()->get('starting_date');
        $value12 = session()->get('period');
        $value13 = session()->get('project_location');
        echo $value1." && ".$value2." && ".$value3." && ".$value4." && ".$value5." && ".$value6." && ".$value7;  
        echo " && ".$value8." && ".$value9." && ".$value10." && ".$value11." && ".$value12." && ".$value13;
        ?>
      <form action='{{url('recommend11')}}' enctype="multipart/form-data" role="form"
      method="post">
      <h1>Project Description</h1>
      <input type="text" name="project_description"><br> 
        <input type="submit">
      </form>
</body>
</html>