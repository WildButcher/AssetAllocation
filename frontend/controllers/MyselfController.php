<?php

namespace frontend\controllers;

use common\models\Allocation;
use common\models\AllocationSearch;
use common\models\Syscode;
use Yii;
use yii\filters\VerbFilter;
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
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
        	$model->oid = Yii::$app->getUser()->id;
//         	VarDumper::dump(Yii::$app->request->post('arrpro'));
//         	exit(0);
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
