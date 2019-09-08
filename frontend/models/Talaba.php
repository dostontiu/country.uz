<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%talaba}}".
 *
 * @property int $id
 * @property string $name
 * @property double $population
 */
class Talaba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%talaba}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['population'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'population' => Yii::t('app', 'Population'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TalabaQuery the active query used by this AR class.
     */
//    public static function find()
//    {
//        return new TalabaQuery(get_called_class());
//    }
}
