<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\GenresController Test Case
 */
class GenresControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.genres',
    ];

    public function testIndex()
    {
        $this->get("/genres.json");

        $expectedBody = [
            [
                "id" => 3,
                "name" => "Mathematics",
            ],
            [
                "id" => 7,
                "name" => "Psychology",
            ],
            [
                "id" => 11,
                "name" => "Philosophy",
            ],
        ];

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertEquals($expectedBody, $body);
    }
}
