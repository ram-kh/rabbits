<?php

/**
 * This is the model class for table "okroly".
 *
 * The followings are the available columns in table 'okroly':
 * @property integer $ido
 * @property integer $idco
 * @property integer $idr_m
 * @property integer $idr_f
 * @property string $date
 * @property string $jigging
 * @property integer $born
 * @property integer $died
 * @property integer $reared
 * @property string $note
 */
class Okroly extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'okroly';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idco, idr_m, idr_f, date, jigging, born', 'required'),
			array('idco, idr_m, idr_f, born, died, reared', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('ido, idco, idr_m, idr_f, date, jigging, born, died, reared', 'safe', 'on'=>'search'),
			array('note', 'safe'),
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
			'ido' => 'Ido',
			'idco' => 'Idco',
			'idr_m' => 'Кличка матери',
			'idr_f' => 'Кличка отца',
			'date' => 'Дата окрола',
			'jigging' => 'Дата отсадки',
			'born' => 'Рождено',
			'died' => 'Умерло',
			'reared' => 'Отсажено',
			'note' => 'Примечание',
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

		$criteria->compare('ido',$this->ido);
		$criteria->compare('idco',$this->idco);
		$criteria->compare('idr_m',$this->idr_m);
		$criteria->compare('idr_f',$this->idr_f);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('jigging',$this->jigging,true);
		$criteria->compare('born',$this->born);
		$criteria->compare('died',$this->died);
		$criteria->compare('reared',$this->reared);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Okroly the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{

		if (parent::beforeSave()) {
			$dn = explode ( '.', $this->date );
			if ( count($dn) == 3 ) {
				list ( $d, $m, $y  ) = $dn;
				$this->date = date('Y-m-d', mktime ( 0, 0, 0, $m, $d, $y ));
			}
			$dn = explode ( '.', $this->jigging );
			if ( count($dn) == 3 ) {
				list ( $d, $m, $y  ) = $dn;
				$this->jigging = date('Y-m-d', mktime ( 0, 0, 0, $m, $d, $y ));
			}

			return true;

		} else {

			return false;

		}
	}

	protected function afterFind() {
		$date = date('d.m.Y', strtotime($this->date));
		$this->date = $date;
		$date = date('d.m.Y', strtotime($this->jigging));
		$this->jigging = $date;

		parent::afterFind();
	}


}
