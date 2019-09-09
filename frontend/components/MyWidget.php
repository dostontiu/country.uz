<?php
namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
class MyWidget extends Widget {
    public $message;
    public function init() {
        // your logic here
        parent::init();
        if ($this->message === null) {
            $this->message = 'Welcome Guest';
        } else {
            $this->message = 'Welcome ' . $this->message;
        }
    }
    public function run(){
        // you can load & return the view or you can return the output variable
        return $this->render('myWidget', ['message' => $this->message]);
    }
}