<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QueryString extends Model
{
    protected $fillable = ["term"];

    public function api(): BelongsTo
    {
        return $this->belongsTo(Api::class, "api_id", "id");
    }
}
