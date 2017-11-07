<?php

use yii\widgets\ListView;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AllocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="container">
	
	<div class="row">
	
		<div class="col-md-9">		

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
		文章列表
		</div>
		
	</div>
    
</div>
