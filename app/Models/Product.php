<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['category_id', 'name', 'price', 'quantity','created_by'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function user_details()
    {
        return $this->belongsTo(User::class, 'created_by')->select('id', 'name','email');
    }

}
