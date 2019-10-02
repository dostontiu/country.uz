<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */

$this->title = Yii::t('app', 'Создать каталог');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
