<?php
//require_once 'includes/filter-wrapper.php';
require_once 'includes/db.php';
$message2='';
$errors = array();
$user_id='';
$name='';
$email_id='';
$password='';
$recovery_phn = 0;

//sanitize all the fields

/*$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email_id = filter_input(INPUT_POST, 'email_id', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$recovery_phn = filter_input(INPUT_POST, 'recovery_phn', FILTER_SANITIZE_NUMBER_INT);*/



if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];
	$recovery_phn = $_POST['recovery_phn'];
	//validate the form
	if(empty($user_id))
		$errors['user_id']=true;
	if(empty($name))
		$errors['name']=true;
	if(empty($email_id))
		$errors['email_id']=true;
	if(empty($password))
		$errors['password']=true;
	if(empty($recovery_phn))
		$errors['recovery_phn']=true;
	//if there are no errors put data into database
	if(empty($errors))
	{
		$sql ="INSERT INTO userdetails  (user_id, name, email_id, password, recovery_phn) values ('$user_id', '$name', '$email_id', '$password', $recovery_phn)";
		$result = $db->query($sql);
			header('location: index.php');
		exit;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="theme/styles2.css" rel="stylesheet"/>
<title>Add New User</title>
</head>
<body>
<h1><?php echo $message2; ?></h1>
<div class="container">
<section id="content">

    <form action="add.php" method="post">
	
	<h1> EDIT</h1>
       <div>
            <?php if(isset($errors['user_id'])) {?>
	<input type="text" id="user_id" name="user_id" placeholder="Error! Enter Valid user_id" >
            <?php }
		else {?> 
            <input type="text" id="user_id" name="user_id" placeholder="User_id" value="<?php echo $user_id; ?>">
		<?php }?>
        </div>
	
        <div>
            <?php if(isset($errors['name'])) {?>
	<input type="text" id="name" name="name" placeholder="Error! Enter Valid Name" >
            <?php }
		else {?>
            <input type="text"  id="name" name="name" placeholder="Full Name" value="<?php echo $name; ?>">
		<?php }?>
        </div>

        <div>
            <?php if(isset($errors['email_id'])){ ?>
            <input type="text" id="email_id" name="email_id" placeholder="Error! Enter Email Address" >
            <?php } else {?>
            <input type="text"  id="email_id" name="email_id" placeholder="Email Address" value="<?php echo $email_id; ?>">
			<?php }?>
        </div>

        <div>
            <?php if(isset($errors['password'])) {?>
           <input type="text" id="password" name="password" placeholder="Error! Enter Password" >
            <?php }  else {?>
            <input type="text"  id="password" name="password" placeholder="Password"value="<?php echo $password; ?>">
			<?php }?>
        </div>

        <div>
            <?php if(isset($errors['recovery_phn'])) { ?>
            <input type="text" id="recovery_phn" name="recovery_phn" placeholder="Error! Enter Recovery phone number" >
            <?php } else {?>
            <input type="text"  id="recovery_phn" name="recovery_phn" placeholder="Recovery phone number" value="<?php echo $recovery_phn; ?>">
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
