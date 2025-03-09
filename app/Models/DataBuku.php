<?php

namespace App\Models;

use App\Models\Category;
use App\Models\DataPeminjam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class DataBuku extends Model
{
    /** @use HasFactory<\Database\Factories\DataBukuFactory> */
    use HasFactory, Sluggable;
    protected $table = 'data_buku'; // Nama tabel, jika tidak mengikuti konvensi Laravel
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(DataPeminjam::class, 'buku_id');
    }

    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function wishlistedByUsers()
    {
        return $this->belongsToMany(User::class, 'wishlist');
    }
}
