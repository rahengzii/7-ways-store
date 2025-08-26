<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $userEmail = session('user.email', 'guest');
        $cartItems = session('cart_items', []);
        $cartCount = count($cartItems);
        $cartTotal = array_sum(array_map(fn($item) => $item['price'] * $item['qty'], $cartItems));

        // Update session
        // session([
        //     'cart_items' => $cartItems,
        //     'cart_count' => $cartCount,
        //     'cart_total' => number_format($cartTotal, 2)
        // ]);

        // Pass cart data to JavaScript for localStorage
        $cartData = json_encode($cartItems);

        return view('components.shopping-cart', [
            'cart_items' => $cartItems,
            'cart_count' => $cartCount,
            'cart_total' => number_format($cartTotal, 2)
        ])->with('cartData', $cartData);
    }

    
}

// class CartController extends Controller
// {
//     public function index(Request $request)
//     {
//         $sessionId = $request->session()->getId();

//         // Ensure a cart row exists for this session (unique by session_id per schema)
//         // carts: id, session_id, status, currency, totals...
//         $cart = DB::table('carts')->where('session_id', $sessionId)->first();

//         if (!$cart) {
//             $cartId = DB::table('carts')->insertGetId([
//                 'session_id' => $sessionId,
//                 'status'     => 'active',
//                 'currency'   => 'USD',
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//             $cart = DB::table('carts')->where('id', $cartId)->first();
//         }

//         // cart items (line_items where parent_type = 'cart')
//         $items = DB::table('line_items as li')
//             ->join('products as p', 'p.id', '=', 'li.product_id')
//             ->leftJoin('product_images as pi', function ($j) {
//                 $j->on('pi.product_id', '=', 'p.id')->where('pi.is_primary', 1);
//             })
//             ->where('li.parent_type', 'cart')
//             ->where('li.parent_id', $cart->id)
//             ->orderBy('li.created_at')
//             ->get([
//                 'li.id','li.quantity','li.unit_price','li.line_total',
//                 'p.id as product_id','p.name as product_name','p.currency',
//                 'pi.path as image_path','pi.alt as image_alt'
//             ]);

//         return view('components.shopping-cart', [
//             'module' => 'cart',
//             'cart'   => $cart,
//             'items'  => $items,
//         ]);
//     }
// }


// class CartController extends Controller
// {
//     public function index()
//     {
//         $module = 'cart';
//         return view('components.shopping-cart', ['module' => $module]);
//     }
// }