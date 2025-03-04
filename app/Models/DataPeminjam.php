<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeminjam extends Model
{
    /** @use HasFactory<\Database\Factories\DataPeminjamFactory> */
    use HasFactory;
    protected $table = 'data_peminjam'; // Nama tabel, jika tidak mengikuti konvensi Laravel
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(DataBuku::class, 'buku_id');
    }

}
