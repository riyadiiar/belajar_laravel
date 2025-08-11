<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai konvensi
    protected $table = 'transactions';

    // Kolom yang tidak boleh diisi secara massal
    protected $guarded = [];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
