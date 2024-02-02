<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'images' => 'array',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class,"adventure_id");
    }

    protected $fillable = [
        'title', 'description','placeName', 'tips', 'destination_id', 'images',
    ];
}


