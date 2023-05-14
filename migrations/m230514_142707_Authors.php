<?php

use yii\db\Migration;

/**
 * Class m230514_142707_Authors
 */
class m230514_142707_Authors extends Migration
{
//    /**
//     * {@inheritdoc}
//     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m230514_142707_Authors cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable(
            'authors',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'email' => $this->string()
            ]
        );
        $this->alterColumn('authors', 'id',
                           $this->integer(). ' NOT NULL AUTO_INCREMENT');
    }

    public function down()
    {
        echo "m230514_142707_Authors cannot be reverted.\n";

        return false;
    }

}
