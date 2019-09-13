<?php


namespace common\models;


use yii\helpers\ArrayHelper;

class OrganizationWithCatalog extends Organization
{
    /**
     * @var array IDs of the catalogs
     */
    public $catalog_ids = []; //shunaqa qildim endi

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            // each catalog_id must exist in catalog table (*1)
            ['catalog_ids', 'each', 'rule' => [
                'exist', 'targetClass' => Catalog::className(), 'targetAttribute' => 'id'
            ]
            ],
        ]);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'catalog_ids' => 'Catalogs',
        ]);
    }

    /**
     * load the organization's catalogs (*2)
     */
    public function loadCatalogs()
    {
        $this->catalog_ids = [];
        if (!empty($this->id)) {
            $rows = OrganizationCatalog::find()
                ->select(['catalog_id'])
                ->where(['organization_id' => $this->id])
                ->asArray()
                ->all();
            foreach($rows as $row) {
                $this->catalog_ids[] = $row['catalog_id'];
            }
        }
    }

    /**
     * save the organization's catalogs (*3)
     */
    public function saveCatalogs()
    {
        /* clear the catalogs of the organization before saving */
        OrganizationCatalog::deleteAll(['organization_id' => $this->id]);
        if (is_array($this->catalog_ids)) {
            foreach($this->catalog_ids as $catalog_id) {
                $pc = new OrganizationCatalog();
                $pc->organization_id = $this->id;
                $pc->catalog_id = $catalog_id;
                $pc->save();
            }
        }
        /* Be careful, $this->catalog_ids can be empty */
    }
}