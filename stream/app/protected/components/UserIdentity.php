<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	private $_id;
	private $_group;
	public function authenticate()
	{
		$record=Players::model()->findByEmail($this->username);
		if($record===false){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if(!isset(Yii::app()->params->salt)){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if(!isset($this->password) || !isset($record->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else if($record->password!==crypt($this->password,Yii::app()->params->salt)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id=$record->id;
			$this->username = $record->username;
			$this->_group = $record->group;
			$this->setState('img', "http://en.gravatar.com/avatar/".md5($record->email)."?d=mm");
			$this->setState('data', $record->attributes);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function authenticateBeforeRegister($player)
	{
		$this->_id=$player->id;
		$this->username = $player->username;
		$this->_group = $player->group;
		$this->setState('img', "http://en.gravatar.com/avatar/".md5($player->email)."?d=mm");
		$this->setState('data', $player->attributes);
	}
	
	public function getId()
	{
		return $this->_id;
	}
		
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	/*public function authenticate()
	{
		$users=array(
			// username => password
			//'demo'=>'demo',
			'geek'=>'geekabc33163356',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/
}