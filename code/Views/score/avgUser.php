<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Avg</th>
            <th>Skill</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["avg_point"]; ?></td>
            <td><?php echo $row["skill"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
