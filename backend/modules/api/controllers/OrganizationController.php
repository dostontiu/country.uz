<?php

namespace app\modules\api\controllers;

use common\models\Organization;

class OrganizationController extends ApiActiveController
{
    public $modelClass = 'common\models\Organization';

    public function actionSearchFilter(){
        return Organization::find()->all();
    }
}
