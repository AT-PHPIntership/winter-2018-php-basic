<?php
    echo '<table border= 2px solid>';
        echo '<th>' .Name. '</th>';
        echo '<th>' .Gender. '</th>';
        echo '<th>' .ProvinceId. '</th>';
foreach ($data as $row) {
    foreach ($row as $v) {
        echo '<td>'.$v.' </td>';
    }
}
    echo '<table>';
?>