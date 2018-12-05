<?php

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>STT</th>';
echo '<th>Name</th>';
echo '<th>Gender</th>';
echo '<th>Year</th>';
echo '<th>Province_id</th>';
echo '<th>Score</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($data as $v) {
  echo '<tr>';
  echo '<th>'.$v["id"].'</th>';
  echo '<th>'.$v["name"].'</th>';
  echo '<th>'.$v["gender"].'</th>';
  echo '<th>'.$v["year"].'</th>';
  echo '<th>'.$v["provice_id"].'</th>';
  echo '<th>'.$v["point"].'</th>';
  echo '</tr>';
}
echo '<tbody>';
echo '</table>';
?>