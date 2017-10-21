<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Syscode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="syscode-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'majorcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minicode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meaning')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
