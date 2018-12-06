<table border="1">
    <thead>
        <tr>
            <th>SkillName</th>
            <th>AvgSkill</th>
            <th>GroupUser</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["skill"]; ?></td>
            <td><?php echo $row["avg_point"]; ?></td>
            <td><?php echo $row["user"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>