<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Syscode;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '理财产品管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增理财产品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        		[
        				'attribute'=>'id',
        				'contentOptions'=>['width'=>'30px'],
        		],
            'pname',
            'rate',
            'buypoint',
            'term',
            'profit',
            'createtime',
        		[
        				'attribute' => 'status',
        				'value' => 'status0.meaning',
        				'filter' =>Syscode::get_type('status'),
        				'contentOptions'=>['width'=>'100px'],
        		],
        ],
    ]); ?>
</div>
