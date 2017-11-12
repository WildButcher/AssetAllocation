<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '管理者: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '后台人员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '修改管理者';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	<div class="list-group-item">
		<span class="glyphicon glyphicon-cog"></span>
		<em><?= Html::a('密码重置',['reset-password','id'=>$model->id])?></em>
	</div>
</div>
