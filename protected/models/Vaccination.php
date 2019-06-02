<?php

/**
 * This is the model class for table "vaccination".
 *
 * The followings are the available columns in table 'vaccination':
 * @property integer $idv
 * @property integer $idva
 * @property integer $idr
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Vaccine $vaccine
 * @property Rabbits $rabbit
 */
class Vaccination extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vaccination';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idva, idr, date', 'required'),
			array('idva, idr', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('idva, idr, date', 'safe', 'on'=>'search'),
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
            'vaccine'=>array(self::HAS_ONE, 'Vaccine', 'idva'),
            'rabbit'=>array(self::HAS_ONE, 'Rabbits', 'idr'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idva' => 'Вакцина',
			'idr' => 'Кличка кролика',
			'date' => 'Дата вакцинации',
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

		$criteria->compare('idv',$this->idv);
		$criteria->compare('idva',$this->idva);
		$criteria->compare('idr',$this->idr);
		$criteria->compare('date',$this->date,true);
		$criteria->order='date DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'date DESC',
			),
			'Pagination' => array(
				'PageSize'=>20,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vaccination the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function afterFind() {
		$date = date('d.m.Y', strtotime($this->date));
		$this->date = $date;

		parent::afterFind();
	}

	public function beforeSave()
	{

		if (parent::beforeSave()) {
			$dn = explode('.', $this->date);

			if (count($dn) == 3) {
				list ($d, $m, $y) = $dn;
				$this->date = date('Y-m-d', mktime(0, 0, 0, $m, $d, $y));
			}

			return true;
		}
	}
}
