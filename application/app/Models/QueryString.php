<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryString extends Model
{
    protected $table = "query_string";
    
    protected $fillable = ["api_id"];

    public function queryStringQueryTerm()
    {
        return $this->hasMany(QueryStringQueryTerm::class, "id", "query_string_id");
    }

    public function api()
    {
        return $this->hasOne(Api::class, "id", "api_id");
    }

    public function getString(): string
    {
        $queryTermsArray = [];
        foreach ($this->queryStringQueryTerm as $queryStringQueryTerm) {
            $queryTermsArray[] = $queryStringQueryTerm->queryTerm->term;
        }

        $queryTermsJoin = implode("&", $queryTermsArray);
        
        return $this->api->address . "/1234abcd";
    }
}
