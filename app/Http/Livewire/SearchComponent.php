<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


use Livewire\WithPagination;

class SearchComponent extends Component
{
    public $supplier;
    protected $queryString=[
        'search' => ['except' => '']

    ];
     public $search = '';


    public function render()
    {
        $suppliers = Supplier::where([
                    ['status', 'PUBLISHED'],
                    ['category_id', $this->supplier],
                    ['business_name', 'LIKE', "%{$this->search}%"]
                 ])->orderBy('id','desc')->get();

        return view('livewire.search-component',[
            'suppliers' => $suppliers
        ]);
    }
}
