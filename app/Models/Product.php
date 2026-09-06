<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Kolom yang boleh diisi secara massal
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'price',
        'stock',
        'is_active',
    ];

    /**
     * Konversi tipe data otomatis
     */
    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'price' => 'integer',
        'stock' => 'integer',
        'is_active' => 'boolean', // Mengubah nilai 1/0 dari database menjadi true/false di PHP
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}