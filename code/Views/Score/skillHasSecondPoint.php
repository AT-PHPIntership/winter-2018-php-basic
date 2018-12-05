<table border='1'>
  <tr>
    <th>skill_name</th>
    <th>avg_skill_score</th>
    <th>group_user_name</th>
  </tr>
<?php
  foreach($data as $row) {
?>
  <tr>
    <td><?php echo $row['skill_name'] ?></td>
    <td><?php echo $row['avg_skill_score'] ?></td>
    <td><?php echo $row['group_user_name'] ?></td>
  </tr>
<?php
}
?>
</table>