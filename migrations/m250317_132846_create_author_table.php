<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table author.
 */
class m250317_132846_create_author_table extends Migration
{
    const TABLE_NAME = 'author';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'fio' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
