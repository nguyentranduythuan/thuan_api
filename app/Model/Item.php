<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }
}
