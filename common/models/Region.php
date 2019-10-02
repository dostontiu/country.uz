<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property int $id
 * @property string $name_uz
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
            [['name_uz', 'name_en', 'name_ru'], 'required'],
            [['name_uz', 'name_en', 'name_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Название (UZ)',
            'name_en' => 'Название (EN)',
            'name_ru' => 'Название (RU)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['region_id' => 'id']);
    }

    public function extraFields()
    {
        return ['organizations'];
    }
}
