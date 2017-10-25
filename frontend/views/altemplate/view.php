<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Altemplate */

$this->title = '模板详细内容:' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '模板管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="altemplate-view">

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
            'templatename',
            'createtime',
            'filecontent:ntext',
        		[
        				'attribute' => 'isshare',
        				'value' => $model->isshare0->meaning,
        		],
        		[
        				'attribute' => 'oid',
        				'value' => $model->o->xingming,
        		],
        		[
        				'attribute' => 'status',
        				'value' => $model->status0->meaning,
        		],
        ],
    ]) ?>

</div>
