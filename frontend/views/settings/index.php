<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '我的个人信息';
?>

<div class="container">	
	<div class="row">	
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li><?= $this->title?></li>
			</ol>
			<div class="box">
				<div class="list-group">										
					<div class="adviser-view">				
					    <p>
					        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
					        
					    </p>					
					    <?= DetailView::widget([
					        'model' => $model,
					        'attributes' => [
					            'xingming',
					            'idnumber',
					            'mobliephone',
					            'email:email',
					            'dept',
					        ],
					    ]) ?>					
					</div>
					<div class="list-group-item">
						<span class="glyphicon glyphicon-cog"></span>
						<em><?= Html::a('密码重置',['reset-password','id'=>$model->id])?></em>
					</div>										
				</div>
			</div>
		</div>
	</div>
</div>