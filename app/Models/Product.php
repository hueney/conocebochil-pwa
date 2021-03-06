<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 'name', 'description',  'precio',  'file', 'status',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

}
