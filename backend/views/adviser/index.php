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
            	'class' => 'yii\grid\ActionColumn',
            	'template'=>'{view}{update}{resetpwd}{privilege}{delete}',
            	'buttons'=>[
	            				'resetpwd'=>function($url,$model,$key)
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
		        							'title'=>Yii::t('yii','权限'),
		        							'aria-label'=>Yii::t('yii','权限'),
		        							'data-pjax'=>'0',
		        					];
		        					return Html::a('<span class="glyphicon glyphicon-user"></span>',$url,$options);
		        				},
    						],
    		],
        ],
    ]); ?>
</div>
