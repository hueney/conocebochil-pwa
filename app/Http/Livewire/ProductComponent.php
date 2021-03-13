<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Supplier;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class ProductComponent extends Component
{
    use WithPagination;
     use WithFileUploads;

    public $product_id, $supplier, $name, $descrip , $precio , $file, $status;


    protected $queryString=[
        'search' => ['except' => ''],
        'perPage'  => ['except' => '5']
    ];

    public function rules(){
         $rules = [
            'name'           => 'required|max:20',
            'supplier'        => 'required',
            'descrip'        => 'required',
            'precio'        => 'numeric|required',
            'status'           => 'required|in:DRAFT,PUBLISHED',

        ];
         if($this->file)
             $rules = array_merge($rules, [
                'file'         => 'mimes:jpg,jpeg,png,svg'
             ]);

         return $rules;
    }

    public $search = '';

    public $perPage= '5';

    public $view='vacio';

    public $modulo='';


    public function render()
    {
        //devuelve el id del proveedor atraves de su usuario que esta logueado
        //Luego guarda el valor en la variable publica supplier.
        $user = User::find( auth()->user()->id);

        if($user->supplier){
            $this->supplier = $user->supplier->id;

            $products = $user->products()
                 ->orderBy('id','desc')
                ->where([
                    ['supplier_id', $user->supplier->id],
                    ['precio', 'LIKE', "%{$this->search}%"],])
                ->orWhere([
                    ['supplier_id', $user->supplier->id],
                    ['name', 'LIKE', "%{$this->search}%"], ])
                ->paginate($this->perPage);

            $cant = $user->products()
                ->where([
                    ['supplier_id', $user->supplier->id]
                    ])
                ->get();

            return view('livewire.product-component',[
                 'products' =>$products,
                 'cant'         =>$cant,
                 'user'         =>$user
            ]);
        }else{
           return view('livewire.products.regresar');
        }
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }

    public function create()
    {
            $this->view ='create';
            $this->modulo='products';
    }

    public function store()
    {
       $this->validate();

        $product = Product::create([
            'supplier_id' => $this->supplier,
            'name' => $this->name,
            'description' => $this->descrip,
            'precio' => $this->precio,
            'file' => $this->file,
            'status' => $this->status
        ]);

         //Guarda icon al disco y bd
        if($this->file){
            $path = Storage::disk('public')->put('image/products', $this->file);
            $product->fill(['file' => asset($path)])->save();
        }
        session()->flash('store', 'Se creo un producto exitosamente');
        $this->default();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->product_id = $product->id;
        $this->supplier = $product->supplier_id;
        $this->name= $product->name;
        $this->descrip = $product->description;
        $this->precio= $product->precio;
        $this->file = $product->fille;
        $this->status = $product->status;
        $this->view ='edit';
        $this->modulo='products';
    }

    public function update()
    {
        $this->validate();


        $product = Product::find($this->product_id);

        $product->update([
            'supplier_id' => $this->supplier,
            'name' => $this->name,
            'description' => $this->descrip,
            'precio' => $this->precio,
            'status' => $this->status
        ]);

         if($this->file){
            $url = str_replace('http://localhost:8000/', '', $product->file);
             Storage::disk('public')->delete($url );

            $path = Storage::disk('public')->put('image/products', $this->file);
            $product->fill(['file' => asset($path)])->save();
        }
        session()->flash('edit', 'Se actualizo el Producto exitosamente');
        $this->default();

    }

    public function destroy(Product $id)
    {
        $this->name = $id->name;
        $url = str_replace('http://localhost:8000/', '', $id->file);
        Storage::disk('public')->delete($url );
         $id->delete();
          session()->flash('destroy', 'Se elimino el producto: '. $this->name .', '. 'exitosamente!!');
    }

    public function default()
    {
       $this->name = '';
        $this->descrip= '';
       $this->precio = '';
       $this->file ='';
       $this->status = '';
       $this->view ='vacio';
    }


}
