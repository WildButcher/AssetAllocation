<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AdviserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adviser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'xingming') ?>

    <?= $form->field($model, 'idnumber') ?>

    <?= $form->field($model, 'mobliephone') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'dept') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
