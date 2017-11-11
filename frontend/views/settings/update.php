<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adviser */

$this->title = '修改投顾资料信息: ' . $model->xingming;
$this->params['breadcrumbs'][] = ['label' => '我的 个人信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="adviser-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
