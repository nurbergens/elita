<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'id',
        'title',
        'visibility',
        'order'
    ];

    public function news() {
        return $this->hasMany(News::class,'category_id','id')->current();
    }
}
