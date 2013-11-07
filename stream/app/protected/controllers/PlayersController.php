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

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('list','view','findPlayeirsNexus','register','stream','streaming'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('edit','ajaxUploadImageCover'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','admin','delete','create','update'),
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
		header('Content-Type: application/json; charset="UTF-8"');
		$keyCache = __METHOD__;
		$error = '{"success":false}';
		if( isset($_POST['Players']['name']) && isset($_POST['Players']['platform']) ){
			$keyCache .= "::" . $_POST['Players']['name'] . "::" . $_POST['Players']['platform'];
			$value=Yii::app()->cache->get($keyCache);
			$name = strtolower(str_replace(" ", "", $_POST['Players']['name']));
			if($value===false) {
				$url = "https://teemojson.p.mashape.com/player/" . $_POST['Players']['platform'] . "/" . $name . "/ingame";
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
					$arr = CJSON::decode($response);	
					$time = 30;
					if($arr['success'] == true){
						$time = (60*10);
					}
					Yii::app()->cache->set($keyCache, $response, $time);
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

	public function actionEdit()
	{
		$this->layout='//layouts/default';
		$model=$this->loadModel(Yii::app()->user->getId());
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$message = "";
		if(isset($_POST['Players']))
		{
			$model->attributes=$_POST['Players'];
			if($model->save()){
				$message = "Edição Realizada com sucesso!";
			}else{
				$message = "Ocorreu um erro";
			}
		}

		$this->render('edit',array(
				'model'=>$model,
				'message' => $message,
				'image' => $model->getImageCover()
		));
	}

	public function actionRegister()
	{
		$this->ads['superbanner'] = false;
		$this->ads['superbannerFooter'] = false;
		$this->layout='//layouts/default';
		$model=new Players;
		if(isset($_POST['Players']))
		{
			$model->attributes=$_POST['Players'];
			$model->cryptNewPassword($_POST['Players']['password']);
			$model->createTime = date('Y-m-d h:i:s');
			if($model->save()){
				$userIdentity=new UserIdentity($model->email,$model->password);
				$userIdentity->authenticateBeforeRegister($model);
				Yii::app()->user->login($userIdentity,0);
				$this->redirect('/');
			}
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}
	
	public function actionStreaming($username)
	{
		if( ($streamer = Players::model()->findByUsername($username)) ){
			$this->layout='//layouts/default';
			$this->render('streaming',array(
				'model'=>$streamer,
			));
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}
	}

	public function actionStream()
	{
		if( ($streamer = Players::model()->findByUsername('rtancman')) ){
			$this->layout='//layouts/default';
			$this->render('stream',array(
				'model'=>$streamer,
			));
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}
	}
	
	private function parseImageData($upload = false){
		return array(
				'name' => $upload['name']['file'],
				'type' => $upload['type']['file'],
				'tmp_name' => $upload['tmp_name']['file'],
				'error' => 0,
				'size' => $upload['size']['file']
		);
	}
	
	public function actionAjaxUploadImageCover()
	{
		if(isset($_FILES['Players'])){
			$img = Yii::app()->imagemod->load($this->parseImageData($_FILES['Players']));
			if($img->file_src_name_ext != 'jpg'){
				echo 'error : Formato de imagem não suportado. Somente .jpg';
				Yii::app()->end();
				exit;
			}
			$nameImg = md5(Yii::app()->user->data['email']);
			$path = "/images/uploads/players/covers";
			$publicPath =Yii::app()->getBasePath() . "/.." . $path;
			if ($img->uploaded) {
				$img->file_new_name_body = $nameImg;
				if( file_exists($publicPath.'/'.$nameImg.'.jpg') == true ){
					unlink($publicPath.'/'.$nameImg.'.jpg');
				}
				$img->process($publicPath);
				if ($img->processed) {
					$info = array();
					$file['name'] = $nameImg.'.'.$img->file_src_name_ext;
					$file['size'] = intval($img->file_src_size);
					$file['type'] = $img->file_src_mime;
					$file['thumbnail_url'] = $path.'/'.$nameImg.'.'.$img->file_src_name_ext.'?dateMod='.date('YmdHs');
					$file['url'] = $path.'/'.$nameImg.'.'.$img->file_src_name_ext.'?dateMod='.date('YmdHs');
					$info[] = $file;
					$json = json_encode($info);
					header('Content-type: application/json');
					echo $json;
					$img->clean();
				} else {
					echo 'error : ' . $img->error;
				}
				Yii::app()->end();
				exit;
			}
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}
	}
	
	/**************************************************************************************
	* Admin actions
	* 
	* */
	
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
		$model=Players::model()->findById($id);
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
