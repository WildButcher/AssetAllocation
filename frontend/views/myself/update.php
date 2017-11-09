<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */

$this->title = '修改资产配置单: ' . $model->filename;
$this->params['breadcrumbs'][] = ['label' => '资产配置单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->filename, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="allocation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
