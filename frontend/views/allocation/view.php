<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */

$this->title = '查看资产配置单: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '资产配置单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allocation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '是否删除该信息?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'filename',
        	[
        		'attribute' => 'oid',
        		'value' => $model->o->xingming,
        	],
            'createtime',
            'publictime',
            'downcount',
            'filelinks',
            'filecontent:ntext',
        	[
        		'attribute' => 'isshare',
        		'value' => $model->isshare0->meaning,
        	],
        	[
        		'attribute' => 'lid',
        		'value' => $model->l->templatename,
        	],
        	[
        		'attribute' => 'status',
        		'value' => $model->status0->meaning,
        	],
        ],
    ]) ?>

</div>
