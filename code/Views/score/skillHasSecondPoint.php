<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Skill</th>
            <th>Avg Point</th>
            <th>User </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["skill"]; ?></td>
            <td><?php echo $row["avg_point"]; ?></td>
            <td><?php echo $row["user"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
