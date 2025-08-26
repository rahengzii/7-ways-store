<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect()->route('login')->with('error', 'Please login to checkout.');
        }

        $cartItems = session('cart_items', []);
        $cartCount = count($cartItems);
        $cartTotal = array_sum(array_map(fn($item) => $item['price'] * $item['qty'], $cartItems));

        return view('components.checkout', [
            'cart_items' => $cartItems,
            'cart_count' => $cartCount,
            'cart_total' => number_format($cartTotal, 2)
        ]);
    }

    // public function process(Request $request)
    // {
    //     $orderData = json_decode($request->input('order'), true);

    //     if (!$orderData || empty($orderData['items'])) {
    //         return response()->json(['error' => 'Invalid or empty order data'], 400);
    //     }

    //     // Validate order data against session to prevent tampering
    //     $cartItems = session('cart_items', []);
    //     $sessionSubtotal = array_sum(array_map(fn($item) => $item['price'] * $item['qty'], $cartItems));
    //     if (abs($sessionSubtotal - $orderData['subtotal']) > 0.01) {
    //         return response()->json(['error' => 'Cart data mismatch'], 400);
    //     }

    //     $userEmail = session('user.email', 'guest');
    //     $orderKey = "mf_orders_${userEmail}";
    //     $orders = session($orderKey, []);
    //     $orders[] = $orderData;
    //     session([$orderKey => $orders]);

    //     // Clear cart
    //     session(['cart_items' => [], 'cart_count' => 0, 'cart_total' => '0.00']);

    //     return response()->json(['order_id' => $orderData['id']]);
    // }
}

// class CheckoutController extends Controller
// {
//     public function index(Request $request, $orderId = null)
//     {
//         $orderId = $orderId ?: $request->query('order_id');

//         $order = null;
//         $payments = collect();
//         $items = collect();

//         if ($orderId) {
//             $order = DB::table('orders')->where('id', $orderId)->first();
//             if ($order) {
//                 $payments = DB::table('payments')->where('order_id', $order->id)->get();
//                 // load items from the associated cart (line_items parent_type='cart')
//                 if ($order->cart_id) {
//                     $items = DB::table('line_items as li')
//                         ->join('products as p', 'p.id', '=', 'li.product_id')
//                         ->leftJoin('product_images as pi', function ($j) {
//                             $j->on('pi.product_id', '=', 'p.id')->where('pi.is_primary', 1);
//                         })
//                         ->where('li.parent_type', 'cart')
//                         ->where('li.parent_id', $order->cart_id)
//                         ->get([
//                             'li.id','li.quantity','li.unit_price','li.line_total',
//                             'p.name as product_name','p.currency','pi.path as image_path'
//                         ]);
//                 }
//             }
//         }

//         return view('components.checkout', [
//             'module'   => 'checkout',
//             'order'    => $order,
//             'items'    => $items,
//             'payments' => $payments,
//         ]);
//     }
// }


// class CheckoutController extends Controller
// {
//     public function index()
//     {
//         $module = 'checkout';
//         return view('components.checkout', ['module' => $module]);
//     }
// }