<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WalletInfo;
use App\User;
use DB;

class TransactionInfoController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $user_id = $request->user_id;
        $permentnumber = $request->permentnumber;
        $status = $request->status;
        if (empty($user_id) && empty($permentnumber) && empty($status)) {
            $datas = WalletInfo::orderBy('id', 'DESC')->paginate(10);
        }else{
            $datas = WalletInfo::orderBy('id', 'DESC')->where('user_id', $user_id)->orWhere('status', $status)->orWhere('paymentNumber', $permentnumber)->paginate(10);
        }
        return view('admin.setup.transactionInfo.index', ['datas' => $datas]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $wallet_data = WalletInfo::find($id);
        $amount = $wallet_data->amount;
        $wallet_data->update(['status' => $status]);
        $user = User::find($wallet_data->user_id);
        $wallet = $user->wallet;
        if($status == 'complete'){
            $update_wallet = $wallet + $amount;
            $user->update(['wallet' => $update_wallet]);
        }
        return $status;
    }


    public function allCancel()
    {
        $all_cancel = WalletInfo::where('status', 'pandding');
        $all_cancel->update(['status' => 'cancel']);

        return back()
            ->with('success','All Cancel Successfully.');
    }

    public function getTransaction($id)
    {
        $transactionInfo = WalletInfo::orderBy('id', 'DESC')->where('user_id', $id)->get();
        if($transactionInfo)
            return response()->json($transactionInfo, 200);
        else
            return response()->json('failed', 404);
    }

}
