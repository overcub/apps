<?php

/**
 * This is the model class for table "st_streamers".
 *
 * The followings are the available columns in table 'st_streamers':
 * @property string $id
 * @property string $id_stream
 * @property string $id_players
 * @property string $mainStream
 * @property string $nickname
 * @property string $updateTime
 * @property string $createTime
 *
 * The followings are the available model relations:
 * @property Players $idPlayers
 * @property Stream $idStream
 */
class Streamers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'st_streamers';
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
			array('id_stream, id_players', 'length', 'max'=>20),
			array('mainStream', 'length', 'max'=>1),
			array('nickname', 'length', 'max'=>200),
			array('createTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_stream, id_players, mainStream, nickname, updateTime, createTime', 'safe', 'on'=>'search'),
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
			'idPlayers' => array(self::BELONGS_TO, 'Players', 'id_players'),
			'idStream' => array(self::BELONGS_TO, 'Stream', 'id_stream'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_stream' => 'Id Stream',
			'id_players' => 'Id Players',
			'mainStream' => 'Main Stream',
			'nickname' => 'Nickname',
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
		$criteria->compare('id_stream',$this->id_stream,true);
		$criteria->compare('id_players',$this->id_players,true);
		$criteria->compare('mainStream',$this->mainStream,true);
		$criteria->compare('nickname',$this->nickname,true);
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
	 * @return Streamers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function findByNickname($nickname){
		$dependency = new CDbCacheDependency("SELECT MAX(updateTime) FROM ".$this->tableName()." WHERE nickname = '". $nickname ."'" );
		if( ( $return = $this->cache(1000, $dependency)->find("nickname = '$nickname'") ) ){
			return $return;
		}else{
			return false;
		}
	}	
}
