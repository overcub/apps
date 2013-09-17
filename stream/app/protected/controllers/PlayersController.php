<?php

class PlayersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','findPlayeirsNexus'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function checkResponse($responseCode,$response)
	{
		if ($responseCode == 401){
			return false;
		}elseif ($responseCode == 500 || $responseCode == 503){
			return false;
		}elseif ($responseCode != 200){
			return false;
		}elseif (!$response){
			return false;
		}else{
			return true;
		}
	}

	public function actionFindPlayeirsNexus()
	{
		$keyCache = __METHOD__;
		$error = '{ "Error" : true}';
		if( isset($_POST['Players']['name']) && isset($_POST['Players']['platform']) ){
			$keyCache .= "::" . $_POST['Players']['name'] . "::" . $_POST['Players']['platform'];
			$value=Yii::app()->cache->get($keyCache);
			if($value===false) {
				$url = "https://teemojson.p.mashape.com/player/" . $_POST['Players']['platform'] . "/" . $_POST['Players']['name'] . "/ingame";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Mashape-Authorization: '.Yii::app()->params->mashapeKey['LOL']));
				curl_setopt($ch, CURLOPT_TIMEOUT, 30);
				$response = curl_exec($ch);
				$responseCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
				curl_close ($ch);
				if( $this->checkResponse( $responseCode, $response) ){
					Yii::app()->cache->set($keyCache, $response, (60*10));
					echo $response;
				}else{
					echo $error;
				}
			}else{
				echo $value;
			}
		}else{
			echo $error;
		}
		Yii::app()->end();
		exit;
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Players;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Players']))
		{
			$model->attributes=$_POST['Players'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Players']))
		{
			$model->attributes=$_POST['Players'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Players');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Players('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Players']))
			$model->attributes=$_GET['Players'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Players::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='players-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
