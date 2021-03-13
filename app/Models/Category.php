<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_cat', 'description_cat', 'picture',  'file_icon',  'status_cat',
    ];
    public function suppliers(){
        return $this->hasMany(Supplier::class);
    }

}
