<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanTni extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function noteTni()
    {
        return $this->belongsTo(NoteTni::class);
    }
}
