<?php

/**
 * This is the model class for table "lol_player".
 *
 * The followings are the available columns in table 'lol_player':
 * @property string $id
 * @property string $id_players
 * @property string $accountId
 * @property string $summonerId
 * @property string $server
 * @property string $name
 * @property string $internalName
 * @property string $icon
 * @property string $level
 * @property string $mixData
 * @property string $updateTime
 * @property string $createTime
 */
class LolPlayer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lol_player';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('updateTime', 'required'),
			array('id_players, accountId, summonerId, level', 'length', 'max'=>20),
			array('server', 'length', 'max'=>10),
			array('name, internalName, icon', 'length', 'max'=>255),
			array('mixData, createTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_players, accountId, summonerId, server, name, internalName, icon, level, mixData, updateTime, createTime', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_players' => 'Id Players',
			'accountId' => 'Account',
			'summonerId' => 'Summoner',
			'server' => 'Server',
			'name' => 'Name',
			'internalName' => 'Internal Name',
			'icon' => 'Icon',
			'level' => 'Level',
			'mixData' => 'Mix Data',
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
		$criteria->compare('id_players',$this->id_players,true);
		$criteria->compare('accountId',$this->accountId,true);
		$criteria->compare('summonerId',$this->summonerId,true);
		$criteria->compare('server',$this->server,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('internalName',$this->internalName,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('mixData',$this->mixData,true);
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
	 * @return LolPlayer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findByIdPlayer($id_players)
	{
		$dependency = new CDbCacheDependency("SELECT MAX(updateTime) FROM ".$this->tableName()." WHERE id_players = '".$id_players."'" );
		if( ( $return = $this->cache(1000, $dependency)->find("id_players = '$id_players'") ) ){
			return $return;
		}else{
			return false;
		}
	}

	public function findByNameAndServer($name, $server)
	{
		$dependency = new CDbCacheDependency("SELECT MAX(updateTime) FROM ".$this->tableName()." WHERE name = '".$name."' AND server = '".$server."'" );
		if( ( $return = $this->cache(1000, $dependency)->find("name = '$name' AND server = '$server'") ) ){
			return $return;
		}else{
			return false;
		}
	}	
}
