<?php

use common\models\Syscode;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Altemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="altemplate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'templatename')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'filecontent')->widget('common\widgets\ueditor\Ueditor',[
        'options'=>[
            'initialFrameWidth' => 850,
        ]
    ]) ?>
    <?php
    	$isshare = Syscode::find()->where(['majorcode'=>'whether'])->all();
    	$arrIsshare = ArrayHelper::map($isshare,'id','meaning');
    ?>
    
    <?= $form->field($model, 'isshare')->dropDownList(
	    								$arrIsshare, 
	                                	['prompt'=>'请选择状态...'])?>    


    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
