<?php

use yii\db\Migration;

/**
 * Class m190826_185342_country
 */
class m190826_185342_country extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(null)->null(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'population' => $this->float()->null(),
            'photo' => $this->string()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-country-user_id',
            'country',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-country-user_id',
            'country',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `post_id`
        $this->createIndex(
            'idx-country-parent_id',
            'country',
            'parent_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-country-parent_id',
            'country',
            'parent_id',
            'country',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-country-user_id',
            'country'
        );
        $this->dropIndex(
            'idx-country-user_id',
            'post'
        );

        $this->dropForeignKey(
            'fk-country-parent_id',
            'country'
        );
        $this->dropIndex(
            'idx-country-parent_id',
            'post'
        );

        $this->dropTable('country');
    }

}
