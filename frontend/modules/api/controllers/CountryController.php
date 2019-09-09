<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Country;
use yii\rest\ActiveController;
use yii\web\Response;

class CountryController extends ActiveController
{
    public $modelClass = "app\modules\api\models\Country";
}
