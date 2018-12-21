<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 2.1</title>
</head>
<body>
    <?php
        $value1 = session()->get('city');
        $value2 = session()->get('business_hub');
        $value3 = session()->get('new_old');
        echo $value1." && ".$value2." && ".$value3;  
        ?>
      <form action='{{url('recommend2_1')}}' enctype="multipart/form-data" role="form"
      method="post">
      <h1>Ancient building ?</h1>
        <input type="radio" name="ancient" value="yes"> Yes<br>
        <input type="radio" name="ancient" value="no"> No<br>
        <input type="submit">
      </form>
</body>
</html>