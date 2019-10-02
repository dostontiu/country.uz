<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */

$this->title = Yii::t('app', 'Обновить каталог : {name}', [
    'name' => $model->name_en,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="catalog-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
