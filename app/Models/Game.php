<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'rating',
        'class',
        'developer_id',
        'publisher_id',
    ];

    public function developer() {
        return $this->belongsTo(Developer::class);
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }

    public function platforms() {
        return $this->belongsToMany(Platform::class);
    }

}
