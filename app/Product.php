<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
    protected $fillable = ['title', 'description', 'cost_price', 'price', 'category_id'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    /**
    * Getting array for select option
    **/
    public static function arrayForSelect() {
    	$arr = [];
    	$products = Product::all();
        foreach ($products as $product) {
            $arr[$product->id] = $product->title;
        } 

        return $arr;
    }

}
