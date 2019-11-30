<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%catalog}}".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $icon
 * @property string $name_tj
 * @property string $name_en
 * @property string $name_ru
 *
 * @property Catalog $parent
 * @property Catalog[] $catalogs
 * @property OrganizationCatalog[] $organizationCatalogs
 */
class Catalog extends \yii\db\ActiveRecord
{
    public $image;

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
            [['parent_id'], 'integer'],
            [['name_tj', 'name_en', 'name_ru'], 'required'],
            [['icon', 'name_tj', 'name_en', 'name_ru'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'1048580'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'ID родителя',
            'icon' => 'Икона',
            'name_tj' => 'Название (ТЖ)',
            'name_en' => 'Название (EN)',
            'name_ru' => 'Название (РУ)',
            'fullName' => 'Название',
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
        return $this->hasMany(OrganizationCatalog::className(), ['catalog_id' => 'id'])->with('organization');
    }

    /* Getter for all name */
    public function getFullName() {
        return Html::a(($this->name_ru)?$this->name_ru:'На другом языке',['view', 'id' => $this->id]);
    }

    public function extraFields()
    {
        return ['parent', 'catalogs', 'organizations' => function($model){
            return $model->getOrganizations($model->id);
        }];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if ($this->icon==null){
            Yii::$app->session->setFlash('error', "Нужно загрузить изображение");
            return false;
        }
        return true;
    }

    public function fields()
    {
        return [
            'id',
            'name_tj',
            'name_en',
            'name_ru',
//            'organizations' => 'organizationCatalogs'
        ];
    }

    public function getOrganizations($cat_id)
    {
        $query = (new \yii\db\Query())
            ->select('id, rating, photo, name_tj, name_en, name_ru, description_tj, description_en, description_ru, gps')
            ->where(['catalog_id' => $cat_id])
            ->from('organization_catalog')
            ->leftJoin( 'organization', '`organization_catalog`.`organization_id` = `organization`.`id`');
        return $query->createCommand()->queryAll();
    }
}
