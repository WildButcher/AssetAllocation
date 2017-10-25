<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'filename',
            'createtime',
            'publictime',
        	[
        		'attribute' => 'oid',
        		'value' => 'o.xingming',
        	],
            //'downcount',
            // 'filelinks',
            // 'filecontent:ntext',
        	[
        		'attribute' => 'isshare',
        		'value' => 'isshare0.meaning',
        	],
        	[
        		'attribute' => 'lid',
       			'value' => 'l.templatename',
        	],
        	[
        		'attribute' => 'status',
        		'value' => 'status0.meaning',
        	],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
