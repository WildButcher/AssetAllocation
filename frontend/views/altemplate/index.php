<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'templatename',
            'createtime',
            'filecontent:ntext',
        	[
        		'attribute' => 'isshare',
        		'value' => 'isshare0.meaning',
        	],
            [
            	'attribute' => 'oid',
            	'value' => 'o.xingming',
    		],
       		[
   				'attribute' => 'status',
   				'value' => 'status0.meaning',
       		],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
