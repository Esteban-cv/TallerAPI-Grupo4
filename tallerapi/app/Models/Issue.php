<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issue';

    protected $fillable = [
        'sena_code',
        'date_issue',
        'quantity',
        'observations',
        'article_id',
        'person_id',
    ];

    public function article() {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function person() {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
