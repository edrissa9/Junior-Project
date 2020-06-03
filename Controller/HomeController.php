<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Cart;
use App\Models\LineItem;
use App\Models\Category;
use App\Models\CategoryDepartment;
use App\Models\Product;
use App\Models\ProductAvatar;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $roleCount = \App\Role::count();
        if($roleCount != 0) {
            if($roleCount != 0) {
                if (Cart::where(['user_id' => 0, 'status' => 'not-checked-out'])->exists() && !Auth::guest()) {
                    $cart = Cart::where(['user_id' => 0, 'status' => 'not-checked-out'])->orderBy('id','desc')->first();
                    $cart->user_id = Auth::user()->id;
                    $cart->save();
                    $departments = \App\Models\CategoryDepartment::all();
                    if ($cart) {
                        $line_items = \App\Models\LineItem::where('cart_id',$cart->id)->get();
                        $grand_total = \App\Models\LineItem::where('cart_id',$cart->id)->sum('total_price');
                        $total_discount = \App\Models\LineItem::where('cart_id',$cart->id)->sum('discount');
                        $cart->total_price = $grand_total;
                        $cart->total_discount = $total_discount;
                        $cart->save();


                        return view('pages.cart', compact('departments', 'cart','line_items'));
                    }
                }
                $departments = CategoryDepartment::all();
                $categories = Category::all();
                $products = Product::inRandomOrder()->take(20)->get();
                $tab_cat1 = Category::all()->first();
                $tab_cats = Category::skip(1)->take(3)->get();
                $tab1_cat_products = Product::where('category','like',"%\"{$tab_cat1->id}\"%")->get();
                $recommended_first_slide = Product::orderBy('id', 'desc')->take(3)->get();
                $recommended_second_slide = Product::orderBy('id', 'desc')->skip(3)->take(3)->get();
                $recommended_third_slide = Product::orderBy('id', 'desc')->skip(6)->take(3)->get();
                $brands = Product::groupby('brand')->distinct()->get();
                return view('home',compact('departments', 'categories','products','brands',
                    'tab_cats','tab_cat1','tab1_cat_products','recommended_first_slide',
                    'recommended_second_slide','recommended_third_slide'));
            }
        } else {
            return view('errors.error', [
                'title' => 'Migration not completed',
                'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
            ]);
        }
    }

    public function get_tab_products(Request $request) {
        $id = $request->input('id');
        $tab_products = Product::where('category','like',"%\"{$id}\"%")->take(4)->get();
        $products = array();
        foreach($tab_products as $p) {
            $avatar = Upload::find(ProductAvatar::where('product_id',$p->id)->first()->image)->path();
            array_push($products, ['id'=>$p->id, 'name'=>$p->name, 'price'=>$p->price, 'avatar'=>$avatar]);
        }
        return response()->json([
            'res' => $products
        ]);
    }
}
