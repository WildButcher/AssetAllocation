<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Syscode;
use common\models\Adviser;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Altemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="altemplate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'templatename')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'filecontent')->widget('common\widgets\ueditor\Ueditor',[
        'options'=>[
        		'autoHeightEnabled'=> true,
        		'autoFloatEnabled'=>true,
        		'initialFrameHeight'=>500,
        ]
    ]) ?>
    <?php
    	$status = Syscode::find()->where(['majorcode'=>'status'])->all();
    	$arrStatus = ArrayHelper::map($status,'id','meaning');
    	$isshare = Syscode::find()->where(['majorcode'=>'whether'])->all();
    	$arrIsshare = ArrayHelper::map($isshare,'id','meaning');
    	$advisers = Adviser::find()->all();
    	$arrAdvisers= ArrayHelper::map($advisers,'id','xingming');
    ?>
    
    <?= $form->field($model, 'isshare')->dropDownList(
	    								$arrIsshare, 
	                                	['prompt'=>'请选择状态...'])?>
	                                	
    <?= $form->field($model, 'oid')->dropDownList(
    									$arrAdvisers, 
		                                ['prompt'=>'请选择状态...'])?>

    <?= $form->field($model, 'status')->dropDownList(
		    							$arrStatus, 
		                                ['prompt'=>'请选择状态...'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '保存' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
