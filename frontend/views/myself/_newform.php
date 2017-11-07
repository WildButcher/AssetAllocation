<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Syscode;
use yii\helpers\ArrayHelper;
use common\models\Altemplate;
use common\models\Products;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allocation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>
    
    <?php
    	$status = Syscode::find()->where(['majorcode'=>'status'])->all();
    	$arrStatus = ArrayHelper::map($status,'id','meaning');
    	$isshare = Syscode::find()->where(['majorcode'=>'whether'])->all();
    	$arrIsshare = ArrayHelper::map($isshare,'id','meaning');
    	$lid = Altemplate::find()->all();
    	$arrLid = ArrayHelper::map($lid,'id','templatename');
    	$pro = Products::find()->all();
    	$arrPro = ArrayHelper::map($pro,'id','pname');
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
		                                
	<?= Html::label('选择理财产品')?>
	<?= Html::CheckboxList('arrpro', 'aaa', $arrPro)?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
