<?php

use yii\db\Migration;

/**
 * Class m190911_073735_organizations
 */
class m190911_073735_organizations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('organization', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->null(),
            'rating' => $this->string()->notNull(), // this should be integer
            'photo' => $this->string()->notNull(),
            'gps' => $this->string()->notNull(),
            'name_uz' => $this->string()->notNull(),
            'name_en' => $this->string()->notNull(),
            'name_ru' => $this->string()->notNull(),
            'description_uz' => $this->string()->notNull(),
            'description_en' => $this->string()->notNull(),
            'description_ru' => $this->string()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-organization-user_id',
            'organization',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-organization-user_id',
            'organization',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `region_id`
        $this->createIndex(
            'idx-organization-region_id',
            'organization',
            'region_id'
        );
        // add foreign key for table `region`
        $this->addForeignKey(
            'fk-organization-region_id',
            'organization',
            'region_id',
            'region',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-organization-user_id',
            'organization'
        );
        $this->dropIndex(
            'idx-organization-user_id',
            'organization'
        );

        $this->dropForeignKey(
            'fk-organization-region_id',
            'organization'
        );
        $this->dropIndex(
            'idx-organization-region_id',
            'organization'
        );

        $this->dropTable('organization');
    }
}
