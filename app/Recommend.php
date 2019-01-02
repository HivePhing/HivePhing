<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $connection= 'mysql_service';

    protected $table = 'recommends';

    protected $primaryKey = 'id';

    protected $fillable=['user_name', 'email', 'phone', 'address', 'contactable_time', 'project_description', 'new_old', 'building_type', 'ancient', 'in_ex_both', 'painting_item', 'room_type', 'project_location', 'city_id', 'area', 'sqft', 'supply_paint', 'starting_date', 'period', 'attachment', 'created_at', 'updated_at'];
}
