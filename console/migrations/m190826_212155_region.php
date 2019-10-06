<?php

use yii\db\Migration;

/**
 * Class m190826_212150_talaba
 */
class m190826_212155_region extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'name_tj' => $this->string()->notNull(),
            'name_en' => $this->string()->notNull(),
            'name_ru' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('region');
    }
}
