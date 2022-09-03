<?php
//including the database connection file


 if(session_id() != ""){
    $user = "guest";
    $desc = "";
 }
 
if (isset($_SESSION['username']) && ! empty($_SESSION['username']))
{
  if($_SESSION['username'] === "admin"){
    $user = $_SESSION['username'];
  }
  else{
    $user = $_SESSION['username'];
    $desc = $_SESSION['desc'];
  }
  
}

?>

<!-- <h1> <?php echo $title;?> </h1>
<p> <?php echo anchor("film/movies/crud/create", "Create new Movie");?> </p>
<?php
// if ($this->session->flashdata('message')){
// echo " <div class='message'> ".$this->session->flashdata('message')." </div> ";
// }
$url = base_url();
if (count($FilmTitle)){
echo " <table border='1' cellspacing='0' cellpadding='3' width='400'> ";
echo " <tr valign='top'> ";
echo " <th> FilmTitleID </th>  <th> GenreID </th>  <th> CertificateID </th> </th>  <th> FilmTitle </th></th>  <th> FilmStory </th> </th>  <th> FilmReleaseDate </th> </th>  <th> FilmDuration </th> </th>  <th> FilmAdditionalInfo </th> <th>Image</th>  <th></th>";
echo " </tr> ";
foreach ($FilmTitle as $key => $list){
echo " <tr valign='top'> ";
//echo " <td> ".$list['FilmTitleID']." </td> ";
echo " <td> ".$list['GenreID']." </td> ";
echo " <td> ".$list['CertificateID']." </td> ";
echo " <td> ".$list['FilmTitle']." </td> ";
echo " <td> ".$list['FilmStory']." </td> ";
echo " <td> ".$list['FilmReleaseDate']." </td> ";
echo " <td> ".$list['FIlmDuration']." </td> ";
echo " <td> ".$list['FilmAdditionalInfo']." </td> ";
echo '<td><img src="'.$url.'images/'.$list['image'].'" alt="image" style="width: 100px; height: 100px;"></td> ';
echo " <td align='center'> ";
echo anchor('film/movies/crud/edit/'.$list['FilmTitleID'],'edit');
echo " | ";
echo anchor('film/movies/crud/delete/'.$list['FilmTitleID'],'delete');
echo " </td> ";
echo " </tr> ";
}
echo " </table> ";
}
?> -->

<center><h1> <?php echo $title;?> </h1></center>
<?php
echo form_open('film/movies/dashboard/view');

if($user === "admin"){
echo '<div class="edit_delete">';
	echo anchor('film/movies/crud/edit/'.$FilmTitleID['FilmTitleID'],'<img src="'.$url.'images/'."edit.png".'" alt="edit" class="edilete">');
	echo anchor('film/movies/crud/delete/'.$FilmTitleID['FilmTitleID'],'<img src="'.$url.'images/'."delete.png".'" alt="delete" class="edilete">');
echo '</div>';
}

echo '<div class="video">';
	echo '<video controls autoplay><source src="'.$url.'videos/'.$video['video'].'" type="video/mp4"></video>';
echo '</div>';





echo '<div class="detail">';
	// echo "<p> <label='name' >FilmTitle</label> <br/>";
	echo '<h1>'; echo $FilmTitle['FilmTitle'];  echo '</h1>';
	echo "<hr>";
	echo '<br><br><Br>';

	echo "<p> <label='name' >FilmStory</label>";
	echo '<h2 id="story">'; echo $FilmStory['FilmStory']; echo '</h2>';
	echo "<hr>";

	echo "<p> <label='name' >FilmReleaseDate</label> <br/>";
	echo '<h2>'; echo $FilmReleaseDate['FilmReleaseDate']; echo '</h2>';
	echo "<hr>";

	echo "<p> <label='name'>FIlmDuration</label> <br/>";
	echo '<h2>'; echo $FIlmDuration['FIlmDuration']; echo '</h2>';
	echo "<hr>";


	echo "<p> <label='name' >FilmAdditionalInfo</label> <br/>";
	echo '<h2>'; echo $FilmAdditionalInfo['FilmAdditionalInfo']; echo '</h2>';

	echo "<p> <label='name' >GenreID</label> <br/>";
	echo '<h2>'; echo $GenreID['GenreID']; echo '</h2>';
			
	echo "<p> <label='name' >CertificateID</label> <br/>";
	echo '<h2>'; echo $CertificateID['CertificateID']; echo '</h2>';


	// echo "<p> <label='name' > Image </label> <br/>";
	echo '<br><br><img src="'.$url.'images/'.$image['image'].'" alt="image" style="width: 100px; height: 100px;">';

	echo '<br>';
	echo form_hidden('id',$FilmStory['FilmTitleID']);
	echo '<br>';	
	//echo form_submit('submit','update actors');
