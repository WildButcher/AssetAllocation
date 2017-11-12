<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '添加管理者';
$this->params['breadcrumbs'][] = ['label' => '后台人员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_newform', [
        'model' => $model,
    ]) ?>

</div>
