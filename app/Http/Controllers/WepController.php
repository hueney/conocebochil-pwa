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
        if($supplier->category_id == '1'){

            $saludo= 'Hola'.' '.$supplier->business_name.' '.'Restaurante';

        }
        if($supplier->category_id == '2'){

            $saludo= 'Hola'.' '.$supplier->business_name.' '.'mi tienda de conveniencia';

        }
        if($supplier->category_id == '3'){

            $saludo= 'Hola'.' '.$supplier->business_name.' '.'Floreria';

          }



       $msg=$saludo.','.' ' ;

       $num=$supplier->telefono;
       return redirect('https://wa.me/52'.$num.'?text='.$msg.'me+comunico+desde+la+App+ConoceBochil%2C+me+gustaria+ordenar&rlz=1C5CHFA_enMX915MX915&oq=me+comunico+desde+la+App+ConoceBochil%2C+me+gustaria+ordenar&aqs=chrome..69i57j69i60.44415j0j4&sourceid=chrome&ie=UTF-8');
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
