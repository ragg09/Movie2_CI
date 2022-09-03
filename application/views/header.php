<!-- <div id=’globalnav’>
<ul>
<li> <?php echo anchor("/film/movies/dashboard/index","movies");?> </li>
<li> <?php echo anchor("/film/actor/dashboard/index","actor");?> </li>
<li> <?php echo anchor("/film/genre/dashboard/index","genre");?> </li>
<li> <?php echo anchor("/film/producers/dashboard/index","producer");?> </li>
<li> <?php echo anchor("/film/ratings/dashboard/index","ratings");?> </li>
</ul>
</div> -->

<?php
//including the database connection file

session_start();

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


<nav>	
	<?php 
		$url = base_url();
			echo anchor("/film/movies/dashboard/index",'<img src="'.$url.'images/'."logo.png".'" alt="image" class="logo">');
	?>

	<ul>
    <li style="position: absolute; left: 200px; color: white;"><h2>Welcome: <?php echo $user ?></h2></li> 
    <li> <?php echo anchor("/film/movies/dashboard/index",'<img src="'.$url.'images/'."movie.png".'" alt="movie" class="icon">');?> </li>
    <li> <?php echo anchor("/film/actor/dashboard/index",'<img src="'.$url.'images/'."actor.png".'" alt="actor" class="icon">');?> </li>
    
    <?php
      if($user === "admin"){
    ?>
    <li> <?php echo anchor("/film/genre/dashboard/index",'<img src="'.$url.'images/'."genre.png".'" alt="genre" class="icon">');?> </li>
    <li> <?php echo anchor("/film/producers/dashboard/index",'<img src="'.$url.'images/'."producer.png".'" alt="producer" class="icon">');?> </li>
    
    <li> <?php echo anchor("/film/ratings/dashboard/index",'<img src="'.$url.'images/'."rating.png".'" alt="ratings" class="icon">');?> </li>
    <?php
      }
    ?>

    <?php
      if($desc === "rater"){
    ?>
        <li> 
          <button onclick="document.getElementById('id01').style.display='block'">
            <?php echo '<img src="'.$url.'images/'."cart.png".'" alt="cart" class="icon">';?>
            </button>
        </li>
    <?php
      }
    ?>  
    
    <?php
      if($user === "admin" || $desc === "rater"){
    ?>
       <li> <?php echo anchor("/login/logout",'<img src="'.$url.'images/'."logout.png".'" alt="logout" class="icon">');?> </li>
    <?php
      }
    ?>

    

    <?php
      if($user === "guest"){
    ?>
        <li> 
          <button onclick="document.getElementById('id01').style.display='block'">
            <?php echo '<img src="'.$url.'images/'."icon.png".'" alt="login" class="icon">';?>
            </button>
        </li>
    <?php
      }
    ?>  
  </ul>

<div id="id01" class="modal">
  <?php
      if($user === "guest"){
    ?>
        <form class="modal-content animate" action="<?php echo base_url();?>login/verify" method="post">
          <div class="imgcontainer">
            <h1>Login</h1>
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
          </div>
          <div>
              <h2 style="margin-left: 20px;"><?php echo anchor("/film/users/dashboard/index",'Register');?></h2>
          </div>
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <!-- <p>No Account?</p>
            <?php echo anchor("/film/register/dashboard/index",'REGISTER');?>-->
          </div> 

          <div style="background-color:#f1f1f1">         
            <center><button type="submit" class="login">LOG IN</button></center>
          </div>

        </form>
    <?php
      }
    ?>  

    <?php
      if($desc === "rater"){
    ?>
      <div class="mycart">
        <center><h2>My Cart</h2></center>
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <table border="1px solid black">  
                          <tr> 

                               <th width="50%">movie</th>  
                               <th width="45%">Price</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr> 
                               <!-- <?php
                                  echo '<input type="text" name="my_id" value='.$values["item_id"].'> ';
                               ?> -->
                               <td><?php echo $values["movie"]; ?></td>  
                               <td>P<?php echo $values["price"]; ?></td>   
                               <td><?php echo anchor('film/cart/crud/delete/'.$values['item_id'],'delete'); ?></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="1" align="right">Total</td>  
                               <td align="left">P <?php echo number_format($total, 2); ?></td>  
                               <td><?php echo anchor('film/cart/crud/insert','BUY NOW'); ?></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table> 
      </div>      
    <?php
      }
    ?>
    
  
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</nav>
