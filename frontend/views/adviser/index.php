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
            'id',
            'xingming',
            'idnumber',
            'mobliephone',
            'email:email',
            'dept',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
