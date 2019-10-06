<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $catalogs common\models\Organization */

$this->title = Yii::t('app', 'Создать организацию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-create">

    <?= $this->render('_form', [
        'model' => $model,
        'catalogs' => $catalogs,
    ]) ?>

</div>
