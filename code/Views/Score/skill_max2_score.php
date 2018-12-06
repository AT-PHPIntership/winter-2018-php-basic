<?php

    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Skill</th>';
    echo '<th>Users</th>';
    echo '<th>Score</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($data as $v) {
        echo '<tr>';
        echo '<th>'.$v["skill"].'</th>';
        echo '<th>'.$v["users"].'</th>';
        echo '<th>'.$v["avg_score"].'</th>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
?>
