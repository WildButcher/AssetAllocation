<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Altemplate */

$this->title = 'Create Altemplate';
$this->params['breadcrumbs'][] = ['label' => 'Altemplates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="altemplate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
