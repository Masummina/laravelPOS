<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Product;
use App\Sale_invoice;
use App\User;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSaleController extends Controller
{
    public function __construct()
    {
       $this->data['user_tab'] = 'seles';
    }
    public function sales($id){
        $this->data['user'] = User::findOrFail($id);
        return view('users.sales.sales', $this->data);
        // return $this->data['sales'] = $user->sales;
    }

    public function createInvoice(InvoiceRequest $request, $id)
    {
      // dd($request->date);
        $Formdata = $request->all();
        $Formdata['user_id'] = $id;
        $Formdata['admin_id'] = Auth::id();
        if(Sale_invoice::create($Formdata)){
            Session::flash('message', 'Sales invoice create successfully');
        }

        return redirect()->route('sales', ['id'=> $id]);
    }

    public function invoice($id, $invoice_id)
    {
        $this->data['user'] = User::findOrFail($id);
         $this->data['invoice'] = Sale_invoice::findOrFail($invoice_id);
        return $this->data['invoice']->items;
        return view('users.sales.user_view', $this->data);
    }

    
}
