<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Adviser */

$this->title = 'Create Adviser';
$this->params['breadcrumbs'][] = ['label' => 'Advisers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adviser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
