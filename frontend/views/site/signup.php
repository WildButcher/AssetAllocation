<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	
				<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
				
				<?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
				
			    <?= $form->field($model, 'xingming')->textInput(['maxlength' => true]) ?>
			
			    <?= $form->field($model, 'idnumber')->textInput(['maxlength' => true]) ?>
			
			    <?= $form->field($model, 'mobliephone')->textInput(['maxlength' => true]) ?>
			
			    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
			
			    <?= $form->field($model, 'dept')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
