<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Skill</th>
            <th>Max Point</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["skill"]; ?></td>
            <td><?php echo $row["point"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
