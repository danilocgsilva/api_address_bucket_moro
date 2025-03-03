<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QueryTerm extends Model
{
    protected $table = "query_term";

    protected $fillable = ["term", "api_id"];

    public function api(): BelongsTo
    {
        return $this->belongsTo(Api::class, "api_id", "id");
    }
}
