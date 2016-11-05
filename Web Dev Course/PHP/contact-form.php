<?php
	
	if ($_POST['submit'])
	{
		if (!$_POST['name'])
		{
			$error .= "<br />Please enter your name.";
		}
		
		if (!$_POST['email'])
		{
			$error .= "<br />Please enter your email address.";
		}
		
		if ($_POST['email'] != "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
		{ 
	    	$error.="<br />Please enter a valid email address.";
		}
		
		if (!$_POST['comment'])
		{
			$error .= "<br />Please enter a comment.";
		}
		
		if ($error)
		{

			$result = '<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>'.$error.'</div>';		
		}
		else
		{
			if (mail("albs.pan@gmail.com", "Comment from albuttpan.com!", 
			"Name: ".$_POST['name']."
Email: ".$_POST['email']."
Comment: ".$_POST['comment']))
			{
				$result = '<div class="alert alert-success"><strong>Thank you for your feedback!</strong></div>';	
			}
			else
			{
				$result = '<div class="alert alert-danger">Sorry, there was an error sending your message! Please try again later.</div>';	
			}
		}
	}
	
?>

<!doctype html>
<html>

<head>

    <title>Contact Us</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
	
	#email-form
	{
		border: 1px solid grey;
		border-radius: 10px;
		margin-top: 20px;
	}
	
	textarea
	{
		height: 120px;
	}
	
	form
	{
		padding-bottom: 20px;
	}
	
	.alert
	{
		margin-top: 20px;
		display: none;
	}
	
	</style>
    
</head>

<body>
	
	<div class="container">
	
		<div class="row">
		
			<div class="col-md-6 col-md-offset-3" id="email-form">
			
				<h1>Contact Us!</h1>
			
				<?php echo $result; ?>
			
				<p class="lead">Please let me know your thoughts! I will get back to you as soon as possible.</p>
			
				<form method="post">
				
					<div class="form-group">
					
						<label for="name">Name:</label>
						<input type="text" name="name" class="form-control" placeholder="First and Last Name" 
						value="<?php echo $_POST['name']; ?>"/>
						
					</div>
					
					<div class="form-group">
					
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control" placeholder="e.g. pugme@gmail.com"
						value="<?php echo $_POST['email']; ?>" />
						
					</div>
					
					<div class="form-group">
					
						<label for="comment">Comments:</label>
						<textarea class="form-control" name="comment"><?php echo $_POST['comment']; ?></textarea>
						
					</div>
					
					<input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />
				
				</form>
			
			</div>
			
			<div class="alert alert-success">Success!</div>
		
		</div>
	
	</div>
	

</body>

</html>