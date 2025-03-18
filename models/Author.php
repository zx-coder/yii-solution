<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int id
 * @property string $fio
 */
class Author extends ActiveRecord
{
    /**
     * @param int $year
     * @return \yii\db\ActiveQuery
     */
    public static function getTopActiveQuery(int $year = 0): ActiveQuery
    {
        $result = self::find()
            ->select([self::tableName() . '.id', self::tableName() . '.fio'])
            ->leftJoin(BookAuthor::tableName(), BookAuthor::tableName(). '.author_id = ' . self::tableName() . '.id')
            ->leftJoin(Book::tableName(), Book::tableName() . '.id = ' . BookAuthor::tableName() . '.book_id')
            ->groupBy(self::tableName() . '.id')
            ->orderBy( ['count(' . self::tableName() . '.id)' => SORT_DESC]);

        if ($year) {
            $result->where([Book::tableName() . '.year' => $year]);
        }

        return $result;
    }

    public static function getTop10(int $year = 0)
    {
        return self::getTopActiveQuery($year)->all();
    }
}
