<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Altemplate */

$this->title = '修改模板信息: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '模板管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="altemplate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_editform', [
        'model' => $model,
    ]) ?>

</div>
