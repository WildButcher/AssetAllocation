<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AltemplateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="altemplate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'templatename') ?>

    <?= $form->field($model, 'createtime') ?>

    <?= $form->field($model, 'filecontent') ?>

    <?= $form->field($model, 'isshare') ?>

    <?php // echo $form->field($model, 'oid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
