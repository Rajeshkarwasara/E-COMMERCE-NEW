<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{


   public function index()
   {


      $startdate = Carbon::now()->firstOfMonth();
      $lasttdate = Carbon::now()->lastOfMonth();
      $product = Product::whereBetween("created_at", [$startdate, $lasttdate])
         ->inRandomOrder()
         ->limit(8)
         ->get();

      // echo "<pre>";
      // print_r($product);
      // echo "</pre>";

      return view("user_index", compact('product'));
   }

   public function product_view(Request $request, $product)
   {

      $startdate = Carbon::now()->firstOfMonth();
      $lasttdate = Carbon::now()->lastOfMonth();
      $singleproduct = product::find($product);
      $product = Product::whereBetween("created_at", [$startdate, $lasttdate,])
         ->inRandomOrder()
         ->limit(4)
         ->get();

      return view('product_view', compact('product', 'singleproduct'));
   }


   public function product_list(Request $request)
   {
      $requestdata = $request->all();
     

      $products = product::query();
      if (isset($requestdata['gender']) && !empty($requestdata['gender'])) {
         $products = $products->where('gender', $requestdata['gender']);
      }
      if (isset($requestdata['price']) && !empty($requestdata['price'])) {
         if ($requestdata['price'] == "less than 1500") {
            $products = $products->where('price', '<', 1500);
         } elseif ($requestdata['price'] == "between 1500 5k") {
            $products = $products->whereBetween('price', [1500, 5000]);
         } elseif ($requestdata['price'] == "between 5k 10k") {
            $products = $products->whereBetween('price', [5000, 10000]);
         } elseif ($requestdata['price'] == "between 10k 30k") {
            $products = $products->whereBetween('price', [10000, 30000]);
         }elseif ($requestdata['price'] == "More than 30k") {
            $products = $products->where('price', '<', 30000);
         }
      }
      if (isset($requestdata['color']) && !empty($requestdata['color'])) {
         $products = $products->where('color', $requestdata['color']);
      }
      if (isset($requestdata['function']) && !empty($requestdata['function'])) {
         $products = $products->where('function', $requestdata['function']);
      }
      if (isset($requestdata['brand']) && !empty($requestdata['brand'])) {
         $products = $products->where('brand_id', $requestdata['brand']);
      }
      if (isset($requestdata['sort_by']) && !empty($requestdata['sort_by'])) {

         if($requestdata['sort_by']=='lower to higher'){
            $products = $products->orderBy('price','ASC');
         }
         if($requestdata['sort_by']=='highe rto lower'){
            $products = $products->orderBy('price','DESC');
         }
         if($requestdata['sort_by']=='model_a_z'){
            $products = $products->orderBy('price','ASC');
         }
         if($requestdata['sort_by']=='model_z_a'){
            $products = $products->orderBy('price','DESC');
         }
      }

      $products= $products->paginate(12);
      $data = Brands::select('id', 'name')->get();
      return view('product_list', compact('data','products'));
   }
}
