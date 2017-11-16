<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Allocation */
?>
<div class="allocation-view">

    <div class="row">
    
    	<div class="col-md-9">
			<ol class="breadcrumb">
				<li><a href="<?= Yii::$app->homeUrl; ?>">首页</a></li><li><?= Html::encode($model->filename)?></li>
			</ol>    	
    		<div class="detailbox">
    			<ul class="list-group">
    				<li class="list-group-item">
    					<h1><?= Html::encode($model->filename)?></h1>
    					<div class="author">
							<span class="glyphicon glyphicon-time" aria-hidden="true">发布时间：</span><em><?= $model->publictime?>&nbsp;&nbsp;&nbsp;&nbsp;</em>			
							<span class="glyphicon glyphicon-user" aria-hidden="true">投顾：</span><em><?= Html::encode($model->o->xingming)?>&nbsp;&nbsp;&nbsp;&nbsp;</em>
							<span class="glyphicon glyphicon-star" aria-hidden="true">下载次数：</span><em><?= $model->downcount ?>&nbsp;&nbsp;&nbsp;&nbsp;</em>
							<em><?= Html::a('<span class="glyphicon glyphicon-download" aria-hidden="true">点此下载</span>',$model->getDownUrl());?></em>
						</div>
    					<?= $model->filecontent;?>
    				</li>
    			</ul>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="searchbox">
				<ul class="list-group">
					<li class="list-group-item">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找
					</li>
					<li class="list-group-item">
						<form class="form-inline" action="<?= Url::to(['allocation/index',])?>" id="w0" method="get">
						  <div class="form-group">						    
						    <input type="text" class="form-control" name="AllocationSearch[filename]" id="w0input" placeholder="按标题">
						  </div>
						  <button type="submit" class="btn btn-primary btn-sm">搜索</button>
						</form>
					</li>
				</ul>
			</div>
			<div class="searchbox">
				<ul class="list-group">
					<li class="list-group-item">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>最受欢迎
					</li>
					<li class="list-group-item">下载排行榜</li>
				</ul>
			</div>
    	</div>
    	
    </div>

</div>
