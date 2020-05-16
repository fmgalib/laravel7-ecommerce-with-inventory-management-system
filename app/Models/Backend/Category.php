<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent(){
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function product(){
 		return $this->hasMany(Product::class);
 	}
}
