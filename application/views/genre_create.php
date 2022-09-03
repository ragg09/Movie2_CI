<h1> <?php echo $title;?> </h1>
<?php
echo form_open('film/genre/crud/create');
echo "<p> <label='name' > Genre</label> <br/>";
$data = array('name' =>'Genre');
echo form_input($data) ." </p> ";?>
<input type="submit">
<?php
form_submit('submit','create genre');
echo form_close();
?>