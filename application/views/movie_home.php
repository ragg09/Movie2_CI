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

<div class="title"><h1> <?php echo $title;?> </h1></div>
<br>
<!-- <div class="title"><h1> <?php echo $user;?> </h1></div> -->
<center>
<?php
// if ($this->session->flashdata('message')){
// echo " <div class='message'> ".$this->session->flashdata('message')." </div> ";
// }
$url = base_url();

if (count($FilmTitle)){
foreach ($FilmTitle as $key => $list){
echo anchor('film/movies/dashboard/view/'.$list['FilmTitleID'],'<img src="'.$url.'images/'.$list['image'].'" alt="image" class="images" style="width: 200px; height: 300px; border: 5px solid black; margin-right: 70px; margin-bottom: 50px;">');
}
}
?>
</center>