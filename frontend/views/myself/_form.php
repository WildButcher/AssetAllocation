<?php

use common\models\Syscode;
use common\models\Altemplate;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allocation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filecontent')->textarea(['rows' => 6]) ?>
    
    <?php
    	$status = Syscode::find()->where(['majorcode'=>'status'])->all();
    	$arrStatus = ArrayHelper::map($status,'id','meaning');
    	$isshare = Syscode::find()->where(['majorcode'=>'whether'])->all();
    	$arrIsshare = ArrayHelper::map($isshare,'id','meaning');
    	$lid = Altemplate::find()->all();
    	$arrLid = ArrayHelper::map($lid,'id','templatename');
    ?>
    
    <?= $form->field($model, 'isshare')->dropDownList(
	    								$arrIsshare, 
	                                	['prompt'=>'请选择状态...'])?>

    <?= $form->field($model, 'lid')->dropDownList(
    									$arrLid, 
	                                	['prompt'=>'请选择状态...'])?>

    <?= $form->field($model, 'status')->dropDownList(
		    							$arrStatus, 
		                                ['prompt'=>'请选择状态...'])?>

    <div class="form-group">
        <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
