<?php

namespace App\Models;

use App\Models\User;
use App\Models\DataBuku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist'; 
    protected $fillable = ['user_id', 'book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(DataBuku::class);
    }
}
