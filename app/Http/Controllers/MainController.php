<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Order;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home () {
        $data = Item::get();

        return view('home', compact('data'));
    }

    public function buyItem ($id) {
        $data = Item::find($id);

        return view('buy', compact('data'));
    }

    public function postBuyItem (Request $request) {
        $request->validate([
            'total_price' => 'required'
        ]);

        $total_price = $request->total_price;
        $user_id = 1;

        if ($total_price >= 2000000) {
            $order = Order::create([
                'user_id' => $user_id,
                'item_id' => $request->item_id,
                'order_date' => Carbon::now(),
                'total_price' => $total_price
            ]);

            $voucher_code = strtoupper(Str::random(10));

            $voucher = Voucher::create([
                'code' => $voucher_code,
                'user_id' => $user_id,
                'item_id' => $request->item_id,
                'order_id' => $order->id,
                'expired_at' => Carbon::now()->addMonths(3),
                'is_used' => false
            ]);

            if ($voucher && $order) {
                Alert::success('Success!', 'Order has been created!');
                return redirect('/');
            } else {
                Alert::error('Failed!', 'Something went wrong, please try again later!');
                return redirect('/');
            }
        } else {
            $order = Order::create([
                'user_id' => $user_id,
                'item_id' => $request->item_id,
                'order_date' => Carbon::now(),
                'total_price' => $total_price
            ]);

            if ($order) {
                Alert::success('Success!', 'Order has been created!');
                return redirect('/');
            } else {
                Alert::error('Failed!', 'Something went wrong, please try again later!');
                return redirect('/');
            }
        }
    }

    public function orderItems () {
        $data = Order::get();

        return view('order', compact('data'));
    }

    public function faktur ($id) {
        $data = DB::table('orders')
                ->join('vouchers', 'orders.id', '=', 'vouchers.order_id')
                ->select('orders.*', 'vouchers.code')
                ->where('orders.id', '=', $id)
                ->first();
        
        $no_voucher = false;
        
        if (!$data) {
            $data = Order::find($id);
            $no_voucher = true;

            return view('faktur', compact('data', 'no_voucher'));
        }

        return view('faktur', compact('data', 'no_voucher'));
    }

    public function orderConfirmed (Request $request, $id) {
        $request->validate([
            'voucher' => 'required',
            'total_price' => 'required'
        ]);

        $order = Order::find($id);

        if ($request->voucher != 'Not Used Voucher') {
            $order->user_id = $request->user_id;
            $order->item_id = $request->item_id;
            $order->voucher = $request->voucher;
            $order->total_price -= 10000;
            $order->confirmed = true;
        } else {
            $order->user_id = $request->user_id;
            $order->item_id = $request->item_id;
            $order->voucher = $request->voucher;
            $order->total_price = $request->total_price;
            $order->confirmed = true;
        }

        $order->save();

        if ($order) {
            Alert::success('Success!', 'Order hsa been confirmed!');
            return redirect('/orderitems');
        } else {
            Alert::error('Failed!', 'Something went wrong, please try again later!');
            return redirect('/orderitems');
        }
    }
}
