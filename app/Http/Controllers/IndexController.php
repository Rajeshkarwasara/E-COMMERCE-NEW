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

      return view("user_index",compact('product'));
   }

   public function product_view(Request $request,  $product){
    
      $startdate = Carbon::now()->firstOfMonth();
      $lasttdate = Carbon::now()->lastOfMonth();
      $singleproduct=product::find($product);
      $product = Product::whereBetween("created_at", [$startdate, $lasttdate,])
         ->inRandomOrder()
         ->limit(4)
         ->get();
      
      return view('product_view',compact('product','singleproduct'));
   }


   public function product_list(){
      $data= Brands::select('id','name')->get();
      return view('product_list',compact('data'));
   }
}
