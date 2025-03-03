<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryString extends Model
{
    protected $table = "query_string";
    
    protected $fillable = ["api_id"];
}
