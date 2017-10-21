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
        <?= Html::a('新建资产配置单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'createtime',
            'publictime',
            'downcount',
            'filelinks',
            // 'filecontent:ntext',
            // 'isshare',
            // 'lid',
            // 'status',
            // 'oid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
