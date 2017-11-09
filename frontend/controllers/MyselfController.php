<?php

namespace frontend\controllers;

use common\models\Allocation;
use common\models\AllocationSearch;
use common\models\Altemplate;
use common\models\Products;
use common\models\Syscode;
use TCPDF;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AllocationController implements the CRUD actions for Allocation model.
 */
class MyselfController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
    	return [
    		'access'=>[
    				'class' => AccessControl::className (),
    				'rules' => [
    								[
    								'actions' => [
		    										'index',
    												'view',
		    										'create',
		    										'update',
		    										'delete',
		    										'privilege',
    												'download',
    											 ],
    								'allow' => true,
    								'roles' => ['@'],    								
    						],    						
    				]
    		],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * download pdf files
     * @param string $id
     * @return download url
     */
    public function actionDownload($id)
    {
    	$model = $this->findModel($id);
    	$model->downcount = $model->downcount + 1;
    	$storagePath = dirname(dirname(__DIR__)).'/downloadfiles';
    	$filename = $model->filelinks;
    	if(!$filename)
    	{
    		return $this->redirect(['/allocation/index']);
    	}
    	if($model->save())
    	{
    		return Yii::$app->response->sendFile("$storagePath/$filename");
    	}
    	return $this->redirect(['index']);
    }

    /**
     * Lists all Allocation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AllocationSearch();        
        $dataProvider = $searchModel->searchmyself(Yii::$app->request->queryParams);
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Allocation model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Allocation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Allocation();

        if ($model->load(Yii::$app->request->post())) {
        	$syscode = Syscode::find()->where(['majorcode'=>'status','minicode'=>'1'])->one();
        	$model->status = $syscode->id;
        	$model->oid = Yii::$app->getUser()->id;
        	//以下为读取模板内容填充文件内容
        	$tempmodel = Altemplate::find()->where(['id'=>$model->lid])->one();
        	$altemplate= $tempmodel->filecontent;
        	
        	
        	//以下为读取理财产品，替换模板文件中的内容        	
        	$arrpro = Yii::$app->request->post('arrpro');
        	$products = Products::find()->where(['id'=>$arrpro])->all();
        	$procontent = '<table class=table table-striped><thead><tr><th>理财产品名称</th><th>年利率</th><th>起购点</th></tr></thead><tbody>';
        	foreach ($products as $p)
        	{
        		$procontent = $procontent.'<tr>'.
        								  '<td>'.$p->pname.'</td>'.
        								  '<td>'.$p->rate.'</td>'.
        								  '<td>'.$p->buypoint.'</td>'.
										  '</tr>';
        	};
        	$procontent = $procontent.'</tbody></table>';
        	$altemplate = str_ireplace('#ppp#',$procontent,$altemplate);
        	
        	$model->filecontent = $altemplate;
        	$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionPrivilege($id)
    {
    	$model = $this->findModel($id);
    	$syscode = Syscode::find()->where(['majorcode'=>'status','minicode'=>'2'])->one();
    	if($model->status <> $syscode->id)
    	{	    	
	    	$model->status = $syscode->id;
	    	$model->publictime = date('Y-m-d H:i:s',time() + 8 * 3600);
	    	
	    	//以下开始保存内容到文件，并生成连接，保存到数据库。
	    	$dir = date('Ymd',time() + 8 * 3600);
	    	$filename = time().'.pdf';
	    	$storagePath= dirname(dirname(__DIR__)).'/downloadfiles/'.$dir;
	    	//判断是否有现成的目录，没有则创建
	    	if(!is_dir($storagePath))
	    	{
	    		mkdir($storagePath);
	    	}
			//保存文件地址到数据库
	    	$model->filelinks = $dir.'/'.$filename;
	    	//实例化pdf类
	    	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false); 
	    	// 设置默认等宽字体
	    	$pdf->SetDefaultMonospacedFont('courier'); 
	    	// 设置间距
	    	$pdf->SetMargins(15, 27, 15);
	    	$pdf->SetHeaderMargin(5);
	    	$pdf->SetFooterMargin(10);	    	
	    	// 设置分页
	    	$pdf->SetAutoPageBreak(TRUE, 25);	    	
	    	// set image scale factor
	    	$pdf->setImageScale(1.25);	    	
	    	// set default font subsetting mode
	    	$pdf->setFontSubsetting(true);
	    	//设置字体
	    	$pdf->SetFont('stsongstdlight', '', 14);
	    	$pdf->AddPage(); 
	    	//输出文件内容
	    	$pdf->writeHTML($model->filecontent, true, 0, true, true);
	    	$pdf->lastPage(); 
	    	//输出PDF
	    	$pdf->Output($storagePath.'/'.$filename, 'f');
	    	
	    	
	    	if($model->save())
	    	{	    		
	    		return $this->redirect(['index']);
	    	}
    	}
    	return $this->redirect(['index']);
    }

    /**
     * Updates an existing Allocation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Allocation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Allocation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Allocation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Allocation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
