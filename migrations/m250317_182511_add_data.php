<?php


use yii\db\Migration;

/**
 * Add data to author and book tables
 */
class m250317_182511_add_data extends Migration
{
    const TABLE_NAME_BOOK = 'book';
    const TABLE_NAME_AUTHOR= 'author';
    const TABLE_NAME_BOOK_AUTHOR = 'book_author';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->batchInsert(self::TABLE_NAME_BOOK,
            ['id', 'title', 'year', 'description', 'isbn'],
            [
                [1, 'book 1', 2001, 'bla bla bla', 'isbn 1'],
                [2, 'book 2', 2001, 'bla bla bla', 'isbn 2'],
                [3, 'book 3', 2001, 'bla bla bla', 'isbn 3'],
                [4, 'book 4', 2001, 'bla bla bla', 'isbn 4'],
                [5, 'book 5', 2004, 'bla bla bla', 'isbn 5'],
            ]
        );

        $this->batchInsert(self::TABLE_NAME_AUTHOR,
            ['id', 'fio'],
            [
                [1, 'fio 1'],
                [2, 'fio 2'],
                [3, 'fio 3'],
                [4, 'fio 4'],
                [5, 'fio 5'],
                [6, 'fio 6'],
                [7, 'fio 7'],
                [8, 'fio 8'],
                [9, 'fio 9'],
                [10, 'fio 10'],
                [11, 'fio 11'],
                [12, 'fio 12'],
            ]
        );

        $this->batchInsert(self::TABLE_NAME_BOOK_AUTHOR,
            ['author_id', 'book_id'],
            [
                [1,1],
                // 2 - 3
                [2,2],
                [2,3],
                [2,4],

                [3,5],
                [4,1],
                // 5 -5
                [5,2],
                [5,3],
                [5,4],
                [5,5],
                [5,1],

                [6,2],
                [7,3],
                [8,4],
                [9,5],
                [10,1],
                [11,2],
                [12,3],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete(self::TABLE_NAME_BOOK_AUTHOR);
        $this->delete(self::TABLE_NAME_BOOK);
        $this->delete(self::TABLE_NAME_AUTHOR);
    }
}
