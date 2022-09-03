<h1> <?php echo $title;?> </h1>
<?php
echo form_open_multipart('film/actor/crud/create');
echo "<p> <label='name' > ActorFullName </label> <br/>";
$data = array('name' =>'ActorFullName');
echo form_input($data) ." </p> ";
echo "<p> <label='name' > ActorNotes </label> <br/>";
$data = array('name' =>'ActorNotes');
echo form_input($data) ." </p> ";
$data = array('name'=>'image','id'=>'uimage');
echo form_upload($data);
?>
<?php
echo form_submit('submit','create actors');
echo form_close();
?>