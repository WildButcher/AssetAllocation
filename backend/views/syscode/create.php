<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Syscode */

$this->title = '新增系统代码';
$this->params['breadcrumbs'][] = ['label' => '系统代码管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syscode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
