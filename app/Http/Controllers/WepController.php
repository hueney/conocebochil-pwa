<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Click;

class WepController extends Controller
{
    public function index()
    {
         return view('livewire.app.category',[
            'categorias' => Category::get()->where('status_cat', 'PUBLISHED')
        ]);
    }

    public function suppliers($id)
    {
          return view('livewire.app.suppliers',[
              'supplier' => $id
          ]);
    }

    public function products($id)
    {
        $supplierpro = Supplier::find($id);

        $products = Product::where([
                    ['status', 'PUBLISHED'],
                    ['supplier_id', $id]

        ])->orderBy('id','desc')->paginate($supplierpro->productcant);

        return view('livewire.app.products',[
              'products' => $products,
              'supplierpro'  => $supplierpro,
          ]);
    }

    public function whatsapp($id)
    {
       $supplier = Supplier::find($id);
       Click::create([
            'supplier_id' => $id,
            'name' => 'click'

        ]);
       $msg="quiero hacer un pedido" ;
       $num=$supplier->telefono;
       return redirect('https://wa.me/+52'.$num.'?text='.$msg);
    }

    public function llamar($id)
    {
       $supplier = Supplier::find($id);
       Click::create([
            'supplier_id' => $id,
            'name' => 'click'

        ]);
       $num=$supplier->telefono;
       return redirect('tel:'.$num);
    }

}
