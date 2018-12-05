<?php

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Skill</th>';
echo '<th>Number of user</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($data as $v) {
  echo '<tr>';
  echo '<th>'.$v["name"].'</th>';
  echo '<th>'.$v["number_users"].'</th>';
  echo '</tr>';
}
echo '<tbody>';
echo '</table>';
?>