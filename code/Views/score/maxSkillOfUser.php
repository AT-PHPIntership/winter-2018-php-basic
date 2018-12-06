<table border="1">
    <thead>
        <tr>
            <th>UserName</th>
            <th>SkillName</th>
            <th>MaxScore</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["skill"]; ?></td>
            <td><?php echo $row["maxScore"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>