<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Allocation */

$this->title = '新增资产配置单';
$this->params['breadcrumbs'][] = ['label' => '资产配置单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allocation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_newform', [
        'model' => $model,
    ]) ?>

</div>
