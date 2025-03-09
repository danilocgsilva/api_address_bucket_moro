<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Api;
use App\Models\{QueryTerm, QueryStringQueryTerm};
use DB;
use Mockery;

class ApplicationPathsTest extends TestCase
{
    public function testHomeWelcome(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testOkCreateApi(): void
    {
        $response = $this->get('api/create');

        $response->assertStatus(200);
    }

    public function testOkListApi(): void
    {
        $response = $this->get('api');

        $response->assertStatus(200);
    }

    public function testAddNewQuery()
    {
        $this->prepareAddNewQuery();

        $response = $this->get('api/1/terms/create');

        $response->assertStatus(200);
    }

    public function testAddNewQueryNotExistingApi()
    {
        $this->prepareAddNewQuery();

        $response = $this->get('api/2/terms/create');

        $response->assertStatus(404);
    }

    private function prepareAddNewQuery()
    {
        $this->truncateData();
        $this->writeApi();
    }

    private function truncateData()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        QueryTerm::truncate();
        QueryStringQueryTerm::truncate();
        Api::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function writeApi()
    {
        $api = new Api();
        $api->name = 'Test API';        
        $api->address = 'http://localhost:8000';
        $api->description = 'Test API Description';
        $api->documentation = 'http://localhost:8000/docs';
        $api->save();

        return $api;
    }
}
