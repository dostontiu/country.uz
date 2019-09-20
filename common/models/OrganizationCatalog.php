<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%organization_catalog}}".
 *
 * @property int $id_id
 * @property int $organization_id
 * @property int $catalog_id
 *
 * @property Catalog $catalog
 * @property Organization $organization
 */
class OrganizationCatalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%organization_catalog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'catalog_id'], 'required'],
            [['organization_id', 'catalog_id'], 'integer'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_id' => 'Id ID',
            'organization_id' => 'Organization ID',
            'catalog_id' => 'Catalog ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\search\OrganizationCatalogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\search\OrganizationCatalogQuery(get_called_class()); // mashini o'chirib tashlash keremidi?
    }

    public function extraFields()
    {
        return ['catalog', 'organization'];
    }
}
