<?php


namespace app\components;


use yii\base\Widget;

class VoteWidget extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        VoteWidgetAsset::register($this->getView());
        return $this->render('_debug', ['product' => $this->model]);
    }

    public function getViewPath()
    {
        return '@app/views/';
    }
}