<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $table = 'entry';

    protected $fillable = [
        'sena_code',
        'date_entry',
        'expiration_date',
        'quantity',
        'observations',
        'article_id'
    ];

    public function article() {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
