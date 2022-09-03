<h1> <?php echo $title;?> </h1>
<?php
echo form_open('film/genre/crud/edit');
echo "<p> <label='name' > Genre </label> <br/>";
$data = array('name' =>'Genre','value' => $Genre['Genre']);
echo form_input($data) ." </p> ";
echo $Genre['GenreID'];
echo '<br>';	
echo form_hidden('id',$Genre['GenreID']);
echo form_submit('submit','update genre');
echo form_close();
?>