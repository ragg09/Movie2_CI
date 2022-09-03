<h1> <?php echo $title;?> </h1>
<?php
echo form_open('film/movies/crud/edit');

echo "<p> <label='name' >GenreID</label> <br/>";
$data = array('name' =>'GenreID','value' => $GenreID['GenreID']);
echo form_input($data) ." </p> ";
	
echo "<p> <label='name' >CertificateID</label> <br/>";
$data = array('name' =>'CertificateID', 'value' => $CertificateID['CertificateID']);
echo form_input($data) ." </p> ";

echo "<p> <label='name' >FilmTitle</label> <br/>";
$data = array('name' =>'FilmTitle', 'value' => $FilmTitle['FilmTitle']);
echo form_input($data) ." </p> ";

echo "<p> <label='name' >FilmStory</label> <br/>";
$data = array('name' =>'FilmStory', 'value' => $FilmStory['FilmStory']);
echo form_input($data) ." </p> ";

echo "<p> <label='name' >FilmReleaseDate</label> <br/>";
$data = array('name' =>'FilmReleaseDate', 'value' => $FilmReleaseDate['FilmReleaseDate']);
echo form_input($data) ." </p> ";

echo "<p> <label='name'>FIlmDuration</label> <br/>";
$data = array('name' =>'FIlmDuration', 'value' => $FIlmDuration['FIlmDuration']);
echo form_input($data) ." </p> ";

echo "<p> <label='name' >FilmAdditionalInfo</label> <br/>";
$data = array('name' =>'FilmAdditionalInfo', 'value' => $FilmAdditionalInfo['FilmAdditionalInfo']);
echo form_input($data) ." </p> ";

echo "<p> <label='name' > Image </label> <br/>";
$data = array('name' =>'image', 'value' => $image['image']);
echo form_upload($data); 

echo "<p> <label='name' >Video</label> <br/>";
$data = array('name' =>'video', 'value' => $video['video']);
echo form_upload($data); 

echo '<br>';
echo form_hidden('id',$FilmStory['FilmTitleID']);
echo '<br>';	
echo form_submit('submit','update actors');
echo form_close();
?>