<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, Sluggable;
    protected $table = 'categories'; // Nama tabel, jika tidak mengikuti konvensi Laravel
    protected $guarded = ['id'];


    public function books()
    {
        return $this->hasMany(DataBuku::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
