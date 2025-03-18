<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m250317_182510_create_book_author_table extends Migration
{
    const TABLE_NAME = 'book_author';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'book_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-author_id',
            self::TABLE_NAME,
            'author_id'
        );

        // creates index for column `book_id`
        $this->createIndex(
            'idx-book_id',
            self::TABLE_NAME,
            'book_id'
        );

        // add foreign key for table `author`
        $this->addForeignKey(
            'fk-author_id',
            self::TABLE_NAME,
            'author_id',
            'author',
            'id',
            'CASCADE'
        );

        // add foreign key for table `book`
        $this->addForeignKey(
            'fk-book_id',
            self::TABLE_NAME,
            'book_id',
            'book',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drop foreign key
        $this->dropForeignKey(
            'fk-author_id',
            self::TABLE_NAME
        );

        $this->dropForeignKey(
            'fk-book_id',
            self::TABLE_NAME
        );

        // drops index
        $this->dropIndex(
            'idx-book_id',
            self::TABLE_NAME
        );

        $this->dropIndex(
            'idx-author_id',
            self::TABLE_NAME
        );

        $this->dropTable(self::TABLE_NAME);
    }
}
