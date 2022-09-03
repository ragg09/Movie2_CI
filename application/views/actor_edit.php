<h1> <?php echo $title;?> </h1>
<?php
echo form_open('film/actor/crud/edit');
echo "<p> <label='name' > ActorFullName </label> <br/>";
$data = array('name' =>'ActorFullName','value' => $ActorFullName['ActorFullName']);
echo form_input($data) ." </p> ";
echo "<p> <label='name' > ActorNotes </label> <br/>";
$data = array('name' =>'ActorNotes', 'value' => $ActorNotes['ActorNotes']);
echo form_input($data) ." </p> ";	

echo "<p> <label='name' > Image </label> <br/>";
$data = array('name' =>'image', 'value' => $image['image']);
echo form_upload($data); 
echo '<br>';	
echo form_hidden('id',$ActorNotes['ActorID']);
echo '<br>';	
echo form_submit('submit','update actors');
echo form_close();
?>