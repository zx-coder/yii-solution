<?php

namespace app\models;

use yii\db\ActiveRecord;

class BookAuthor extends ActiveRecord
{
    // select author_id from book group by author_id order by count(id) desc
}
