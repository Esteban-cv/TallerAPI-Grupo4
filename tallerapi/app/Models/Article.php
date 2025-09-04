<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'article';

    protected $fillable = [
        'name',
        'quantity',
        'min_quantity',
        'photo',
        'technical_sheet',
        'presentation_id',
        'category_id',
        'supplier_id',
        'unit_id'
    ];

    public function isBelowMinimum()
    {
        return $this->quantity <= $this->min_quantity;
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
