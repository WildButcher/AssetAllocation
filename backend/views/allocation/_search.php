<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AllocationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allocation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'createtime') ?>

    <?= $form->field($model, 'publictime') ?>

    <?= $form->field($model, 'downcount') ?>

    <?= $form->field($model, 'filelinks') ?>

    <?php // echo $form->field($model, 'filecontent') ?>

    <?php // echo $form->field($model, 'isshare') ?>

    <?php // echo $form->field($model, 'lid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'oid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
