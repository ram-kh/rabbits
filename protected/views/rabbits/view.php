<?php
/* @var $this RabbitsController */
/* @var $data Rabbits */
/* @var $model Rabbits */

	$this->breadcrumbs=array(
		'Кролики'=>array('index'),
		$data->name,
	);

    $days_okrol = Config::model()->find()->copulation;

    $criteria=new CDbCriteria;
    $criteria->select='*';  // выбираем все поля '*'
    $criteria->condition='idr_m=:idr_m';
    $criteria->params=array(':idr_m'=>$data->idr);
    $criteria->order='date DESC';
    $okroly = Okroly::model()->findAll($criteria);

    if (isset($okroly)){
        $list = CHtml::listData($okroly,'ido','idco');
    }

    if (isset($okroly[0]->date)) {
        $date2= new DateTime($okroly[0]->date);
    }

    $criteria=new CDbCriteria;
    $criteria->select='*';  // выбираем только поле '*'
    $criteria->condition='idr_m=:idr_m';
    $criteria->params=array(':idr_m'=>$data->idr);
    $criteria->order='date DESC';
    $sluchki = Copulations::model()->findAll($criteria);

    if (isset($sluchki[0]->date)) {
        $date1= new DateTime($sluchki[0]->date);
    }

    $vaccination = Vaccination::model()->findAll(array('order'=>'date DESC', 'condition'=>'idr=:idr', 'params'=>array(':idr'=>$data->idr)));

	$this->menu=array(
        array('label'=>'Список кроликов', 'url'=>array('index')),
        array('label'=>'Добавить кролика', 'url'=>array('create')),
        array('label'=>'Редактировать кролика', 'url'=>array('update', 'id'=>$model->idr)),
        array('label'=>'Добавить случку', 'url'=>array('./copulations/create','idr_m'=>$model->idr),'visible'=>($model->sex==1)),
        array('label'=>'Добавить вакцинацию', 'url'=>array('./vaccination/create', 'idr'=>$model->idr)),
        array('label'=>'Удалить кролика', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idr),'confirm'=>'Вы уверены, что хотите удалить этого кролика?')),
	);
?>

<FIELDSET>
        <LEGEND>
            <h3>Карта кролика (<a href="update/<?php echo $data->idr ?>">Изменить</a>)</h3>
        </LEGEND>

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idp')); ?>:</b>
    <?php echo CHtml::encode($data->poroda->poroda); ?>
    <br />

    <b><?php echo 'Статус'; ?>:</b>
    <?php echo CHtml::encode($data->status->status); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idce')); ?>:</b>
    <?php echo CHtml::encode($data->idce); ?>
    <br /><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_r')); ?>:</b>
    <?php
            echo CHtml::encode($data->date_r);
            echo ' (возраст: '. $data->vozrast .')';

    ?>
	<br />

	<?php  if ($data->date_arh <>'01.01.1970') { ?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('date_arh')); ?>:</b>
		<?php echo CHtml::encode($data->date_arh); ?></br>
        <b><?php echo CHtml::encode($data->getAttributeLabel('ida')); ?>:</b>
        <?php echo CHtml::encode($data->arch->archive); ?>
		<br />
	<?php } ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idr_m')); ?>:</b>
    <?php
        if ($data->idr_m > 0) {
            $rab = Rabbits::model()->findByPk($data->idr_m);
            echo $rab->name .' (' . $rab->poroda->poroda . ')' ;
        } else {
            echo 'неизвестна';
        }

    ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idr_f')); ?>:</b>
    <?php
        if ($data->idr_f > 0) {
            $rab = Rabbits::model()->findByPk($data->idr_f);
            echo $rab->name .' (' . $rab->poroda->poroda . ')' ;

        } else {
            echo 'неизвестна';
        }

    ?>

    <br />

</FIELDSET>
<br />

