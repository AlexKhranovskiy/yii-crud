<?php

use yii\db\Migration;

/**
 * Class m230514_142832_Books
 */
class m230514_142832_Books extends Migration
{
    public function up()
    {
        $this->createTable(
            'books',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'date' => $this->date()
            ]
        );
        $this->alterColumn('books', 'id',
                           $this->integer(). ' NOT NULL AUTO_INCREMENT');

    }

    public function down()
    {
        echo "m230514_142832_Books cannot be reverted.\n";

        return false;
    }

}
