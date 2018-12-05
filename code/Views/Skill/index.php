<?php

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>STT</th>';
echo '<th>Name</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($data as $v) {
  echo '<tr>';
  echo '<th>'.$v["id"].'</th>';
  echo '<th>'.$v["name"].'</th>';
  echo '</tr>';
}
echo '<tbody>';
echo '</table>';
?>