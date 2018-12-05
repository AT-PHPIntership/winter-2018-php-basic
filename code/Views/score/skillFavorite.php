<table border="1">
    <thead>
        <tr>
            <th>Skill</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["skill"]; ?></td>
            <td><?php echo $row["total1"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
