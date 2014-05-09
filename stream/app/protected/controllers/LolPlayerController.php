<?php

class LolPlayerController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','findSummonerBasic','updateSummonerBasic'),
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
		$model=new LolPlayer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LolPlayer']))
		{
			$model->attributes=$_POST['LolPlayer'];
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

		if(isset($_POST['LolPlayer']))
		{
			$model->attributes=$_POST['LolPlayer'];
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
		$dataProvider=new CActiveDataProvider('LolPlayer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LolPlayer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LolPlayer']))
			$model->attributes=$_GET['LolPlayer'];

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
		$model=LolPlayer::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='lol-player-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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

	private function restAPIByCurl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Mashape-Authorization: '.Yii::app()->params->mashapeKey['LOL']));
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$response = curl_exec($ch);
		$responseCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close ($ch);
		if( $this->checkResponse( $responseCode, $response) ){
			return $response;
		}else{
			return false;
		}
	}

	private function findSummonerHonorByRestAPI($name,$server)
	{
		$keyCache = __METHOD__;
		$keyCache .= "::" . $name . "::" . $server;
		$value =Yii::app()->cache->get($keyCache);
		$return = false;
		if($value===false) {
			$url = "https://teemojson.p.mashape.com/player/" . $server . "/" . $name . "/honor";
			if( ( $return = $this->restAPIByCurl($url) ) ){
				$arr = CJSON::decode($return);	
				$time = 30;
				if($arr['success'] == true){
					$time = (60*10);
					$return = array('player' => $arr['player'], 'data' => $arr['data'], 'mixData' => $return);
				}
				Yii::app()->cache->set($keyCache, $return, $time);
			}else{
				$return = false;
			}
		}else{
			$return = $value;
		}
		return $return;
	}
	
	private function findSummonerBasicByRestAPI($name,$server)
	{
		$keyCache = __METHOD__;
		$keyCache .= "::" . $name . "::" . $server;
		$value =Yii::app()->cache->get($keyCache);
		$return = false;
		if($value===false) {
			$url = "https://teemojson.p.mashape.com/player/" . $server . "/" . $name;
			if( ( $return = $this->restAPIByCurl($url) ) ){
				$arr = CJSON::decode($response);
				$time = 30;
				if($arr['success'] == true){
					$time = (60*10);
					$return = array('data' => $arr['data'], 'mixData' => $response);
				}
				Yii::app()->cache->set($keyCache, $return, $time);
			}
		}else{
			$return = $value;
		}
		return $return;
	}

	private function processBeforeFindSummonerHonorByRestAPI($data,$server){
		return array(
			'id_players' => Yii::app()->user->getId(),
			'accountId' => $data['player']['accountId'],
			'summonerId' => $data['player']['summonerId'],
			'server' => $server,
			'name' => $data['player']['name'],
			'internalName' => $data['player']['internalName'],
			'icon' => $data['player']['icon'],
			'level' => $data['player']['level'],
			'mixData' => $data['mixData'],
			'honorData' => CJSON::encode(array(
				'data' => array(
					'colaborator' => $data['data']['totals'][1],
					'friendly' => $data['data']['totals'][2],
					'job' => $data['data']['totals'][3],
					'enimy' => $data['data']['totals'][4],
					'nothing' => $data['data']['totals'][0],
					)
			)),
		);
	}

	public function processNameRestAPI($name){
		return strtolower(str_replace(" ", "", $name));
	}

	public function saveSummoner($data){
		$lolPlayer = new LolPlayer;
		$lolPlayer->attributes = $data;
		$lolPlayer->save();
	}

	public function actionFindSummonerBasic()
	{
		header('Content-Type: application/json; charset="UTF-8"');
		$error = '{"success":false}';
		if( isset($_POST['LolPlayer']['name']) && isset($_POST['LolPlayer']['server']) ){
			$name = $this->processNameRestAPI($_POST['LolPlayer']['name']);
			$server = $_POST['LolPlayer']['server'];
			if( ( $return = LolPlayer::model()->findByIdPlayer( Yii::app()->user->getId() ) ) ){
				echo $return->mixData;
			}elseif( ($return = $this->findSummonerHonorByRestAPI($name,$server) ) ){
				$return = $this->processBeforeFindSummonerHonorByRestAPI($return,$server);
				$return['createTime'] = date('Y-m-d H:i:s');
				$return['updateTime'] = date('Y-m-d H:i:s');
				$this->saveSummoner($return);
				Yii::app()->user->setFlash('success', "Invocador ".$return['name']." de lvl ".$return['level']." Criado com sucesso!");
				echo $return['mixData'];
			}else{
				echo $error;
			}
		}else{
			echo $error;
		}
		Yii::app()->end();
	}

	public function actionUpdateSummonerBasic()
	{
		header('Content-Type: application/json; charset="UTF-8"');
		$error = '{"success":false}';
		if( isset($_POST['LolPlayer']['name']) && isset($_POST['LolPlayer']['server']) ){
			$name = $this->processNameRestAPI($_POST['LolPlayer']['name']);
			$server = $_POST['LolPlayer']['server'];
			if( ( $lolPlayer = LolPlayer::model()->findByIdPlayer( Yii::app()->user->getId() ) ) ){
				if( ($return = $this->findSummonerHonorByRestAPI($name,$server) ) ){
					$return = $this->processBeforeFindSummonerHonorByRestAPI($return,$server);
					$lolPlayer->attributes = $return;
					$lolPlayer->updateTime = NULL;
					$lolPlayer->save();
					Yii::app()->user->setFlash('success', "Invocador ".$return['name']." de lvl ".$return['level']." alterado com sucesso!");
					echo $return['mixData'];
				}else{
					echo $error;
				}
			}else{
				echo $error;
			}
		}else{
			echo $error;
		}
		Yii::app()->end();
	}
}
