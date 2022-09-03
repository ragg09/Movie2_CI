<h1> <?php echo $title;?> </h1>
<?php
echo form_open('film/producers/crud/edit');
echo "<p> <label='ProducerName' > ProducerName </label> <br/>";
$data = array('name' =>'ProducerName','value' => $ProducerName['ProducerName']);
echo form_input($data) ." </p> ";

echo "<p> <label='ContactEmailAddress' > ContactEmailAddress </label> <br/>";
$data = array('name' =>'ContactEmailAddress','value' => $ProducerName['ContactEmailAddress']);
echo form_input($data) ." </p> ";

echo "<p> <label='Website' >Website</label> <br/>";
$data = array('name' =>'Website','value' => $ProducerName['ContactEmailAddress']);
echo form_input($data) ." </p> ";

echo $ProducerName['ProducerID'];
echo '<br>';	
echo form_hidden('id',$ProducerName['ProducerID']);
echo form_submit('submit','update producer');
echo form_close();
?>