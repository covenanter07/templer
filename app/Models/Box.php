<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    public function boxinside()
    {
        return $this->hasMany(BoxInside::class);
    }

}
