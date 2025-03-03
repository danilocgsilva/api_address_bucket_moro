<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Api extends Model
{
    protected $fillable = ["address", "description", "name", "documentation"];

    public function queryTerms(): HasMany
    {
        return $this->hasMany(QueryTerm::class, "api_id", "id");
    }
}
