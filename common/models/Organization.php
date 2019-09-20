<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%organization}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $region_id
 * @property string $rating
 * @property string $photo
 * @property string $gps
 * @property string $name_uz
 * @property string $name_en
 * @property string $name_ru
 * @property string $description_uz
 * @property string $description_en
 * @property string $description_ru
 *
 * @property Region $region
 * @property User $user
 * @property OrganizationCatalog[] $organizationCatalogs
 */
class Organization extends \yii\db\ActiveRecord
{
    public $catalog;
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%organization}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'rating', 'gps', 'name_uz', 'name_en', 'name_ru', 'description_uz', 'description_en', 'description_ru', 'image'], 'required'],
            [['user_id', 'region_id'], 'integer'],
            [['rating', 'photo', 'gps', 'name_uz', 'name_en', 'name_ru', 'description_uz', 'description_en', 'description_ru'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'region_id' => 'Region ID',
            'rating' => 'Rating',
            'photo' => 'Photo',
            'gps' => 'Gps',
            'name_uz' => 'Name Uz',
            'name_en' => 'Name En',
            'name_ru' => 'Name Ru',
            'description_uz' => 'Description Uz',
            'description_en' => 'Description En',
            'description_ru' => 'Description Ru',
            'catalog' => 'Catalog',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationCatalogs()
    {
        return $this->hasMany(OrganizationCatalog::className(), ['organization_id' => 'id']);
    }

    public function extraFields()
    {
        return ['organizationCatalogs', 'region'];
    }
}
