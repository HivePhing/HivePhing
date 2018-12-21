<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $connection= 'mysql_service';

    protected $table = 'room_types';

    protected $primaryKey = 'room_id';

    protected $fillable=['room_type'];
    
    public $timestamps = false;
}