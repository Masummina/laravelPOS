<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_item extends Model
{
    public $table = "sale_items";
    public function invoice()
    {
    	return $this->belongsTo(Sale_invoice::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
