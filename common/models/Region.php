<?php

namespace common\models;

use yii\helpers\Html;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property int $id
 * @property string $name_tj
 * @property string $name_en
 * @property string $name_ru
 *
 * @property Organization[] $organizations
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_tj', 'name_en', 'name_ru'], 'required'],
            [['name_tj', 'name_en', 'name_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_tj' => 'Название (ТЖ)',
            'name_en' => 'Название (EN)',
            'name_ru' => 'Название (РУ)',
            'fullName' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['region_id' => 'id']);
    }

    /* Getter for all name */
    public function getFullName() {
        return Html::a(($this->name_ru)?$this->name_ru:'На другом языке',['view', 'id' => $this->id]);
    }

    public function extraFields()
    {
        return ['organizations'];
    }
}
