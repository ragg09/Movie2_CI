<h1> <?php echo $title;?> </h1>
<?php
// if ($this->session->flashdata('message')){
// echo " <div class='message'> ".$this->session->flashdata('message')." </div> ";
// }
$url = base_url();
if (count($ratee)){
echo " <table border='1' cellspacing='0' cellpadding='3' width='400'> ";
echo " <tr valign='top'> ";
echo " <th> ratingID </th>  <th> ratee </th>  <th> movie </th>  <th> rate</th>";
echo " </tr> ";
foreach ($ratee as $key => $list){
echo " <tr valign='top'> ";
echo " <td> ".$list['ratingID']." </td> ";
echo " <td> ".$list['ratee']." </td> ";
echo " <td> ".$list['movie']." </td> ";
echo " <td> ".$list['rate']." </td> ";
// echo " <td align='center'> ";
// echo anchor('film/actor/crud/edit/'.$list['ActorID'],'edit');
// echo " | ";
// echo anchor('film/actor/crud/delete/'.$list['ActorID'],'delete');
// echo " </td> ";
echo " </tr> ";
}
echo " </table> ";
}
?>