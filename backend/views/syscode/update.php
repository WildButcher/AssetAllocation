<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Syscode */

$this->title = 'Update Syscode: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Syscodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="syscode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
