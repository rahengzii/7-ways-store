<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shopDetailContoller extends Controller
{
    public function index()
    {
        $module = 'shop-detail';
        return view('components.shop-detail', ['module' => $module]);
    }
}

// class shopDetailContoller extends Controller
// {
//     public function index(Request $request, $slug = null)
//     {
//         $slug = $slug ?: $request->query('slug');

//         // Fallback to latest product if no slug is given
//         $product = DB::table('products')->when($slug, fn($q) => $q->where('slug', $slug))
//             ->orderByDesc('created_at')->first();

//         if (!$product) {
//             abort(404);
//         }

//         // images for gallery
//         $images = DB::table('product_images')
//             ->where('product_id', $product->id)
//             ->orderBy('position')
//             ->get();

//         // categories for this product
//         $categories = DB::table('categories as c')
//             ->join('category_product as cp', 'cp.category_id', '=', 'c.id')
//             ->where('cp.product_id', $product->id)
//             ->orderBy('c.position')
//             ->get(['c.id','c.name','c.slug']);

//         // related products (simple: latest others)
//         $related = DB::table('products as p')
//             ->leftJoin('product_images as pi', function ($j) {
//                 $j->on('pi.product_id', '=', 'p.id')->where('pi.is_primary', 1);
//             })
//             ->where('p.is_published', 1)
//             ->where('p.id', '!=', $product->id)
//             ->orderByDesc('p.created_at')
//             ->limit(4)
//             ->get(['p.id','p.name','p.slug','p.price','p.currency','pi.path as image_path','pi.alt as image_alt']);

//         return view('components.shop-detail', [
//             'module'     => 'shop-detail',
//             'product'    => $product,
//             'images'     => $images,
//             'categories' => $categories,
//             'related'    => $related,
//         ]);
//     }
// }


