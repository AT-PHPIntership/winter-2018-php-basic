<table border="1">
    <thead>
        <tr>
            <th>NameSkill</th>
            <th>SkillFavorite</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row){ ?>
        <tr>
            <td><?php echo $row["nameSkill"]; ?></td>
            <td><?php echo $row["skillFavorite"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>