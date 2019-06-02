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
 * @property integer $vozrast
 *
 * The followings are the available model relations:
 * @property Poroda $poroda
 * @property Archive $arch
 * @property Cells $cell
 * @property Status $status
 *
 */
class Rabbits extends CActiveRecord
{

	public $vozrast;
    public $pol;

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
			array('name, date_r, sex, idce, idp, ids', 'required'),
			array('sex, ida, idr_m, idr_f, idce, idp, ids', 'numerical', 'integerOnly'=>true),
			array('date_arh, vozrast', 'safe'),
			// The following rule is used by search().
			array('idr, name, date_r, date_arh, sex, ida, idr_m, idr_f, idce, idp, ids, vozrast', 'safe', 'on'=>'search'),
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
			'poroda' => array(self::BELONGS_TO,'Poroda','idp'),
			'arch' => array(self::BELONGS_TO,'Archive','ida'),
			'cell' => array(self::BELONGS_TO,'Cells','idce'),
			'status' => array(self::BELONGS_TO,'Status','ids'),
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
			'ida' => 'Причина в архив',
			'idr_m' => 'Кличка матери',
			'idr_f' => 'Кличка отца',
			'idce' => 'Номер клетки',
			'idp' => 'Порода',
			'ids' => 'Статус кролика',
			'vozrast'=>'Возраст',
            'pol'=>'Пол',
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
	public function search( $ids = null, $ida = null)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('idr',$this->idr);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date_r',$this->date_r,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('idr_m',$this->idr_m);
		$criteria->compare('idr_f',$this->idr_f);
		$criteria->compare('idce',$this->idce);
		$criteria->compare('idp',$this->idp);
		if ($ids !== null){
			if ($ida !== null) {
                $criteria->condition = '(ids' . $ids . ') AND ida' . $ida;
            } else {
                $criteria->condition = 'ids' . $ids;
                $criteria->compare('ida',$this->ida);
            }

		} else{
			$criteria->compare('ids',$this->ids);
            $criteria->compare('ida',$this->ida);
		};
        $criteria->compare('date_arh', $this->date_arh, true);
		$criteria->compare('vozrast',$this->vozrast);
        $criteria->compare('pol',$this->pol);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'name ASC',
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

            echo $this->date_arh;

			if ($this->date_arh<>'1970-01-01' and $this->date_arh>$this->date_r) {

                return true;

			} elseif ($this->date_arh=='1970-01-01') {

                $this->ida = 0;
                return true;

            } else {
                return false;
            }

		} else {
			return false;
		}
	}

	protected function afterFind() {
		$date = date('d.m.Y', strtotime($this->date_r));
		$this->date_r = $date;
		$date = date('d.m.Y', strtotime($this->date_arh));
		$this->date_arh = $date;

		$date1 = new DateTime();
		$date2 = new DateTime($this->date_r);
		$date3= $date1->diff($date2);
        if ($date3->y > 0) {
            $this->vozrast = $date3->y . ' г ' . $date3->m . ' м ' . $date3->d  . ' д ';
        } else {
            $this->vozrast = $date3->m . ' м ' . $date3->d  . ' д ';
        }

        if ($this->sex == 1) {
            $copulation = Copulations::model()->findAll('idr_m=:idr_m', array(
                    ':idr_m'=>$this->idr)
            );

            $date1 = new DateTime();
            if (isset($copulation)){
                foreach ($copulation as $cop){
                    $date2 = new DateTime($cop->date);
//					if ($date1->diff($date2)->days < 30) {
                    if (!isset($cop->okrol)) {
                        $this->pol = 'C-' . $date1->diff($date2)->days;
                    } else {
                        $this->pol = 'Ж';
                    }
                }
            } else {
                $this->pol = 'Ж';
            }

        }

        if ($this->sex == 2)  {
                $this->pol = 'М';
        }


        parent::afterFind();
	}

}
