<?php

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property integer $line
 * @property integer $version_db
 * @property integer $jigging
 * @property integer $copulation
 * @property integer $first_copulation
 * @property integer $fatten
 */
class Config extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('line, version_db, jigging, copulation, first_copulation, fatten', 'required'),
			array('line, version_db, jigging, copulation, first_copulation, fatten', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('line, version_db, jigging, copulation, first_copulation, fatten', 'safe', 'on'=>'search'),
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
			'line' => 'Line',
			'version_db' => 'Версия БД',
			'jigging' => 'Дней до отсадки',
			'copulation' => 'Дней до случки от окрола',
			'first_copulation' => 'Дней до первой случки',
			'fatten' => 'Дней откорма',
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
		$criteria=new CDbCriteria;

		$criteria->compare('line',$this->line);
		$criteria->compare('version_db',$this->version_db);
		$criteria->compare('jigging',$this->jigging);
		$criteria->compare('copulation',$this->copulation);
		$criteria->compare('first_copulation',$this->first_copulation);
		$criteria->compare('fatten',$this->fatten);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
