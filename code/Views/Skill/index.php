<table border='1'>
  <tr>
    <th>id</th>
    <th>skill_name</th>
  </tr>
<?php
  foreach($data as $row) {
?>
  <tr>
    <td><?php echo $row['skill_id'] ?></td>
    <td><?php echo $row['skill_name'] ?></td>
  </tr>
<?php
}
?>
</table>