<?php

declare(strict_types=1);

namespace Database\Repositories;

use App\Models\QueryTerm;
use DB;
use App\Models\Api;
use App\Models\QueryString;
use App\Models\QueryStringQueryTerm;

class QueryStringRepository
{
    public function addTerm(Api $api, int $termId): void
    {
        DB::transaction(function () use ($api, $termId) {
            $newQueryString = new QueryString();
            $api->queryStrings()->save($newQueryString);

            // $queryTerm = new QueryTerm();
            // $queryTerm->api_id = $api->id;
            // $queryTerm->term = $termString;
            // $queryTerm->save();

            $newQueryStringQueryTerm = new QueryStringQueryTerm();
            $newQueryStringQueryTerm->query_term_id = $termId;
            $newQueryStringQueryTerm->query_string_id = $newQueryString->id;
            $newQueryStringQueryTerm->save();
        });
    }
}
