<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Allocation;
use common\models\Syscode;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AllocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '资产配置单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allocation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增资产管理配置单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        	[
        		'attribute'=>'id',
        		'contentOptions'=>['width'=>'30px'],
        	],
            'filename',
            'createtime',
            'publictime',
        	[
        		'attribute' => 'oname',
        		'label' => '所属投顾',
        		'value' => 'o.xingming',
        		'contentOptions'=>['width'=>'180px'],
        	],
            //'downcount',
            // 'filelinks',
            // 'filecontent:ntext',
        	[
        		'attribute' => 'isshare',
        		'value' => 'isshare0.meaning',
        		'filter' => Syscode::get_type('whether'),
        		'contentOptions'=>['width'=>'120px'],
        	],
        	[
        		'attribute' => 'lid',
       			'value' => 'l.templatename',
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
