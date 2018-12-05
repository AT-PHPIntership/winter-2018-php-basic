<table border='1'>
  <tr>
    <th>skill_name</th>
    <th>skill_num</th>
  </tr>
<?php
  foreach($data as $row) {
?>
  <tr>
    <td><?php echo $row['skill_name'] ?></td>
    <td><?php echo $row['skill_num'] ?></td>
  </tr>
<?php
}
?>
</table>