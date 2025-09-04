<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    protected $table = "presentation";

    protected $fillable = [
        'description'
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
