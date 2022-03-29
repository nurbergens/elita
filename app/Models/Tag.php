<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Tag extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'title'
    ];

    protected function news() {
        return $this->hasMany(News::class,'tag_id','id');
    }
}
