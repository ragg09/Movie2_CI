<h1> <?php echo $title;?> </h1>
<p> <?php echo anchor("film/actor/crud/create", "Create new Actor");?> </p>
<?php
// if ($this->session->flashdata('message')){
// echo " <div class='message'> ".$this->session->flashdata('message')." </div> ";
// }
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
?>