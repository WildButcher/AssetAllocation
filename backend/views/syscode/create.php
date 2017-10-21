<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Syscode */

$this->title = 'Create Syscode';
$this->params['breadcrumbs'][] = ['label' => 'Syscodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syscode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
