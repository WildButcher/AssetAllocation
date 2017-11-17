<?php 
namespace frontend\componens;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Allocation;

class RankingListWidget extends Widget
{
	public $top10;
	public $res;
	
	public function init(){
		parent::init();
		$this->top10 = new Allocation();
		$this->top10 = Allocation::find()->orderBy(['downcount'=>SORT_DESC,])->limit(15)->all();
		foreach($this->top10 as $one){
			$this->res = $this->res.'<li class="list-group-item">'.Html::a($one->getShortName(10),$one->getUrl()).'&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'.$one->downcount.'</li>';
		}
	}
	
	public function run(){
		return $this->res;
	}
}
?>