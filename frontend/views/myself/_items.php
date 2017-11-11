<?php 
use common\models\Products;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

$pro = Products::find()
				->join('INNER JOIN','Syscode','Syscode.id = Products.status and Syscode.majorcode=\'status\' and Syscode.minicode = 2');
$dataProvider = new ActiveDataProvider([ "query" => $pro, ]); 
?>
<script>
function insertProducts(){
	var insertObj = document.getElementById("insertPoint");
	var checkObj = document.getElementsByName("arrpro[]");
	var htmltxt = "";
	for(var i=0;i<checkObj.length;i++){
		var obj = checkObj[i]
		if(obj.checked){
				var selectedObj = obj.parentNode.parentNode.childNodes;
				htmltxt += "<tr>";
				for(var k=2;k<selectedObj.length;k++){
					htmltxt += "<td>"+selectedObj[k].innerHTML+"</td>";
					}
				htmltxt += "</tr>";				
			}
	}
	insertObj.innerHTML = htmltxt;
}
function chanleAll(){
	var obj = document.getElementsByName("arrpro[]");
	for(var i=0;i<obj.length;i++){
		obj[i].checked = false;		
	}
}
</script>
<?= GridView::widget([
		'dataProvider' => $dataProvider,
        'columns' => [
        	[
        		'class'=>'yii\grid\CheckboxColumn',
        		'name'=>'arrpro',
        	],
        	[
        		'attribute'=>'id',
        		'contentOptions'=>['width'=>'30px'],
        	],
            'pname',
            'rate',
            'buypoint',
            'term',
            'profit',
        ],
    ]); ?>
