<?php

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Skill</th>';
echo '<th>Max Score</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($data as $v) {
  echo '<tr>';
  echo '<th>'.$v["user_name"].'</th>';
  echo '<th>'.$v["skill_name"].'</th>';
  echo '<th>'.$v["avg_user"].'</th>';
  echo '</tr>';
}
echo '<tbody>';
echo '</table>';
?>