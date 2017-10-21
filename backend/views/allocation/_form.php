<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allocation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'createtime')->textInput() ?>

    <?= $form->field($model, 'publictime')->textInput() ?>

    <?= $form->field($model, 'downcount')->textInput() ?>

    <?= $form->field($model, 'filelinks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filecontent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isshare')->textInput() ?>

    <?= $form->field($model, 'lid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
