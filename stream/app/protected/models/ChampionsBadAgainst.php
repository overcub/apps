<?php

/**
 * This is the model class for table "lol_championsBadAgainst".
 *
 * The followings are the available columns in table 'lol_championsBadAgainst':
 * @property string $id
 * @property string $id_champions
 * @property string $id_champions_badagainst
 * @property integer $points
 * @property string $excerpt
 * @property string $description
 * @property string $mixData
 * @property string $updateTime
 * @property string $createTime
 */
class ChampionsBadAgainst extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lol_championsBadAgainst';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_champions, id_champions_badagainst', 'required'),
			array('points', 'numerical', 'integerOnly'=>true),
			array('id_champions, id_champions_badagainst', 'length', 'max'=>20),
			array('excerpt, description, mixData, createTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_champions, id_champions_badagainst, points, excerpt, description, mixData, updateTime, createTime', 'safe', 'on'=>'search'),
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
			'id_champions' => 'Id Champions',
			'id_champions_badagainst' => 'Id Champions Badagainst',
			'points' => 'Points',
			'excerpt' => 'Excerpt',
			'description' => 'Description',
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
		$criteria->compare('id_champions',$this->id_champions,true);
		$criteria->compare('id_champions_badagainst',$this->id_champions_badagainst,true);
		$criteria->compare('points',$this->points);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return ChampionsBadAgainst the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function findChampionsBadAgainstByIdChampion($id_champion){
		$condition = "id_champions=". $id_champion;
		$filter = array(
				'condition' => $condition,
				'order' => "id_champions_badagainst DESC",
		);
		$dependency = new CDbCacheDependency('SELECT MAX(updateTime) FROM '.$this->tableName().' WHERE '. $condition );
		if( ( $return = $this->cache(1000, $dependency)->findAll($filter) ) ){
			return $return;
		}else{
			return false;
		}
	}
}
