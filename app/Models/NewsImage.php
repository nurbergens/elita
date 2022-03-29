<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class NewsImage extends Model
{
    use HasFactory, asSource;

    protected $fillable = [
        'url',
        'news_id'
    ];

    public function news() {
        return $this->belongsTo(News::class,'news_id','id');
    }
}
