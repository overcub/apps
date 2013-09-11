<?php

/**
 * This is the model class for table "lol_champions".
 *
 * The followings are the available columns in table 'lol_champions':
 * @property string $id
 * @property string $name
 * @property integer $code
 * @property string $excerpt
 * @property string $description
 * @property string $skills
 * @property string $abilities
 * @property string $skins
 * @property string $mixData
 * @property string $updateTime
 * @property string $createTime
 */
class Champions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lol_champions';
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
			array('code', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('excerpt, description, skills, abilities, skins, mixData, createTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, code, excerpt, description, skills, abilities, skins, mixData, updateTime, createTime', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'code' => 'Code',
			'excerpt' => 'Excerpt',
			'description' => 'Description',
			'skills' => 'Skills',
			'abilities' => 'Abilities',
			'skins' => 'Skins',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('skills',$this->skills,true);
		$criteria->compare('abilities',$this->abilities,true);
		$criteria->compare('skins',$this->skins,true);
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
	 * @return Champions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
