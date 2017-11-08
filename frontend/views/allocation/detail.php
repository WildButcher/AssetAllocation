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
        		'contentOptions'=>['width'=>'85%'],
        	],
            'publictime',
            'downcount',
        	[
        		'attribute' => 'filecontent',
        		'value' => $model->filecontent,
        		'format' => 'html',
        	],
        ],
    ])      	
    ?>
    <?= Html::a('下载此配置单',$model->getDownUrl())?>

</div>
