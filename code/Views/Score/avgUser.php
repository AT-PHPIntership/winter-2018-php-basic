<table border='1'>
  <tr>
    <th>user_id</th>
    <th>user_name</th>
    <th>avg_score</th>
  </tr>
<?php
  foreach($data as $row) {
?>
  <tr>
    <td><?php echo $row['user_id'] ?></td>
    <td><?php echo $row['user_name'] ?></td>
    <td><?php echo $row['avg_score'] ?></td>
  </tr>
<?php
}
?>
</table>