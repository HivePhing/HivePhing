<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountGuest extends Model
{
    protected $connection= 'mysql_service';

    protected $table = 'count_guests';

    protected $primaryKey = 'id';

    protected $fillable=['user_name', 'email', 'phone', 'contactable_time', 'count', 'created_at', 'updated_at'];
}
