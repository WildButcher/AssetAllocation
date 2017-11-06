<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adviser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adviser-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'xingming')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idnumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobliephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dept')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
