<?php

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Skills</th>';
echo '<th>Avg Score</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($data as $v) {
  echo '<tr>';
  echo '<th>'.$v["name"].'</th>';
  echo '<th>'.$v["skills"].'</th>';
  echo '<th>'.$v["avg_user"].'</th>';
  echo '</tr>';
}
echo '<tbody>';
echo '</table>';
?>