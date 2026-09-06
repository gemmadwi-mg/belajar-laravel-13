<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Kolom yang boleh diisi secara massal
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Konversi tipe data otomatis
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}