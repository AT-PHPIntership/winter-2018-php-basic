<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show user has stored</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>User Name</th>
            <th>Gender</th>
            <th>Province</th>
        </tr>
        <tr>
            <?php foreach($data as $val) : ?>
                <td><?php echo $val['username'] ?></td>
                <td><?php echo $val['gender'] ?></td>
                <td><?php echo $val['province_name'] ?></td>
            <?php endforeach ?>
        </tr>
    </table> 
</body>
</html>