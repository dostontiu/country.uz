<?php

use yii\db\Migration;

/**
 * Class m190826_212150_talaba
 */
class m190826_212150_talaba extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('talaba', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'population' => $this->float()->null(),
        ]);
    }

    public function down()
    {
        $this->dropTable('talaba');
    }
}
