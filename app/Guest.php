<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $connection= 'mysql_service';

    protected $table = 'guests';

    protected $primaryKey = 'phone';

    protected $fillable=['project_id', 'name', 'address', 'created_at', 'updated_at'];
}
