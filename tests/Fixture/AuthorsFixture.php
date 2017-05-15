<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuthorsFixture
 *
 */
class AuthorsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'Authors';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'first_name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'second_name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'first_name' => "Stephen",
            'second_name' => "Hawking",
        ],
        [
            'id' => 4,
            'first_name' => "Stephen",
            'second_name' => "Dubner",
        ],
        [
            'id' => 10,
            'first_name' => "Maria",
            'second_name' => "Konnikova",
        ],
        [
            'id' => 22,
            'first_name' => "Terence",
            'second_name' => "Tao",
        ],
        [
            'id' => 39,
            'first_name' => "Ayn",
            'second_name' => "Rand",
        ],
        [
            'id' => 61,
            'first_name' => "Amartya",
            'second_name' => "Sen",
        ],
        [
            'id' => 114,
            'first_name' => "E T",
            'second_name' => "Bell",
        ],
    ];
}
