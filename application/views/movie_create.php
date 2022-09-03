<h1> <?php echo $title;?> </h1>
<?php
echo form_open('film/movies/crud/create');

echo " <p> <label for='name'> Genre </label> <br/> ";
//echo form_dropdown('GenreID',$GenreID) ." </p> ";
$data = array('name' =>'GenreID');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > CertificateID </label> <br/>";
$data = array('name' =>'CertificateID');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > FilmTitle </label> <br/>";
$data = array('name' =>'FilmTitle');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > FilmStory </label> <br/>";
$data = array('name' =>'FilmStory');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > FilmReleaseDate </label> <br/>";
$data = array('name' =>'FilmReleaseDate');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > FIlmDuration	 </label> <br/>";
$data = array('name' =>'FIlmDuration');
echo form_input($data) ." </p> ";

echo "<p> <label='name' > FilmAdditionalInfo	 </label> <br/>";
$data = array('name' =>'FilmAdditionalInfo');
echo form_input($data) ." </p> ";

echo "<p> <label='name' >Image</label> <br/>";
$data = array('name'=>'image','id'=>'uimage');
echo form_upload($data);
echo "<br>";

echo "<p> <label='name' >Video</label> <br/>";
$data = array('name'=>'video');
echo form_upload($data);
echo "<br><br><br>";
?>
<input type="submit">
<?php
form_submit('submit','create movie');
echo form_close();
?>