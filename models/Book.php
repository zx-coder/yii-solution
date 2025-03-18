<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property string $title
 * @property int $year
 * @property string $description
 * @property string $isbn
 */
class Book extends ActiveRecord
{
    // select author_id from book group by author_id order by count(id) desc
    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])
            ->viaTable(BookAuthor::tableName(), ['book_id' => 'id']);
    }
}
