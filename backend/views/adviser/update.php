<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adviser */

$this->title = '修改投顾资料信息: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '投顾管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="adviser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
