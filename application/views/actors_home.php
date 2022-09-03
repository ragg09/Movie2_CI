<h1> <?php echo $title;?> </h1>
<?php
$url = base_url();
if (count($ActorFullName)){
echo " <table border='1' cellspacing='0' cellpadding='3' width='400'> ";
echo " <tr valign='top'> ";
echo " <th> ActorID </th>  <th> ActorFullName </th>  <th> ActorNotes </th>  <th></th>";
echo " </tr> ";
foreach ($ActorFullName as $key => $list){
echo " <tr valign='top'> ";
echo " <td> ".$list['ActorID']." </td> ";
echo " <td> ".$list['ActorFullName']." </td> ";
echo " <td> ".$list['ActorNotes']." </td> ";
echo ' <td> <img src="'.$url.$list['image'].'" alt="image" style="width: 100px; height: 100px;"></td> ';
echo " <td align='center'> ";
echo anchor('film/actor/crud/edit/'.$list['ActorID'],'edit');
echo " | ";
echo anchor('film/actor/crud/delete/'.$list['ActorID'],'delete');
echo " </td> ";
echo " </tr> ";
}
echo " </table> ";
}



// if (count($ActorFullName)){
// 	foreach ($ActorFullName as $key => $list){
// echo '<a href="#" class="ikot">';
// 		echo '<div class="front">'; 
// 		echo '<img src="'.$url.$list['image'].'" alt="image" style="width: 100%; height: 100%;" >'; 
// 		echo '</div>';
// 		echo '<br>';
// 		echo '<span class="center"></span>';
// 		echo '<span class="back">';
// 			echo " <td> ".$list['ActorFullName']." </td> ";
// 			echo " <td> ".$list['ActorNotes']." </td> ";
// 		echo '</span>';
// echo '</a>';
// }
// }
?>	