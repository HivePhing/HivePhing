<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaintingItem extends Model
{
    protected $connection= 'mysql_service';

    protected $table = 'painting_items';

    protected $primaryKey = 'item_id';

    protected $fillable=['painting_item'];
    
    public $timestamps = false;
}
