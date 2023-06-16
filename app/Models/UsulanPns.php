<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanPns extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function notePns()
    {
        return $this->belongsTo(NotePns::class);
    }
}
