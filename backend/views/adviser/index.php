<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdviserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '投顾管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adviser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增投顾', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        	[
        		'attribute'=>'id',
        		'contentOptions'=>['width'=>'30px'],
        	],
        	'username',
            'xingming',
            'idnumber',
            'mobliephone',
            'email:email',
            'dept',
        	[
        		'attribute'=>'ischeck',
        		'value'=>function($model){
        					$arr = ['未审核','已审核'];
        					return $arr[$model->ischeck];
        				},
        		'contentOptions'=>function($model){
        				return ['style' => $model->ischeck % 2 == 1 ? 'color:green' : 'color:red'];
        				},
        	],
            [
            	'class' => 'yii\grid\ActionColumn',
            	'template'=>'{view}{update}{reset-password}{privilege}{delete}',
            	'buttons'=>[
	            				'reset-password'=>function($url,$model,$key)
		            			{
		        					$options=[
		        								'title'=>Yii::t('yii','重置密码'),
		        								'aria-label'=>Yii::t('yii','重置密码'),
		        								'data-pjax'=>'0',
		        							];
		        					return Html::a('<span class="glyphicon glyphicon-lock"></span>',$url,$options);
		        				},
		        				'privilege'=>function($url,$model,$key)
		        				{
		        					$options=[
		        							'title'=>Yii::t('yii','审核'),
		        							'aria-label'=>Yii::t('yii','审核'),
		        							'data-pjax'=>'0',
		        					];
		        					return Html::a('<span class="glyphicon glyphicon-user"></span>',$url,$options);
		        				},
    						],
    		],
        ],
    ]); ?>
</div>
