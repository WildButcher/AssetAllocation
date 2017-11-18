<?php

namespace frontend\controllers;

use common\models\Altemplate;
use common\models\AltemplateSearch;
use common\models\Syscode;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\VarDumper;

/**
 * AltemplateController implements the CRUD actions for Altemplate model.
 */
class AltemplateController extends Controller
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
    											'ueditor',
    											'privilege',
    									],
    									'allow' => true,
    									'roles' => [
    											'@'
    									]
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
    
    public function actions(){
    	return [
    			'ueditor'=>[
    					'class' => 'common\widgets\ueditor\UeditorAction',
    					'config'=>[
    							//上传图片配置
    							'imageUrlPrefix' => "", /* 图片访问路径前缀 */
    							'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
    					]
    			]
    	];
    }
    
    /**
     * Lists all Altemplate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AltemplateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPrivilege($id)
    {
    	$model = $this->findModel($id);
    	$syscode = Syscode::find()->where(['majorcode'=>'status','minicode'=>'2'])->one();
    	if($model->status <> $syscode->id)
    	{
    		$model->status = $syscode->id;
    		if($model->save())
    		{
    			return $this->redirect(['index']);
    		}
    	}
    	return $this->redirect(['index']);
    }
    
    /**
     * Displays a single Altemplate model.
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
     * Creates a new Altemplate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Altemplate();

        if ($model->load(Yii::$app->request->post())) {
        	$syscode = Syscode::find()->where(['majorcode'=>'status','minicode'=>'1'])->one();
        	$model->status = $syscode->id;
        	$model->oid = Yii::$app->getUser()->id;
        	$model->save();
        	return $this->redirect(['view', 'id' => $model->id]);
        } else {
        	return $this->render('create', [
        			'model' => $model,
        	]);
        }
    }

    /**
     * Updates an existing Altemplate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->oid != Yii::$app->getUser()->id){
        	return $this->render('../site/error',['message'=>'不能修改不属于您的模板！','name'=>'出错啦！']);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Altemplate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$model = $this->findModel($id);
    	if ($model->oid != Yii::$app->getUser()->id){
    		return $this->render('..\site\error',['message'=>'不能删除不属于您的模板！','name'=>'出错啦！']);
    	}
    	$syscode = Syscode::find()->where(['majorcode'=>'status','minicode'=>'2'])->one();
    	if($model->status == $syscode->id){
    		Yii::$app->session->setFlash('error', '不能删除已经发布的数据!');
    		return $this->redirect(['index']);
    	}
    	$model->delete();
    	return $this->redirect(['index']);
    }

    /**
     * Finds the Altemplate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Altemplate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Altemplate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
