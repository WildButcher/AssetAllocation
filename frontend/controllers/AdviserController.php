<?php

namespace frontend\controllers;

use Yii;
use common\models\Adviser;
use common\models\SignupForm;
use common\models\AdviserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AdviserController implements the CRUD actions for Adviser model.
 */
class AdviserController extends Controller
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
        							],
        							'allow' => true,
        							'roles' => [
        									'@'
        							]
        					]
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
     * Lists all Adviser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdviserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adviser model.
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
     * Creates a new Adviser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	$model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) 
        {
        	if($model= $model->signup())
        	{
        		return $this->redirect(['view', 'id' => $model->id]);
        	}            
        } 
        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing Adviser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	$model->password = $model->password_hash;
        	
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Adviser model.
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
     * Finds the Adviser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Adviser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adviser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
