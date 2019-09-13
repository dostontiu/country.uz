<?php

use yii\db\Migration;

/**
 * Class m190911_155954_post_category
 */
class m190911_155954_organization_catalog extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('organization_catalog', [
            'id_id' => $this->primaryKey(),
            'organization_id' => $this->integer()->notNull(),
            'catalog_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `organization_id`
        $this->createIndex(
            'idx-organization_catalog-organization_id',
            'organization_catalog',
            'organization_id'
        );
        // add foreign key for table `organization`
        $this->addForeignKey(
            'fk-organization_catalog-organization_id',
            'organization_catalog',
            'organization_id',
            'organization',
            'id',
            'CASCADE'
        );

        // creates index for column `catalog_id`
        $this->createIndex(
            'idx-organization_catalog-catalog_id',
            'organization_catalog',
            'catalog_id'
        );
        // add foreign key for table `catalog`
        $this->addForeignKey(
            'fk-organization_catalog-catalog_id',
            'organization_catalog',
            'catalog_id',
            'catalog',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-organization_catalog-organization_id',
            'organization_catalog'
        );
        $this->dropIndex(
            'idx-organization_catalog-organization_id',
            'organization_catalog'
        );

        $this->dropForeignKey(
            'fk-organization_catalog-catalog_id',
            'organization_catalog'
        );
        $this->dropIndex(
            'idx-organization_catalog-catalog_id',
            'organization_catalog'
        );

        $this->dropTable('organization_catalog');
    }
}
