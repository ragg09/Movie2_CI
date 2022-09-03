<h1> <?php echo $title;?> </h1>
<?php
echo form_open_multipart('film/users/crud/create');
echo "<p> <label='name' > username </label> <br/>";
$data = array('name' =>'username');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > password </label> <br/>";
$data = array('name' =>'password', 'type' =>'password');
echo form_input($data) ." </p> ";
?>
<?php
echo form_submit('submit','create users');
echo form_close();
?>