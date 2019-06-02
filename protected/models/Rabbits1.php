<?php

/**
 * This is the model class for table "rabbits".
 *
 * The followings are the available columns in table 'rabbits':
 * @property integer $idr
 * @property string $name
 * @property string $date_r
 * @property string $date_arh
 * @property integer $sex
 * @property integer $ida
 * @property integer $idr_m
 * @property integer $idr_f
 * @property integer $idce
 * @property integer $idp
 * @property integer $ids
 */
class Rabbits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rabbits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idr, name, date_r, sex, idce, idp, ids', 'required'),
			array('idr, sex, ida, idr_m, idr_f, idce, idp, ids', 'numerical', 'integerOnly'=>true),
			array('date_arh', 'safe'),
			// The following rule is used by search().
			array('idr, name, date_r, date_arh, sex, ida, idr_m, idr_f, idce, idp, ids', 'safe', 'on'=>'search'),
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
			'idr' => 'Idr',
			'name' => 'Кличка',
			'date_r' => 'Дата рождения',
			'date_arh' => 'Дата в архив',
			'sex' => 'Пол',
			'ida' => 'Ida',
			'idr_m' => 'Idr M',
			'idr_f' => 'Idr F',
			'idce' => 'Idce',
			'idp' => 'Idp',
			'ids' => 'Ids',
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

		$criteria->compare('idr',$this->idr);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date_r',$this->date_r,true);
		$criteria->compare('date_arh',$this->date_arh,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('ida',$this->ida);
		$criteria->compare('idr_m',$this->idr_m);
		$criteria->compare('idr_f',$this->idr_f);
		$criteria->compare('idce',$this->idce);
		$criteria->compare('idp',$this->idp);
		$criteria->compare('ids',$this->ids);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rabbits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{

		if (parent::beforeSave()) {
			$dn = explode ( '.', $this->date_r );

			if ( count($dn) == 3 ) {
				list ( $d, $m, $y  ) = $dn;
				$this->date_r = date('Y-m-d', mktime ( 0, 0, 0, $m, $d, $y ));
			}

			$dn = explode ( '.', $this->date_arh );

			if ( count($dn) == 3 ) {
				list ( $d, $m, $y  ) = $dn;
				$this->date_arh = date('Y-m-d', mktime ( 0, 0, 0, $m, $d, $y ));
			}

			return true;
		} else {
			return false;
		}
	}

	protected function afterFind() {
		$date = date('d.m.Y', strtotime($this->date_r));
		$this->date_r = $date;
		$date = date('d.m.Y', strtotime($this->date_arh));
		$this->date_arh = $date;
		parent::afterFind();
	}

}
