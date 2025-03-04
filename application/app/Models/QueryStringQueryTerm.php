<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QueryString;

class QueryStringQueryTerm extends Model
{
    protected $table = "query_string_query_term";

    protected $fillable = ["query_term_id", "query_string_id"];

    public function queryTerms()
    {
        return $this->hasOne(QueryTerm::class, "query_term_id", "id");
    }

    public function queryString()
    {
        return $this->belongsTo(QueryString::class, "id", "query_string_id");
    }
}
