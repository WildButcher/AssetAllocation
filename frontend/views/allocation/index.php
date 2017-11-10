<?php

use yii\widgets\ListView;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AllocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = '资产配置辅助平台->首页';
?>
<div class="container">
	
	<div class="row">
	
		<div class="col-md-9">		
			<ol class="breadcrumb">
				<li><a href="<?= Yii::$app->homeUrl; ?>">首页</a></li><li>资产配置单列表</li>
			</ol>
		<?= ListView::widget([
				'id'=>'allocationList',
				'dataProvider'=>$dataProvider,
				'itemView'=>'_listitem',
				'layout'=>'{items} {pager}',
				'pager'=>[
						'maxButtonCount' => 10,
						'nextPageLabel' => Yii::t('app','下一页'),
						'prevPageLabel' => Yii::t('app','上一页'),
			],
		]) 
		?>
		</div>
		
		<div class="col-md-3">
			<div class="searchbox">
				<ul class="list-group">
					<li class="list-group-item">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找
					</li>
					<li class="list-group-item">
						<form class="form-inline" action="index.php?r=allocation/index" id="w0" method="get">
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
