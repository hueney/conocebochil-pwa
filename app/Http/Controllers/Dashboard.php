<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Click;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public $clicks_dash, $producs_dash;
    public function index(){

        //Productos y Clics
        $user = User::find( auth()->user()->id);
        if($user->supplier){
            $this->supplier = $user->supplier->id;
            $clicks = $user->clicks()
                ->where([
                    ['supplier_id', $user->supplier->id],
                ])->count();
             $products = $user->products()
              ->where([
                    ['supplier_id', $user->supplier->id],
                ])->count();

        }
         if($user->supplier){
            $this->clicks_dash = $clicks;
            $this->producs_dash = $products;
         }else{
            $this->clicks_dash = 0;
            $this->producs_dash = 0;
         }
         $users = User::get()->count();
         $suppliers = Supplier::get()->count();
         $categories = Category::get()->count();






            return view('dashboard',[
                'clicks'                => $this->clicks_dash,
                'products'          => $this->producs_dash,
                'users'                => $users,
                'suppliers'          => $suppliers,
                'categories'       => $categories

            ]);

    }
}
