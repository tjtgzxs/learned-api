<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'fact',
        'source',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
