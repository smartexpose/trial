<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksFixture
 *
 */
class BooksFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'books';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'author_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'genre_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pages' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'book_author_pk_idx' => ['type' => 'index', 'columns' => ['author_id'], 'length' => []],
            'book_genre_pk_idx' => ['type' => 'index', 'columns' => ['genre_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'book_author_pk' => ['type' => 'foreign', 'columns' => ['author_id'], 'references' => ['Authors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'book_genre_pk' => ['type' => 'foreign', 'columns' => ['genre_id'], 'references' => ['Genres', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 3,
            'genre_id' => 3,
            'author_id' => 3,
            'title' => "God Created the Integers",
            'pages' => 223,
        ],
        [
            'id' => 10,
            'genre_id' => 7,
            'author_id' => 10,
            'title' => "How to Think Like Sherlock Holmes",
            'pages' => 466,
        ],
        [
            'id' => 40,
            'genre_id' => 11,
            'author_id' => 39,
            'title' => "Return of the Primitive",
            'pages' => 168,
        ],
        [
            'id' => 102,
            'genre_id' => 11,
            'author_id' => 61,
            'title' => "Identity & Violence",
            'pages' => 105,
        ],
        [
            'id' => 174,
            'genre_id' => 11,
            'author_id' => 39,
            'title' => "Philosophy: Who Needs It",
            'pages' => 466,
        ],
        [
            'id' => 178,
            'genre_id' => 3,
            'author_id' => 114,
            'title' => "Men of Mathematics",
            'pages' => 295,
        ],
        [
            'id' => 202,
            'genre_id' => 3,
            'author_id' => 22,
            'title' => "Structure and Randomness",
            'pages' => 197,
        ],
    ];
}
