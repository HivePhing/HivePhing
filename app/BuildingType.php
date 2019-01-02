<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model
{
    protected $connection= 'mysql_service';

    protected $table = 'building_types';

    protected $primaryKey = 'building_id';

    protected $fillable=['building_type'];
    
    public $timestamps = false;
}
