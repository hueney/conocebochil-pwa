<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Location;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class UserComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $user_id, $name, $email, $password, $role_user;
    protected function rules()
    {
        return [
            'name'         => 'required|min:6',
            'email'         => ['required', 'email', 'not_in:' . auth()->user()->email],
            'password'  => 'required',
            'role_user'  => 'required',
        ];
    }
    protected $queryString=[
        'search' => ['except' => ''],
        'perPage'  => ['except' => '5']
    ];

    public $search = '';

    public $perPage= '5';

    public $view='vacio';
    public $modulo='';

    public function render()
    {

        return view('livewire.user-component',[
            'users' => User::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orderBy('id','desc')
            ->paginate($this->perPage),
            'roles' => Role::get()->all()
        ]);
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
            $this->modulo='users';
    }
    public function store()
    {
        $this->validate();
        $category = Category::get()->all();
        if($category){
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>Hash::make( $this->password)
        ]);

        $user->assignRole($this->role_user);

        //crea a un provedor
        $supplier = Supplier::create([
            'user_id' => $user->id,
            'category_id' => rand(1,2),
            'business_name' => $this->name,
            'manager_name' =>'nombre del encargado',
            'telefono' => '0123456789',
            'file_logo' => 'http://lorempixel.com/400/400',
            'status' => 'DRAFT',
            'productcant' => '10',
        ]);
        //crea su localización del proveedor
        $location = Location::create([
            'supplier_id' => $supplier->id,
            'address' => 'mi dirección',
            'city' =>'bochil',
            'estate' => 'chiapas',
            'cp' => '12345',

        ]);

        session()->flash('store', 'Se creo un usuario exitosamente');


        $this->edit($user->id);
        }else{

             session()->flash('destroy', 'No puedes crear un usuario, es necesario crear por lo menos una categoria');

        }

    }

    public function destroy($id)
    {
        //Elimina logo del proveedor y luego elimina al usuario junto con su perfil proveedor
        $user = User::find($id);
        $this->name = $user->name;
       $sup = $user->supplier;
       if($user->supplier){
       $url = str_replace('http://localhost:8000/', '', $sup->file_logo);
        Storage::disk('public')->delete($url );
        }

       User::destroy($id);
       session()->flash('destroy', 'Se elimino el usuario '. $this->name);
        $this->name ='';


    }

    public function edit($id)
    {

        $user = User::find($id);

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;

        $this->view ='edit';
        $this->modulo ='users';
    }

    public function update(){
        $this->validate(['name' => 'required', 'email' => 'required', 'password' => 'required' ]);
        $user = User::find($this->user_id);

        $user->update([
            'name'          => $this->name,
            'email'          => $this->email,
            'password'  =>Hash::make( $this->password)

        ]);
        session()->flash('edit', 'Se actualizo usuario exitosamente');
        $this->default();

    }


    public function default(){
            $this->name ='';
            $this->email ='';
            $this->password ='';
            $this->role_user = '';
            $this->view ='vacio';
    }
}
