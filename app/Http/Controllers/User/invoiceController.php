<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if (!session('user')) {
            return redirect()->route('login')->with('error', 'Please login to view invoices.');
        }
        $orderId = $request->query('order');
        if (!$orderId) {
            return redirect()->route('profile')->with('error', 'Invalid order ID.');
        }
        return view('components.invoice');
    }
}



// class InvoiceController extends Controller
// {
//     public function index(Request $request, $orderId = null)
//     {
//         $orderId = $orderId ?: $request->query('order_id');

//         abort_if(!$orderId, 404);

//         $order = DB::table('orders')->where('id', $orderId)->first();
//         abort_if(!$order, 404);

//         $items = collect();
//         if ($order->cart_id) {
//             $items = DB::table('line_items as li')
//                 ->join('products as p', 'p.id', '=', 'li.product_id')
//                 ->where('li.parent_type', 'cart')
//                 ->where('li.parent_id', $order->cart_id)
//                 ->get([
//                     'li.quantity','li.unit_price','li.line_total','p.name as product_name','p.currency'
//                 ]);
//         }

//         $payments = DB::table('payments')->where('order_id', $order->id)->get();

//         return view('components.invoice', [
//             'module'   => 'invoice',
//             'order'    => $order,
//             'items'    => $items,
//             'payments' => $payments,
//         ]);
//     }
// }


// class InvoiceController extends Controller
// {
//     public function index()
//     {
//         $module = 'invoice';
//         return view('components.invoice', ['module' => $module]);
//     }
// }