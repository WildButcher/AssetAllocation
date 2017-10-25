<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Adviser */

$this->title = '查看投顾资料信息: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '投顾管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adviser-view">

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
            'xingming',
            'idnumber',
            'mobliephone',
            'email:email',
            'dept',
        ],
    ]) ?>

</div>
