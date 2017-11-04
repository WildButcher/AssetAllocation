<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Syscode;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AltemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '模板管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="altemplate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增模版', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        	[
        		'attribute'=>'id',
        		'contentOptions'=>['width'=>'30px'],
        	],
            'templatename',
            'createtime',
            'filecontent:ntext',
        	[
        		'attribute' => 'isshare',
        		'value' => 'isshare0.meaning',
        		'filter' => Syscode::get_type('whether'),
        		'contentOptions'=>['width'=>'120px'],
        	],
            [
            	'attribute' => 'oname',
            	'label' => '所属投顾',
            	'value' => 'o.xingming',
            	'contentOptions'=>['width'=>'180px'],
    		],
       		[
   				'attribute' => 'status',
   				'value' => 'status0.meaning',
       			'filter' =>Syscode::get_type('status'),
       			'contentOptions'=>['width'=>'100px'],
       		],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
