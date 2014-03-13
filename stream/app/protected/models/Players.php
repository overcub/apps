<?php

/**
 * This is the model class for table "st_players".
 *
 * The followings are the available columns in table 'st_players':
 * @property string $id
 * @property string $id_user
 * @property string $email
 * @property string $password
 * @property string $username
 * @property string $name
 * @property string $group
 * @property string $gender
 * @property string $birthdate
 * @property string $extra
 * @property string $updateTime
 * @property string $createTime
 *
 * The followings are the available model relations:
 * @property Streamers[] $streamers
 */
class Players extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'st_players';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, username', 'required'),
			array('id_user', 'length', 'max'=>20),
			array('email', 'length', 'max'=>400),
			array('password', 'length', 'max'=>500),
			array('username', 'length', 'max'=>100),
			array('name', 'length', 'max'=>255),
			array('group', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>1),
			array('birthdate', 'type', 'type' => 'date', 'message' => '{attribute} incorreta.', 'dateFormat' => 'yyyy-MM-dd'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, email, password, username, name, group, gender, birthdate, extra, updateTime, createTime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'streamers' => array(self::HAS_MANY, 'Streamers', 'id_players'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'email' => 'Email',
			'password' => 'Senha',
			'username' => 'Username',
			'name' => 'Nome',
			'group' => 'Group',
			'gender' => 'Sexo',
			'birthdate' => 'Data de nascimento',
			'extra' => 'Extra',
			'updateTime' => 'Update Time',
			'createTime' => 'Create Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('extra',$this->extra,true);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('createTime',$this->createTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Players the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave() 
	{
		//if (!empty($this->password))
			//$this->password=crypt($this->password,Yii::app()->params->salt);
		$this->updateTime = null;
		if (!empty($_POST['extra']))
			$this->extra=CJSON::encode($_POST['extra']);
		
		if (isset($_POST['Players']['newPassword']))
			$this->cryptNewPassword($_POST['Players']['newPassword']);
		
		if (!empty($this->username))
			$this->username=trim($this->username);
		
		if (!empty($this->email))
			$this->email=trim($this->email);
		
		return true;
	}

	public function cryptNewPassword( $newPassword )
	{
		if( !empty($newPassword) ){
			$this->password=crypt($newPassword,Yii::app()->params->salt);
		}
	}

	public function firstName() 
	{
		if ($this->name){
			return array_shift(explode(' ',$this->name));
		}else{
			return "";
		}
			$this->password=crypt($this->password,Yii::app()->params->salt);
		return true;
	}

	public function getExtraData($data) 
	{
		if (!empty($this->extra)){
			$arrExtra = CJSON::decode($this->extra);
			return (isset($arrExtra[$data])?$arrExtra[$data]:"");
		}else{
			return "";
		}
	}
	
	public function getImageCover()
	{
		$nameImg = md5($this->email);
		$path = "/images/uploads/players/covers";
		$publicPath =Yii::app()->getBasePath() . "/.." . $path;
		if( file_exists($publicPath.'/'.$nameImg.'.jpg') == true ){
			return $path.'/'.$nameImg.'.jpg';
		}else{
			return "/images/style/default/slide-lol-01.jpg";
		}
	}
	
	public function getImageProfile($size = 160)
	{
		return "http://www.gravatar.com/avatar/".md5($this->email)."?s=$size";
	}

	public function listGame()
	{	
		$arr = array();
		if($games = $this->getExtraData('games')){
			foreach (explode(',', $games) as $key){
				if( is_array($arrGame = $this->getGame($key)) ){
					array_push($arr, $arrGame);
				}
			}
		}
		return $arr;
	}

	public function getGame($id_game)
	{
		$return = false;
		$arrayName = array(
			array('id'=>1,'code'=>'lol','name'=>'League of Legends'),
			array('id'=>2,'code'=>'dota2','name'=>'Dota 2'),
			array('id'=>3,'code'=>'calloffduty','name'=>'Call of Duty: Ghosts'),
			array('id'=>4,'code'=>'wow','name'=>'World of Warcraft: Mists of Pandaria'),
			array('id'=>5,'code'=>'hearthstone','name'=>'Hearthstone: Heroes of Warcraft'),
			array('id'=>6,'code'=>'starCraft','name'=>'StarCraft II: Heart of the Swarm'),
			array('id'=>7,'code'=>'xcom','name'=>'XCOM: Enemy Within'),
			array('id'=>8,'code'=>'minecraft','name'=>'Minecraft'),
			array('id'=>9,'code'=>'battlefield','name'=>'Battlefield'),
			array('id'=>10,'code'=>'zelda','name'=>'The Legend of Zelda'),
			array('id'=>11,'code'=>'cs','name'=>'Counter-Strike'),
			array('id'=>12,'code'=>'pathofexile','name'=>'Path of Exile'),
			array('id'=>13,'code'=>'smite','name'=>'Smite'),
			array('id'=>14,'code'=>'magic','name'=>'Magic: The Gathering')
		);
		foreach($arrayName as $key){
			if($key['id'] == $id_game){
				$return = $key;
			}
		}
		return $return;
	}
	
	public function findByEmail($email)
	{
		$dependency = new CDbCacheDependency("SELECT MAX(updateTime) FROM ".$this->tableName()." WHERE email = '".$email."'" );
		if( ( $return = $this->cache(1000, $dependency)->find("email = '$email'") ) ){
			return $return;
		}else{
			return false;
		}
	}

	public function findByUsername($username)
	{
		$dependency = new CDbCacheDependency("SELECT MAX(updateTime) FROM ".$this->tableName()." WHERE username = '".$username."'" );
		if( ( $return = $this->cache(1000, $dependency)->find("username = '$username'") ) ){
			return $return;
		}else{
			return false;
		}
	}
	
	public function findById($id)
	{
		$dependency = new CDbCacheDependency("SELECT MAX(updateTime) FROM ".$this->tableName()." WHERE id = '".$id."'" );
		if( ( $return = $this->cache(1000, $dependency)->find("id = '$id'") ) ){
			return $return;
		}else{
			return false;
		}
	}	
}
