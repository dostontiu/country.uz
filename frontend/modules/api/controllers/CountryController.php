<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Country;
use yii\web\Response;

class CountryController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionCreate()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $country = new Country();
        $country->scenario = Country::SCENARIO_CREATE;
        $country->attributes = \Yii::$app->request->post();

        if ($country->validate() && $country->save()){
            return array('status'=>true);
        } else {
            return array('status'=>false, 'data' => $country->getErrors());
        }
    }

}
