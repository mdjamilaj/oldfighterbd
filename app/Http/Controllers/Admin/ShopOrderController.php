<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Invoice;
use App\User;
use App\Order;
use DB;


class ShopOrderController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $user_id = $request->user_id;
        $order_id = $request->order_id;
        $status = $request->status;
        if (empty($user_id) && empty($order_id) && empty($status)) {
            $datas = Invoice::orderBy('id', 'DESC')->paginate(10);
        }else{
            $datas = Invoice::where('user_id', $user_id)->orWhere('status', $status)->orWhere('id', $order_id)->paginate(10);
        }
        return view('admin.setup.shopOrder.index', ['datas' => $datas]);
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $invoice = Invoice::find($id);
        $sale_price = $invoice->total;
        $invoice->update(['status' => $status]);
        $user = User::find($invoice->user_id);
        $wallet = $user->wallet;
        if($status == 'cancel'){
            $update_wallet = $wallet + $sale_price;
            $user->update(['wallet' => $update_wallet]);
        }
        return $status;

    }

    public function show($id)
    {
        $invoices = DB::table('invoices')
        ->select('*')
        ->join('shop_details', 'shop_details.invoice_id', '=', 'invoices.id')
        ->join('products', 'products.id', '=', 'shop_details.product_id')
        ->where('invoices.id', $id)
        ->get();
        return view('admin.setup.shopOrder.show', ['datas' => $invoices]);
    }


    public function delete($id){
        $data=Order::find($id);
        $data->delete();
        return back();

    }
}
