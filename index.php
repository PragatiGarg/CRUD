<?php
	require_once 'includes/db.php';
	$query1 = "Select * from userdetails order by id ASC";
	$result1 = $db->query($query1);
	if($db->error)
		$message = $db->error;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link href="theme/styles.css" rel="stylesheet"/>
<title>CRUD</title>
</head>
<body>
    <div>
    <table>
    	<thead>
            <th>Id</th>
            <th>User Id</th>
            <th>Name</th>
            <th>Email Id</th>
            <th>Password</th>
            <th>Recovery phone</th>
        </thead>
        <tbody>
        	<?php foreach($result1 as $entry): ?>
            <tr>
		<td><?php echo $entry->id; ?></td>
		<td><?php echo $entry->user_id; ?></td>
		<td><?php echo $entry->name; ?></td>
		<td><?php echo $entry->email_id; ?></td>
		<td><?php echo $entry->password; ?></td>
		<td><?php echo $entry->recovery_phn; ?></td>
		<td><a href="edit.php?id=<?php echo $entry->id; ?>">Edit</a> <a href="delete.php?id=<?php echo $entry->id; ?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
            <tr>
            	<td class="create"><a href="add.php">Add New User</a></td>
            </tr>
        </tbody>
    </table>
    </div>

</body>
</html>
