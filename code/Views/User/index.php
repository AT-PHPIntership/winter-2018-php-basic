<table border='1'>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>year</th>
    <th>provinceId</th>
    <th>gender</th>
    <th>score</th>
  </tr>
<?php
  foreach($data as $row) {
?>
  <tr>
    <td><?php echo $row['user_id'] ?></td>
    <td><?php echo $row['user_name'] ?></td>
    <td><?php echo $row['year'] ?></td>
    <td><?php echo $row['province_id'] ?></td>
    <td><?php echo $row['gender'] ?></td>
    <td><?php echo $row['user_score'] ?></td>
  </tr>
<?php
}
?>
</table>