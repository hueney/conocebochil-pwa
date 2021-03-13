<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
{


    use WithPagination;
    use WithFileUploads;

    public $category_id, $name, $descrip, $picture, $file_icon , $status;

    protected $queryString=[
        'search' => ['except' => ''],
        'perPage'  => ['except' => '5']
    ];

    public function rules(){
         $rules = [
            'name'                              => 'required|max:20',
            'descrip'        => 'required',
            'status'                       => 'required|in:DRAFT,PUBLISHED',

        ];
         if($this->picture or $this->file_icon)
             $rules = array_merge($rules, [
                'picture'         => 'mimes:jpg,jpeg,png',
                'file_icon'         => 'mimes:jpg,jpeg,png,svg'
             ]);

         return $rules;
    }

    public $search = '';

    public $perPage= '5';

    public $view='vacio';

    public $modulo='';


    //Listado categorias
    /*
    */
    public function render()
    {
        return view('livewire.category-component',[
            'categories' => Category::where('name_cat', 'LIKE', "%{$this->search}%")
            ->orWhere('status_cat', 'LIKE', "%{$this->search}%")
            ->orderBy('id','desc')
            ->paginate($this->perPage)
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
            $this->modulo='categories';
    }

    public function store()
    {

       $this->validate();

        $category = Category::create([
            'name_cat' => $this->name,
            'description_cat' => $this->descrip,
            'picture' => $this->picture,
            'file_icon' => $this->file_icon,
            'status_cat' => $this->status
        ]);
        //Guarda fondo al disco y bd
        if($this->picture){
                $path = Storage::disk('public')->put('image/categories/picture', $this->picture);
                $category->fill(['picture' => asset($path)])->save();
        }
         //Guarda icon al disco y bd
        if($this->file_icon){
            $path = Storage::disk('public')->put('image/categories/file_icon', $this->file_icon);
            $category->fill(['file_icon' => asset($path)])->save();
        }
         session()->flash('store', 'Se creo una categoria exitosamente');
        $this->default();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $this->category_id = $category->id;
        $this->name = $category->name_cat;
        $this->descrip= $category->description_cat;
        $this->status = $category->status_cat;
        $this->view ='edit';
        $this->modulo='categories';
    }

    public function update()
    {
        $this->validate();


        $category = Category::find($this->category_id);

        $category->update([
            'name_cat' => $this->name,
            'description_cat' => $this->descrip,
            'status_cat' => $this->status
        ]);

         if($this->picture){
            $url = str_replace('http://localhost:8000/', '', $category->picture);
             Storage::disk('public')->delete($url );

            $path = Storage::disk('public')->put('image/categories/picture', $this->picture);
            $category->fill(['picture' => asset($path)])->save();
        }
         if($this->file_icon){
            $url = str_replace('http://localhost:8000/', '', $category->file_icon);
             Storage::disk('public')->delete($url );

            $path = Storage::disk('public')->put('image/categories/file_icon', $this->file_icon);
            $category->fill(['file_icon' => asset($path)])->save();
        }
        session()->flash('edit', 'Se actualizo Categoria exitosamente');
        $this->default();

    }




    public function destroy(Category $id)
    {
         $this->name = $id->name_cat;
         $url = str_replace('http://localhost:8000/', '', $id->picture);
        Storage::disk('public')->delete($url );

        $url = str_replace('http://localhost:8000/', '', $id->file_icon);
        Storage::disk('public')->delete($url );

         $id->delete();
         session()->flash('destroy', 'Se elimino la categoria: '. $this->name);
         $this->default();

    }
    public function default()
    {
        $this->name = '';
        $this->descrip = '';
        $this->picture = '';
        $this->file_icon = '';
        $this->status = '';
        $this->view ='vacio';
    }



}
