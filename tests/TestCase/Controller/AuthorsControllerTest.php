<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AuthorsController Test Case
 */
class AuthorsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.authors',
    ];

    /**
     * Tests index method
     *
     * @dataProvider searchProvider
     */
    public function testIndex($name, $expectedBody)
    {
        $this->get("/authors.json?name=$name");

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertEquals($expectedBody, $body);
    }

    public function searchProvider()
    {
        return [
            // No matching, returns empty result
            [
                'name' => 'Unknown',
                'expectedBody' => null,
            ],
            // Matching one case
            [
                'name' => 'tao',
                'expectedBody' => [
                    [
                        'id' => 22,
                        'first_name' => "Terence",
                        'second_name' => "Tao",
                    ],
                ],
            ],
            // Matching many cases
            [
                'name' => 'Stephen',
                'expectedBody' => [
                    [
                        "id" => 3,
                        "first_name" => "Stephen",
                        "second_name" => "Hawking",
                    ],
                    [
                        "id" => 4,
                        "first_name" => "Stephen",
                        "second_name" => "Dubner",
                    ],
                ],
            ],
            // No search term, returns all authors
            [
                'name' => null,
                'expectedBody' => [
                    [
                        "id" => 3,
                        "first_name" => "Stephen",
                        "second_name" => "Hawking",
                    ],
                    [
                        'id' => 4,
                        'first_name' => "Stephen",
                        'second_name' => "Dubner",
                    ],
                    [
                        "id" => 10,
                        "first_name" => "Maria",
                        "second_name" => "Konnikova",
                    ],
                    [
                        "id" => 22,
                        "first_name" => "Terence",
                        "second_name" => "Tao",
                    ],
                    [
                        "id" => 39,
                        "first_name" => "Ayn",
                        "second_name" => "Rand",
                    ],
                    [
                        "id" => 61,
                        "first_name" => "Amartya",
                        "second_name" => "Sen",
                    ],
                    [
                        "id" => 114,
                        "first_name" => "E T",
                        "second_name" => "Bell",
                    ],
                ],
            ],
        ];
    }
}
