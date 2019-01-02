<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 2</title>
</head>
<body>
    <?php
        $value1 = session()->get('city');
        $value2 = session()->get('business_hub');
        $value3 = session()->get('new_old');
        $value4 = session()->get('ancient');
        echo $value1." && ".$value2." && ".$value3." && ".$value4;  
        ?>
      <form action='{{url('recommend3')}}' enctype="multipart/form-data" role="form"
      method="post">
        <input type="radio" name="in_ex_both" value="interior"> Interior<br>
        <input type="radio" name="in_ex_both" value="exterior"> Exterior<br>
        <input type="radio" name="in_ex_both" value="both"> Both<br>
        <input type="submit">
      </form>
</body>
</html>