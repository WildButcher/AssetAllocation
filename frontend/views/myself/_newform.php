<?php

use common\models\Altemplate;
use common\models\Products;
use common\models\Syscode;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allocation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>
    
    <?php
    	$isshare = Syscode::find()->where(['majorcode'=>'whether'])->all();
    	$arrIsshare = ArrayHelper::map($isshare,'id','meaning');
    	
    	$lid = Altemplate::find()
    						->join('INNER JOIN','Syscode','syscode.id = altemplate.status and Syscode.majorcode = \'status\' and Syscode.minicode = 2')   						
    						->all();
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

		                                
	<?= Html::label('选择理财产品')?>
	<?= Html::CheckboxList('arrpro', 'aaa', $arrPro)?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
