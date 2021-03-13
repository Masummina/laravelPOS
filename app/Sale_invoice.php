<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_invoice extends Model
{
    protected $fillable = ['date', 'note', 'challan_no', 'user_id', 'admin_id'];
    public $table = "Sale_invoices";
    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function items()
    {
    	return $this->hasMany(Sale_item::class);
    }
}
