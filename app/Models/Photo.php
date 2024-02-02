<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'url', 'adventure_id'
    ];

    // Define the inverse relationship if needed
    public function adventure()
    {
        return $this->belongsTo(Adventure::class);
    }


}
