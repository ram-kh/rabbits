<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$days = Config::model()->find()->jigging;

$first_plane = new Datetime();
$last_plane = new Datetime();
$last_plane->modify("+7 day");

$theday = mktime (0,0,0,date("m") ,date("d")-30 ,date("Y"));
$theday_2 = mktime (0,0,0,date("m") ,date("d")-22 ,date("Y"));

$srok=date("Y-m-d",$theday);
$srok_2=date("Y-m-d",$theday_2);

$sluchki = Copulations::model()->findAll('date>:srok AND date<:srok_2', array(
    ':srok'=>$srok,
    ':srok_2'=>$srok_2
));

$otsadki = Okroly::model()->findAll('jigging>:srok AND jigging<:srok_2', array(
    ':srok'=>$first_plane->format("Y-m-d"),
    ':srok_2'=>$last_plane->format("Y-m-d")
));

$criteria=new CDbCriteria;
$criteria->order = 'date ASC';
$criteria->condition = 'date>:srok AND date<:srok_2';
$criteria->params = array(
        ':srok'=>$first_plane->format("Y-m-d"),
        ':srok_2'=>$last_plane->format("Y-m-d")
    );
$vaccines = Vaccination::model()->findAll($criteria);

?>

<!-- <h1><i><?php // echo CHtml::encode(Yii::app()->name); ?></i></h1> -->

<h2 align="center">План на неделю (7 дней)</h2>

<hr><h4><b>Ожидаемые окролы:</b></h4>
<?php
    foreach ($sluchki as $sl) {
?>
    <div class="row">
        Кролиха: <b><?php echo CHtml::encode(Rabbits::model()->findByPk($sl->idr_m)->name); ?></b></br>
        Случка:  <b><?php echo CHtml::encode($sl->date); ?></b></br>
            <?php
                  $date = new DateTime(date('Y-m-d',strtotime($sl->date)));
                  $date->modify('+ 30 day') ;
            ?>
        Ожидаемый окрол: <b><?php echo CHtml::encode($date->format('d.m.Y')); ?></b></br>
        <b><?php echo CHtml::link('карта кролика','/rab/index.php/rabbits/' . $sl->idr_m); ?></b></br>
    </div></br>
<?php
    } //foreach
?>
<hr><h4><b>Ожидаемые отсадки:</b></h4>
    <?php
        foreach ($otsadki as $ot) {
    ?>
<div class="row">
    Кролиха: <b><?php echo CHtml::encode(Rabbits::model()->findByPk($ot->idr_m)->name); ?></b></br>

    Дата отсадки:  <b><?php echo CHtml::encode($ot->jigging); ?></b></br>
    <b><?php echo CHtml::link('карта кролика','/rab/index.php/rabbits/' . $ot->idr_m); ?></b></br>
</div></br>
    <?php
        } //foreach
    ?>

<hr><h4><b>Ожидаемые вакцинации:</b></h4>
    <?php
        foreach ($vaccines as $vac) {
    ?>
<div class="row">
    Кролик: <b><?php echo CHtml::encode(Rabbits::model()->findByPk($vac->idr)->name); ?></b></br>
    Дата вакцинации:  <b><?php echo CHtml::encode($vac->date); ?></b></br>
    <b><?php echo CHtml::link('карта кролика','.././rabbits/' . $vac->idr); ?></b></br>
</div></br>
    <?php
        } //foreach
    ?>