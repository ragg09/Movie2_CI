<h1> <?php echo $title;?> </h1>
<p> <?php echo anchor("film/producers/crud/create", "Create new Producer");?> </p>
<?php
// if ($this->session->flashdata('message')){
// echo " <div class='message'> ".$this->session->flashdata('message')." </div> ";
// }
if (count($ProducerName)){
echo " <table border='1' cellspacing='0' cellpadding='3' width='400'> \n";
echo " <tr valign='top'> \n";
echo " <th> ProducerID </th> \n <th> ProucerName </th> \n <th> ContactEmailAddress </th> \n <th> Website </th> \n <th></th>";
echo " </tr> \n";
foreach ($ProducerName as $key => $list){
echo " <tr valign='top'> \n";
echo " <td> ".$list['ProducerID']." </td> \n";
echo " <td> ".$list['ProducerName']." </td> \n";
echo " <td> ".$list['ContactEmailAddress']." </td> \n";
echo " <td> ".$list['Website']." </td> \n";
echo " <td align='center'> ";
echo anchor('film/producers/crud/edit/'.$list['ProducerID'],'edit');
echo " | ";
echo anchor('film/producers/crud/delete/'.$list['ProducerID'],'delete');
echo " </td> \n";
echo " </tr> \n";
}
echo " </table> ";
}
?>