<?php if ($data->sex==1) { ?>

<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="100%">
            <div align="center">
                <center>
                    <table cellpadding="6" cellspacing="1" width="100%" id="okroly">
                        <tr bgcolor="#FFFFFF">
                            <td colspan="10" valign="top" >
                                <b><font color="#0000FF">Окролы:</font></b><br>
                                <font size=-4 color="#008000">Если Отс.: >0 (кролята отсажены), то не активна отсадка и удаление.<br>Если Кролят = Умерло, то не активна отсадка и удаление.</font>
                            </td>
                        </tr>
                        <tr bgcolor="#FFFFFF" valign="top">
                            <td width="75px"><b>Дата<br>окрола:</b></td>
                            <td width="45px"><b>Отец:</b></td>
                            <td width="55px"><b>Кролят:</b></td>
                            <td width="55px"><b>Умерло:</b></td>
                            <td width="35px"><b>Отс.:</b></td>
                            <td width="75px"><b>Дата отсадки:</b></td>
                            <td><b>Примечание:</b></td>
                            <td width="30px">Отс.</td>
                            <td width="30px">&nbsp;</td>
                            <td width="30px">Уд.</td>
                        </tr>
                <?php

                    if (isset($okroly)) {
                        if (isset($okroly[0]->date)) {
                            $date2= new DateTime($okroly[0]->date);
                        }

                        foreach($okroly as $okr) {

                ?>
                        <tr bgcolor="#FFFFFF" valign="top">
                            <td><?php echo CHtml::encode($okr->date); ?></td>
                            <td><?php  if ($okr->idr_f==0) echo CHtml::encode('Сторонний самец'); else echo CHtml::encode(Rabbits::model()->findByPk($okr->idr_f)->name); ?></td>
                            <td><?php echo CHtml::encode($okr->born); ?></td>
                            <td><?php echo CHtml::encode($okr->died); ?></td>
                            <td><?php echo CHtml::encode($okr->reared); ?></td>
                            <td><?php echo CHtml::encode($okr->jigging); ?></td>
                            <td><?php echo CHtml::encode($okr->note); ?></td>
                            <td></td>
                            <td><?php echo CHtml::link('Ред.', '../okroly/update/' . $okr->ido);?>
                            </td>
                            <td></td>
                        </tr>

                <?php
                        } // foreach
                    } // if

                ?>
                    </table>
                </center>
            </div>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="100%">
            <div align="center">
                <center>
                    <table cellpadding="5" cellspacing="1" width="100%" id="sluchki">
                        <tr bgcolor="#FFFFFF">
                            <td colspan="8" valign="top">
                                <b><font color="#0000FF">Случки:</font></b></br>
<?php
        if (isset($sluchki[0]->date) and isset($okroly[0]->date)) {
            if ($sluchki[0]->idco==$okroly[0]->idco) {
                $date1 = new DateTime($okroly[0]->date);
                $date2 = new DateTime();
                if ($date2->diff($date1)->days > $days_okrol) {
                    echo '<font size=-1 color="red">После окрола прошло уже больше ' . $date2->diff($date1)->days . ' дней! Пора случать!</font>';
                }
            }
        }
 ?>
                                <br>
                            </td>
                        </tr>

                        <tr valign="top" bgcolor="#FFFFFF">
                            <td width="78px"><b>Дата<br>случки:</b></td>
                            <td width="48px"><b>Кличка<br>крола:</b></td>
                            <td width="15px"><b>У:</b></td>
                            <td width="15px"><b>Д:</b></td>
                            <td width="15px"><b>В:</b></td>
                            <td><b>Примечание:</b></td>
                            <td width="35px">&nbsp;</td>
                            <td width="35px">&nbsp;</td>
<!--                            <td width="68px">&nbsp;</td>    -->
                        </tr>

                <?php

                    if (isset($sluchki)) {
                        if (isset($sluchki[0]->date)) {
                            $date1= new DateTime($sluchki[0]->date);
                        }
                        foreach($sluchki as $sl) {
                ?>
                        <tr bgcolor="#FFFFFF" valign="top">
                            <td><?php echo CHtml::encode($sl->date); ?></td>
                            <td><?php  if ($sl->idr_f==0) echo CHtml::encode('Сторонний самец'); else echo CHtml::encode(Rabbits::model()->findByPk($sl->idr_f)->name); ?></td>
                            <td align="center"><?php if ($sl->morning) echo 'X'; ?></td>
                            <td align="center"><?php if ($sl->meal) echo 'X'; ?></td>
                            <td align="center"><?php if ($sl->evening) echo 'X'; ?></td>
                            <td><?php
                                    if (isset($okroly)) {
                                       if (array_search($sl->idco,$list)) {
                                            echo '<font color="#008000"><b>Был окрол! </b></font>';
                                       }
                                    }
                                    echo CHtml::encode($sl->note);
                                ?>
                            </td>
                            <td><?php
                                    if (isset($okroly)) {
                                        if (!array_search($sl->idco,$list)) {
                                            echo CHtml::link('Окр!', array('./okroly/create',
                                                'idr_m'=>$sl->idr_m,
                                                'idco'=>$sl->idco,
                                                'idr_f'=>$sl->idr_f
                                            ));
                                        }
                                    }
                                ?>
                             </td>
                            <td>
                                <?php
                                    if (isset($okroly)) {
                                       if (!array_search($sl->idco,$list)) {
                                            echo CHtml::link('Ред.', '../copulations/update/' . $sl->idco);
                                       }
                                    }

                                ?>
                            </td>
                        </tr>
                <?php
                        } // foreach
                    } // if
                ?>

                    </table>
                </center>
            </div>
        </td>
    </tr>
</table>
</br>

<?php } // if okroly & sluchki?>

<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="100%">
            <div align="center">
            <center>
                <table cellpadding="6" cellspacing="1" width="100%" id="vaccine">
                    <tr bgcolor="#FFFFFF">
                        <td colspan="3" valign="top"><b><font color="#0000FF">Вакцинация:</font></b></td>
                    </tr>
                    <tr valign="top" bgcolor="#FFFFFF">
                        <td width="100px"><b>Дата<br>вакцинации:</b></td>
                        <td width="180px"><b>Вакцина:</b></td>
                        <td width="35px">&nbsp;</td>
                    </tr>
            <?php
                if (isset($vaccination))
                {
                    foreach ($vaccination as $vac)
                    {

            ?>
                    <tr bgcolor="#FFFFFF" valign="top">
                        <td><?php echo $vac->date; ?></td>
                        <td><?php echo Vaccine::model()->findByPk($vac->idva)->vaccine; ?></td>
                        <td>
                            <?php
                                    echo CHtml::link('Ред.', '../vaccination/update/' . $vac->idv);
                            ?>
                        </td>
                    </tr>
            <?php
                    } // foreach
                } // if isset vaccine
            ?>
                </table>
            </center>
            </div>
        </td>
    </tr>
</table>
<br>