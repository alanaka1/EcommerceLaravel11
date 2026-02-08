<?php

namespace App\Models;

use App\Models\Prodect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];

    public function products(): HasMany
    {
        return $this->hasMany(Prodect::class);
    }
}
