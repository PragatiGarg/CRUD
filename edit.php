<?php
//require_once 'includes/filter-wrapper.php';
require_once 'includes/db.php';
$id=0;
$user_id='';
$name='';
$email_id='';
$password='';
$recovery_phn = 0;
$message2='';
$errors = array();

$id = $_GET['id'];
	//if there's no id redriect to the homepage
	if(empty($id))
	{
		header('location: index.php');
		exit;
	}

//sanitize all the fields
/*$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email_id = filter_input(INPUT_POST, 'email_id', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);
$recovery_phn = filter_input(INPUT_POST, 'recovery_phn', FILTER_SANITIZE_NUMBER_INT);*/

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$user_id2 = $_POST['user_id'];
	$name2 = $_POST['name'];
	$email_id2 = $_POST['email_id'];
	$password2 = $_POST['password'];
	$recovery_phn2 = $_POST['recovery_phn'];
	//validate the form
	if(empty($user_id2))
		$errors['user_id']=true;
	if(empty($name2))
		$errors['name']=true;
	if(empty($email_id2))
		$errors['email_id']=true;
	if(empty($password2))
		$errors['password']=true;
	if(empty($recovery_phn2))
		$errors['recovery_phn']=true;
	//if there are no errors put data into database
	if(empty($errors))
	{
		$sql = "UPDATE userdetails SET user_id = '$user_id2', name = '$name2', email_id = '$email_id2', password = '$password2', recovery_phn = $recovery_phn2 WHERE id = $id";
		$result = $db->query($sql);
			header('location: index.php');
		exit;
	}

}
else
{
	//display database information
	//shows the user_id in the value part
	$query2 = "Select * from userdetails order by id ASC";
	$result3 = $db->query($query2);
	if($db->error)
		$message = $db->error;
	$result2 = $result3->fetch_assoc();
	$user_id = $result2['user_id'];
	$name = $result2['name'];
	$email_id = $result2['email_id'];
	$password = $result2['password'];
	$recovery_phn = $result2['recovery_phn'];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="theme/styles2.css" rel="stylesheet"/>
</head>
<body>
<div class="container">
<section id="content">

    <form action="" method="post">
	
	<h1> EDIT</h1>
       <div>
            <?php if(isset($errors['user_id'])) {?>
	<input type="text" id="user_id" name="user_id" placeholder="Error! Enter Valid user_id" >
            <?php }
		else {?> 
            <input type="text" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
		<?php }?>
        </div>
	
        <div>
            <?php if(isset($errors['name'])) {?>
	<input type="text" id="name" name="name" placeholder="Error! Enter Valid Name" >
            <?php }
		else {?>
            <input type="text"  id="name" name="name" value="<?php echo $name; ?>">
		<?php }?>
        </div>

        <div>
            <?php if(isset($errors['email_id'])){ ?>
            <input type="text" id="email_id" name="email_id" placeholder="Error! Enter Email Address" >
            <?php } else {?>
            <input type="text"  id="email_id" name="email_id" value="<?php echo $email_id; ?>">
			<?php }?>
        </div>

        <div>
            <?php if(isset($errors['password'])) {?>
           <input type="text" id="password" name="password" placeholder="Error! Enter Password" >
            <?php }  else {?>
            <input type="text"  id="password" name="password" value="<?php echo $password; ?>">
			<?php }?>
        </div>

        <div>
            <?php if(isset($errors['recovery_phn'])) { ?>
            <input type="text" id="recovery_phn" name="recovery_phn" placeholder="Error! Enter Recovery phone number" >
            <?php } else {?>
            <input type="text"  id="recovery_phn" name="recovery_phn" value="<?php echo $recovery_phn; ?>">
			<?php }?>
        </div>
		
        <div>
		<input type="submit" value="Save" >
        </div>

	</form>
</section>
</div>

</body>
</html>