<?php
class crud extends CI_Controller{
  public function __construct(){
        parent::__construct();
		
		//session_start();
}

function add(){
	session_start();
	if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_POST["item_id"], 	$item_array_id)) 
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'=>$_POST["item_id"],  
                     'movie'=>$_POST["movie"],  
                     'price'=>$_POST["price"]   
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
               redirect('film/movies/dashboard','refresh');
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'=>$_POST["item_id"],  
                'movie'=>$_POST["movie"],  
               	'price'=>$_POST["price"] 
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }
      redirect('film/movies/dashboard','refresh'); 
}

function insert(){
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
 foreach($_SESSION["shopping_cart"] as $keys => $values){
 	$data = array(
	'buyer' => $user,
	'movies' => $values["movie"],
	'total' => $values["price"]
	);
	$this->db->insert('cart', $data);
 }
 unset($_SESSION["shopping_cart"]);
redirect('/film/movies/dashboard/index','refresh');

}

function delete($id){

           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == 'my_id')  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
 } 
redirect('film/movies/dashboard','refresh');
}

}
?> 	