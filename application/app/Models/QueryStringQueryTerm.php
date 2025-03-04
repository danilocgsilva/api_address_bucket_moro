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
        return $this->hasMany(QueryTerm::class, "id", "query_term_id");
    }

    public function queryString()
    {
        return $this->hasOne(QueryString::class, "id", "query_string_id");
    }
}
