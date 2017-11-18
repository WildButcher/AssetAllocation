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
    						->join('INNER JOIN','syscode','syscode.id = altemplate.status and syscode.majorcode = \'status\' and syscode.minicode = 2')   						
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
		                                
	<div id="productslist" class="">
		<div class="">
			<div class="">
				<span><?= Html::label('选择理财产品')?></span>
			</div>
		</div>
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#chooseProducts">
		  选择...
		</button>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="20%">理财产品名称</th>
					<th width="20%">年利率</th>
					<th width="20%">起购点</th>
					<th width="20%">持有周期</th>
					<th width="20%">到期获利</th>					
				</tr>
			</thead>
			<tbody id="insertPoint">
			</tbody>
		</table>
		<!-- Modal -->
		<div class="modal fade" id="chooseProducts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">理财产品选择</h4>
		      </div>
		      <div class="modal-body">
		        <?= $this->render('_items')?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="chanleAll()">关闭</button>
		        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="insertProducts()">确定</button>
		      </div>
		    </div>
		  </div>
		</div>		
	</div>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
