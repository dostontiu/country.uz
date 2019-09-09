<?php


namespace app\components;


use yii\web\AssetBundle;

class VoteWidgetAsset extends AssetBundle
{
    public $js = [
        'js/votewidget.js'
    ];

    public $css = [
        // CDN lib
        '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'css/votewidget.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }
}