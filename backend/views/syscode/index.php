<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SyscodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统代码管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syscode-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增代码', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        	[
        		'attribute'=>'id',
        		'contentOptions'=>['width'=>'30px'],
        	],
            'majorcode',
            'minicode',
            'meaning',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
