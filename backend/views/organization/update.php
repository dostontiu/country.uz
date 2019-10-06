<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $catalogs common\models\Organization */

$this->title = Yii::t('app', 'Обновить организацию : {name}', [
    'name' => $model->name_ru,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organization-update">

    <?= $this->render('_form', [
        'model' => $model,
        'catalogs' => $catalogs,
    ]) ?>

</div>
