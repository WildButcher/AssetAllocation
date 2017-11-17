<?php

use yii\helpers\Html;

?>

<div class="post">
	<div class="title">
		<h2><a href="<?= $model->url?>"><?= Html::encode($model->getShortName());?></a></h2>
		<div class="author">
			<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em><?= $model->publictime?></em>			
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em><?= Html::encode($model->o->xingming)?></em>
			<span class="glyphicon glyphicon-star" aria-hidden="true"></span><em><?= $model->downcount ?></em>
			<em><?= Html::a('<span class="glyphicon glyphicon-download" aria-hidden="true"></span>',$model->getDownUrl());?></em>
		</div>
		<div class="content"><?= $model->getShortContent(150)?></div>
	</div>
</div>