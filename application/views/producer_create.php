<h1> <?php echo $title;?> </h1>
<?php
echo form_open('film/producers/crud/create');
echo "<p> <label='name' > ProducerName </label> <br/>";
$data = array('name' =>'ProducerName');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > ContactEmailAddress </label> <br/>";
$data = array('name' =>'ContactEmailAddress');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > Website </label> <br/>";
$data = array('name' =>'Website');
echo form_input($data) ." </p> ";?>

<input type="submit">
<?php
form_submit('submit','create producers');
echo form_close();
?>