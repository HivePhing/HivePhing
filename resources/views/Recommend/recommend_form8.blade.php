<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 8</title>
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
        echo $value1." && ".$value2." && ".$value3." && ".$value4." && ".$value5." && ".$value6." && ".$value7." && ".$value8." && ".$value9." && ".$value10;  
        ?>
      <form action='{{url('recommend9')}}' enctype="multipart/form-data" role="form"
      method="post">
      <h1>when to start ?</h1>
      <input type="radio" name="starting_date" value="tomorrow"> tomorrow<br>
        <input type="radio" name="starting_date" value="week"> wtihin a week<br>
        <input type="radio" name="starting_date" value="month"> within a month <br>
        <input type="radio" name="starting_date" value="year"> wtihin a year<br>

      <h1>Project period ?</h1>
      <input type="radio" name="period" value="day"> within a day<br>
      <input type="radio" name="period" value="week"> wtihin a week<br>
      <input type="radio" name="period" value="month"> within a month <br>
      <input type="radio" name="period" value="year"> wtihin a year<br>
        <input type="submit">
      </form>
</body>
</html>