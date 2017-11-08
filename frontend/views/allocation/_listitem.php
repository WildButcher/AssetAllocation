<?php

use yii\helpers\Html;

?>

<div class="post">
	<div class="title">
		<h2><a href="<?= $model->url?>"><?= Html::encode($model->filename);?></a></h2>
		<div class="author">
			<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= $model->publictime?></em>
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?= Html::encode($model->o->xingming)?></em>
		</div>
	</div>
</div>