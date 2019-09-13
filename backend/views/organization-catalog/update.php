<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationCatalog */

$this->title = Yii::t('app', 'Update Organization Catalog: {name}', [
    'name' => $model->id_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_id, 'url' => ['view', 'id' => $model->id_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organization-catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
