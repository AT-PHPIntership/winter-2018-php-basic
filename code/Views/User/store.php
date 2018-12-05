<table border='1'>
  <tr>
    <th>name</th>
    <th>gender</th>
    <th>provinceId</th>
  </tr>
<?php
  foreach($data as $row) {
?>
  <tr>
    <td><?php echo $row['user_name'] ?></td>
    <td><?php echo $row['gender'] ?></td>
    <td><?php echo $row['province_id'] ?></td>
  </tr>
<?php
}
?>
</table>