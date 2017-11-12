<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput() ?>
	
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
				
	<?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'email')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
