<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentCategory extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
