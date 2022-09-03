<h1> <?php echo $title;?> </h1>
<p> <?php echo anchor("film/genre/crud/create", "Create new Genre");?> </p>
<?php
// if ($this->session->flashdata('message')){
// echo " <div class='message'> ".$this->session->flashdata('message')." </div> ";
// }
if (count($Genre)){
echo " <table border='1' cellspacing='0' cellpadding='3' width='400'> \n";
echo " <tr valign='top'> \n";
echo " <th> GenreID </th> \n <th> Genre </th> \n <th></th>";
echo " </tr> \n";
foreach ($Genre as $key => $list){
echo " <tr valign='top'> \n";
echo " <td> ".$list['GenreID']." </td> \n";
echo " <td> ".$list['Genre']." </td> \n";
echo " <td align='center'> ";
echo anchor('film/genre/crud/edit/'.$list['GenreID'],'edit');
echo " | ";
echo anchor('film/genre/crud/delete/'.$list['GenreID'],'delete');
echo " </td> \n";
echo " </tr> \n";
}
echo " </table> ";
}
?>