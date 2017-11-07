<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */

$this->title = '查看资产配置单: ' . $model->filename;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allocation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'filename',
        	[
        		'attribute' => 'oid',
        		'value' => $model->o->xingming,
        	],
            'publictime',
            'downcount',
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
    ])      	
    ?>
    <?= Html::a('下载此配置单',$model->getDownUrl())?>

</div>
