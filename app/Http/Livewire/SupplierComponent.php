<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class SupplierComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

   public $supplier_id, $user, $category, $nombre_negocio, $nombre_encargado, $direccion, $ciudad, $estado, $cp, $telefono, $file, $status, $productcant;

    protected $queryString=[
        'search' => ['except' => ''],
        'perPage'  => ['except' => '5']
    ];
     public function rules()
     {
         $rules = [
            'user'                              => 'required|integer',
            'nombre_negocio'        => 'required',
            'nombre_encargado'   => 'required',
            'direccion'                    => 'required',
            'ciudad'                        => 'required',
            'estado'                       => 'required',
            'cp'                              => 'required|max:6',
            'telefono'                    => 'required|max:10',
            'status'                       => 'required|in:DRAFT,PUBLISHED',

        ];
         if($this->file)
             $rules = array_merge($rules, ['file'         => 'mimes:jpg,jpeg,png']);
         return $rules;
    }

    public $search = '';

    public $perPage= '5';

    public $view='vacio';

    public $modulo='';



    public function render()
    {

        return view('livewire.supplier-component',[
            'suppliers' => Supplier::where('business_name', 'LIKE', "%{$this->search}%")->with('location')
            ->orderBy('id','desc')
            ->paginate($this->perPage),
            'categories' => Category::all()
        ]);
    }

    public function clear(){
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';
    }
    /*
    public function create(){

            $this->view ='create';
            $this->modulo='suppliers';

    }
    public function store(){

        $this->validate();

        $supplier = Supplier::create([
            'user_id' => $this->user,
            'business_name' => $this->nombre_negocio,
            'manager_name' => $this->nombre_encargado,
            'address' => $this->direccion,
            'city' => $this->ciudad,
            'estate' => $this->estado,
            'cp' => $this->cp,
            'telefono' => $this->telefono,
            'file_logo' => $this->file,
            'status' => $this->status
        ]);

        if($this->file){

            $path = Storage::disk('public')->put('image/suppliers', $this->file);
            $supplier->fill(['file_logo' => asset($path)])->save();
        }

        $this->default();
    }
    */

    public function edit($id)
    {
        $supplier = Supplier::find($id);
            $this->supplier_id = $supplier->id;
            $this->user = $supplier->user_id;
            $this->category = $supplier->category->id;
            $this->nombre_negocio = $supplier->business_name;
            $this->nombre_encargado = $supplier->manager_name;
            $this->direccion = $supplier->location->address;
            $this->ciudad = $supplier->location->city;
            $this->estado = $supplier->location->estate;
            $this->cp = $supplier->location->cp;
            $this->telefono = $supplier->telefono;
            $this->status = $supplier->status;
           $this->productcant= $supplier->productcant;
            $this->view ='edit';
            $this->modulo ='suppliers';
    }

    public function update()
    {
        $this->validate();

        $supplier = Supplier::find($this->supplier_id);

        $supplier->update([
            'category_id' => $this->category,
            'business_name' => $this->nombre_negocio,
            'manager_name' => $this->nombre_encargado,
            'telefono' => $this->telefono,
            'status' => $this->status,
            'productcant'=>$this->productcant
        ]);

        if($this->file){
            $url = str_replace('http://localhost:8000/', '', $supplier->file_logo);
             Storage::disk('public')->delete($url );

            $path = Storage::disk('public')->put('image/suppliers', $this->file);
            $supplier->fill(['file_logo' => asset($path)])->save();
        }

        //Actualiza su localización del proveedor
        $location = $supplier->location;

        $loc = Location::find($location->id);

        $loc->update([
            'address' => $this->direccion,
            'city' => $this->ciudad,
            'estate' => $this->estado,
            'cp' => $this->cp
        ]);

        session()->flash('edit', 'Se actualizo Proveedor exitosamente');

        $this->default();

    }

    public function destroy(Supplier $id){

        $url = str_replace('http://localhost:8000/', '', $id->file_logo);

        Storage::disk('public')->delete($url );

        $id->delete();

    }

    public function default(){

            $this->user = '';
            $this->category = '';
            $this->nombre_negocio = '';
            $this->nombre_encargado = '';
            $this->direccion = '';
            $this->ciudad = '';
            $this->estado = '';
            $this->cp = '';
            $this->telefono = '';
            $this->status = '';
            $this->file = '';
            $this->view ='vacio';

    }

}
