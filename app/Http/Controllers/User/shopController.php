<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{
    public function index()
    {
        $module = 'shop';
        return view('components.shop', ['module' => $module]);
    }

}

// class shopController extends Controller
// {
//     public function index(Request $request)
//     {
//         $q       = trim((string) $request->query('q', ''));
//         $catSlug = trim((string) $request->query('category', ''));

//         $productsQuery = DB::table('products as p')
//             ->leftJoin('product_images as pi', function ($j) {
//                 $j->on('pi.product_id', '=', 'p.id')->where('pi.is_primary', 1);
//             })
//             ->when($q !== '', function ($qq) use ($q) {
//                 $qq->where(function ($w) use ($q) {
//                     $w->where('p.name', 'like', "%{$q}%")
//                       ->orWhere('p.sku', 'like', "%{$q}%");
//                 });
//             })
//             ->when($catSlug !== '', function ($qq) use ($catSlug) {
//                 $qq->join('category_product as cp', 'cp.product_id', '=', 'p.id')
//                    ->join('categories as c', 'c.id', '=', 'cp.category_id')
//                    ->where('c.slug', $catSlug);
//             })
//             ->where('p.is_published', 1)
//             ->orderByDesc('p.created_at')
//             ->select([
//                 'p.id','p.name','p.slug','p.price','p.currency',
//                 'pi.path as image_path','pi.alt as image_alt'
//             ]);

//         // simple pagination (works without count subquery)
//         $products = $productsQuery->simplePaginate(12)->appends($request->query());

//         // categories for sidebar/filter
//         $categories = DB::table('categories')->orderBy('position')->get(['id','name','slug']);

//         return view('components.shop', [
//             'module'     => 'shop',
//             'products'   => $products,
//             'categories' => $categories,
//             'q'          => $q,
//             'category'   => $catSlug,
//         ]);
//     }
// }



// class shopController extends Controller
// {
//     public function index()
//     {
//         $module = 'shop';
//         return view('components.shop', ['module' => $module]);
//     }
    
// }
