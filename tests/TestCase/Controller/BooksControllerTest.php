<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BooksController Test Case
 */
class BooksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.genres',
        'app.authors',
        'app.books',
    ];

    public function testIndexPerGenre()
    {
        $this->get("/genres/3/books.json");

        $expectedBody = [
            [
                "id" => 3,
                "title" => "God Created the Integers",
                "pages" => 223,
                "genre" => [
                    "id" => 3,
                    "name" => "Mathematics",
                ],
                "author" => [
                    "id" => 3,
                    "first_name" => "Stephen",
                    "second_name" => "Hawking",
                ],
            ],
            [
                "id" => 178,
                "title" => "Men of Mathematics",
                "pages" => 295,
                "genre" => [
                    "id" => 3,
                    "name" => "Mathematics",
                ],
                "author" => [
                    "id" => 114,
                    "first_name" => "E T",
                    "second_name" => "Bell",
                ],
            ],
            [
                "id" => 202,
                "title" => "Structure and Randomness",
                "pages" => 197,
                "genre" => [
                    "id" => 3,
                    "name" => "Mathematics",
                ],
                "author" => [
                    "id" => 22,
                    "first_name" => "Terence",
                    "second_name" => "Tao",
                ],
            ],
        ];

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertEquals($expectedBody, $body);
    }

    public function testIndexPerAuthor()
    {
        $this->get("/authors/39/books.json");

        $expectedBody = [
            [
                "id" => 40,
                "title" => "Return of the Primitive",
                "pages" => 168,
                "genre" => [
                    "id" => 11,
                    "name" => "Philosophy",
                ],
                "author" => [
                    "id" => 39,
                    "first_name" => "Ayn",
                    "second_name" => "Rand",
                ],
            ],
            [
                "id" => 174,
                "title" => "Philosophy: Who Needs It",
                "pages" => 466,
                "genre" => [
                    "id" => 11,
                    "name" => "Philosophy",
                ],
                "author" => [
                    "id" => 39,
                    "first_name" => "Ayn",
                    "second_name" => "Rand",
                ],
            ],
        ];

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertEquals($expectedBody, $body);
    }

    public function testAddSuccessful()
    {
        $this->post("/books.json", [
            'author_id' => 3,
            'genre_id' => 11,
            'title' => 'The Universe in a Nutshell',
            'pages' => 224,
        ]);

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertArrayHasKey('id', $body);
        $bookId = $body['id'];

        $this->get("authors/3/books.json");

        $expectedBody = [
            [
                "id" => 3,
                "title" => "God Created the Integers",
                "pages" => 223,
                "genre" => [
                    "id" => 3,
                    "name" => "Mathematics",
                ],
                "author" => [
                    "id" => 3,
                    "first_name" => "Stephen",
                    "second_name" => "Hawking",
                ],
            ],
            [
                "id" => $bookId,
                "title" => "The Universe in a Nutshell",
                "pages" => 224,
                "genre" => [
                    "id" => 11,
                    "name" => "Philosophy",
                ],
                "author" => [
                    "id" => 3,
                    "first_name" => "Stephen",
                    "second_name" => "Hawking",
                ],
            ],
        ];

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertEquals($expectedBody, $body);
    }

    public function testAddInvalidAuthor()
    {
        $this->post("/books.json", [
            'author_id' => 99,
            'genre_id' => 11,
            'title' => 'The Universe in a Nutshell',
            'pages' => 224,
        ]);
        $this->assertEquals(400, $this->_response->statusCode());
    }

    public function testAddInvalidGenre()
    {
        $this->post("/books.json", [
            'author_id' => 3,
            'genre_id' => 99,
            'title' => 'The Universe in a Nutshell',
            'pages' => 224,
        ]);
        $this->assertEquals(400, $this->_response->statusCode());
    }

    public function testEditSuccessful()
    {
        $this->put("/books/102.json", [
            'title' => "Identity and Violence: The Illusion of Destiny",
            'pages' => 215,
        ]);

        $this->assertResponseSuccess();

        $this->get("/authors/61/books.json");

        $expectedBody = [
            [
                "id" => 102,
                "title" => "Identity and Violence: The Illusion of Destiny",
                "pages" => 215,
                "genre" => [
                    "id" => 11,
                    "name" => "Philosophy",
                ],
                "author" => [
                    "id" => 61,
                    "first_name" => "Amartya",
                    "second_name" => "Sen",
                ],
            ]
        ];

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertEquals($expectedBody, $body);
    }

    public function testEditBookNotFound()
    {
        $this->put("/books/999.json", [
            'title' => "Unknown book",
        ]);

        $this->assertEquals(404, $this->_response->statusCode());
    }

    public function testRemoveSuccessful()
    {
        $this->delete("/books/40.json");

        $this->assertResponseSuccess();

        $this->get("/authors/39/books.json");

        $expectedBody = [
            [
                "id" => 174,
                "title" => "Philosophy: Who Needs It",
                "pages" => 466,
                "genre" => [
                    "id" => 11,
                    "name" => "Philosophy",
                ],
                "author" => [
                    "id" => 39,
                    "first_name" => "Ayn",
                    "second_name" => "Rand",
                ],
            ],
        ];

        $this->assertResponseSuccess();
        $body = json_decode($this->_response->body(), true);
        $this->assertEquals($expectedBody, $body);
    }

    public function testRemoveBookNotFound()
    {
        $this->delete("/books/999.json");

        $this->assertEquals(404, $this->_response->statusCode());
    }
}
