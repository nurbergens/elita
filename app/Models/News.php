<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class News extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'title', 'description', 'content', 'is_main',
        'category_id',
        'tag_id',
        'preview_image',
        'publication_date'
    ];

    protected $allowedSorts = [
        'title',
        'reads',
        'created_at',
        'updated_at'
    ];
    protected $allowedFilters = [
        'title',
        'reads',
    ];

    protected $dates = [
        'publication_date'
    ];

//    protected static function booted()
//    {
//        static::addGlobalScope('current', function(Builder $builder) {
//            $builder->where('publication_date', '<',now());
//        });
//    }

    public function scopeCurrent($query) {
        $query->where('publication_date', '<',now());
    }

    public function category() {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class,'news_tags','news_id','tag_id');
    }

    public function images() {
        return $this->hasMany(NewsImage::class,'news_id','id');
    }

    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }
}
