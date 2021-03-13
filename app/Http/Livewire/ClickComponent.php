<?php

namespace App\Http\Livewire;


use App\Models\Click;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
Use Carbon\Carbon;


use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ClickComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $supplier, $name;

    protected $queryString=[
        'search' => ['except' => ''],
        'perPage'  => ['except' => '5']
    ];
     public $search = '';
     public $fechaActual =  '';

    public $perPage= '5';

    public $view='vacio';

    public $modulo='';

    public function render()
    {
        $fecha = new \DateTime();
        $this->fechaActual = $fecha;
        $user = User::find( auth()->user()->id);

        if($user->supplier){
            $this->supplier = $user->supplier->id;
            $clicks = $user->clicks()
                ->where([
                    ['supplier_id', $user->supplier->id],
                ])->count();

             $clicksdia = Click::whereDate('created_at', '=' , Carbon::now()->format('Y-m-d'))
                ->where('supplier_id', $this->supplier)
                ->count();

            return view('livewire.click-component',[
                 'clicks' =>$clicks,
                 'clicksdia' => $clicksdia
            ]);

        }else{
           return view('livewire.products.regresar');
        }

     }

     public function store()
    {
        Click::create([
            'supplier_id' => $this->supplier,
            'name' => 'click'

        ]);
    }

}
