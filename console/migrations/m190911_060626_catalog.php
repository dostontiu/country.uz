<?php

use yii\db\Migration;

/**
 * Class m190911_060626_catalog
 */
class m190911_060626_catalog extends Migration
{
    public function up()
    {
        $this->createTable('catalog', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(null)->null(),
            'rating' => $this->integer()->notNull(),
            'icon' => $this->string()->notNull(),
            'name_uz' => $this->string()->notNull(),
            'name_en' => $this->string()->notNull(),
            'name_ru' => $this->string()->notNull(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-catalog-parent_id',
            'catalog',
            'parent_id'
        );
        // add foreign key for table `catalog`
        $this->addForeignKey(
            'fk-catalog-parent_id',
            'catalog',
            'parent_id',
            'catalog',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-catalog-parent_id',
            'catalog'
        );
        $this->dropIndex(
            'idx-catalog-parent_id',
            'catalog'
        );
        $this->dropTable('catalog');
    }
}
