<?php

use yii\db\Migration;

/**
 * Class m230514_143406_Authors_Books
 */
class m230514_143406_Authors_Books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('authors_books',[
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'book_id' => $this->integer()
        ]);
        $this->alterColumn('authors_books', 'id',
                                  $this->integer(). ' NOT NULL AUTO_INCREMENT');
        $this->addForeignKey(
            'authors_books_to_authors',
            'authors_books',
            'author_id',
            'authors',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            'authors_books_to_books',
            'authors_books',
            'book_id',
            'books',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m230514_143406_Authors_Books cannot be reverted.\n";

        return false;
    }

}
