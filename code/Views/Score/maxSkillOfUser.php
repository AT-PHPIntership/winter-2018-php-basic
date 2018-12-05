<table border='1'>
  <tr>
    <th>user_name</th>
    <th>skill_name</th>
    <th>max_score</th>
  </tr>
<?php
  foreach($data as $row) {
?>
  <tr>
    <td><?php echo $row['user_name'] ?></td>
    <td><?php echo $row['skill_name'] ?></td>
    <td><?php echo $row['max_score'] ?></td>
  </tr>
<?php
}
?>
</table>