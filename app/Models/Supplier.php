<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'category_id', 'business_name',  'manager_name',  'telefono', 'file_logo',  'status', 'productcant',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function location(){
        return $this->hasOne(Location::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function clicks(){
        return $this->hasMany(Click::class);
    }
}
