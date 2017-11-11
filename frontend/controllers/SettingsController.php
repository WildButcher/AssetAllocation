<?php

namespace frontend\controllers;

use common\models\Adviser;
use common\models\Products;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\VarDumper;
use frontend\models\ResetPasswordForm;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class SettingsController extends Controller
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
    											'reset-password',
    											'request-password-reset',
    											'update',
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

    public function actionIndex()
    {
    	$userid = Yii::$app->getUser()->id;
    	$model = $this->findModel($userid);
    	return $this->render('index',['model'=>$model,]);
    }
    
    public function actionUpdate($id)
    {
    	$model = $this->findModel($id);
    	
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		$model->password = $model->password_hash;    		
    		return $this->redirect(['index', 'id' => $model->id]);
    	} else {
    		return $this->render('update', [
    				'model' => $model,
    		]);
    	}
    }

    public function actionResetPassword($id)
    {
    	$model = new ResetPasswordForm();
    	if ($model->load(Yii::$app->request->post()) && $model->resetPassword($id)) {
    		Yii::$app->session->setFlash('success', '密码已更新!');    		
    		return $this->goHome();
    	}
    	
    	return $this->render('resetPassword', [
    			'model' => $model,
    	]);
    }

    public function actionRequestPasswordReset($id)
    {
    	$model = $this->findModel($id);
    	if($model->load(Yii::$app->request->post())){
    		$model->resetPassword($id);
    		Yii::$app->session->setFlash('success', '密码已更新!');
    		return $this->goHome();    		
    	}
    	return $this->render('resetpassword', [
    			'model' => $model,
    	]);

    	
    }

    protected function findModel($id)
    {
        if (($model = Adviser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