echo '</div>';

echo anchor("/film/movies/dashboard/index",'<img src="'.$url.'images/'."back.png".'" alt="back" class="back" style="width: 50px; height: 50px; margin: 10px;">');

echo form_close();

echo '<div class="rate">';
	echo '<fieldset class="rating">';
	echo '<legend>RATINGS</legend>';

	$rate=$this->mMovies->getRatingAve($FilmStory['FilmTitleID']);
	echo $rate['AVG(rate)'];

	if($desc === "rater"){
		echo '<div class="cart">';
			echo '<h1>'; echo 'P'.$price['price'].'.00'; echo '</h1>';
			echo form_open_multipart('film/cart/crud/add');

				$data = array('name' =>'item_id', 'value' => $FilmTitleID['FilmTitleID'], 'type' => 'hidden');
				echo form_input($data) ." </p> ";

				$data = array('name' =>'movie', 'value' => $FilmTitle['FilmTitle'], 'type' => 'hidden');
				echo form_input($data) ." </p> ";

				$data = array('name' =>'price', 'value' => $price['price'], 'type' => 'hidden');
				echo form_input($data) ." </p> ";    

				echo form_submit('submit','Add to Cart', "class='cartbtn'"); 
			echo '</form>';
		echo '</div>';
        echo form_open_multipart('film/ratings/crud/create');
		        echo '<input id="demo-1" type="radio" name="demo" value="1">';
		        echo '<label for="demo-1">1 star</label>';
		        echo '<input id="demo-2" type="radio" name="demo" value="2">';
		        echo '<label for="demo-2">2 stars</label>';
		        echo '<input id="demo-3" type="radio" name="demo" value="3">';
		        echo '<label for="demo-3">3 stars</label>';
		        echo '<input id="demo-4" type="radio" name="demo" value="4">';
		        echo '<label for="demo-4">4 stars</label>';
		        echo '<input id="demo-5" type="radio" name="demo" value="5">';
		        echo '<label for="demo-5">5 stars</label>';
		        
		        echo '<div class="stars">';
		           echo ' <label for="demo-1" aria-label="1 star" title="1 star"></label>';
		            echo '<label for="demo-2" aria-label="2 stars" title="2 stars"></label>';
		            echo '<label for="demo-3" aria-label="3 stars" title="3 stars"></label>';
		            echo '<label for="demo-4" aria-label="4 stars" title="4 stars"></label>';
		            echo '<label for="demo-5" aria-label="5 stars" title="5 stars"></label>';   
		        echo '</div>';



				//echo "<p> <label='name'> ActorFullName </label> <br/>";
				//$data = array('name' =>'ratee', 'value' => $FilmTitleID['FilmTitleID']);
				$data = array('name' =>'ratee', 'value' => $user, 'type' => 'hidden');
				echo form_input($data) ." </p> ";
				//echo "<p> <label='name' > ActorNotes </label> <br/>";
				$data = array('name' =>'movie',  'value' => $FilmTitle['FilmTitle'], 'type' => 'hidden');
				echo form_input($data) ." </p> ";
				// $data = array('name' =>'rate',  'value' => $this->input->post('demo'), 'type' => 'hidden');
				// echo form_input($data) ." </p> ";
				?>
				<?php
				echo form_submit('submit','RATE NOW');
		echo form_close();

//echo $FilmTitleID['FilmTitleID'];
       

      //   echo '<label for="toggle-rating">';
      //     echo '<input type="checkbox" id="toggle-rating" checked>';
      //     echo 'style as ★ (<code>.rating .stars</code>)';
     	// echo '</label>';

	}
      
    echo '</fieldset>';
      
echo '</div>';
?>