<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%catalog}}".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $rating
 * @property string $icon
 * @property string $name_uz
 * @property string $name_en
 * @property string $name_ru
 *
 * @property Catalog $parent
 * @property Catalog[] $catalogs
 * @property OrganizationCatalog[] $organizationCatalogs
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'rating'], 'integer'],
            [['rating', 'icon', 'name_uz', 'name_en', 'name_ru'], 'required'],
            [['icon', 'name_uz', 'name_en', 'name_ru'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'rating' => 'Rating',
            'icon' => 'Icon',
            'name_uz' => 'Name Uz',
            'name_en' => 'Name En',
            'name_ru' => 'Name Ru',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'parent_id'])->from(Catalog::tableName() . ' parent_page');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::className(), ['parent_id' => 'id'])->from(Catalog::tableName() . ' sub_page');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationCatalogs()
    {
        return $this->hasMany(OrganizationCatalog::className(), ['catalog_id' => 'id']);
    }

    /**
     * Get all the available categories (*4)
     * @return array available categories
     */
    public static function getAvailableCatalogs()
    {
        $catalogs = self::find()->orderBy('name_uz')->asArray()->all();
        $items = ArrayHelper::map($catalogs, 'id', 'name_uz');
        return $items;
    }

    public function extraFields()
    {
        return ['parent', 'catalogs', 'organizationCatalogs'];
    }
}
