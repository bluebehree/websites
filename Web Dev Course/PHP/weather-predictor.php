<!DOCTYPE html>
<html lang="en">

  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Weather Scraper</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
  	<!-- jQuery CDN -->
  	<script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>
  
  <style>
  
  	html, body
  	{
  		height: 100%;
  	}
  
  	.container
  	{
  		width: 100%;
  		height: 100%;
  		background-image: url("winter-background.jpg");
  		background-size: cover;
  		background-position: center;
  		padding-top: 100px;
  	}
  	
  	.center
  	{
  		text-align: center;
  	}
  	
  	.white
  	{
  		color: white;
  	}
  	
  	p
  	{
  		padding-top: 15px;
  		padding-bottom: 15px;
  	}
  	
  	button
  	{
  		margin-top: 20px;
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
    		
    			<div class="col-md-6 col-md-offset-3 center">
    			
    				<h1 class="center white">Weather Predictor</h1>
    				
    				<p class="lead center white">Find out the weather forecast of whichever city you would like!</p>
    				
    				<form method="get">
    				
    					<div class="form-group">
    					
    						<input type="text" name="city" id="city" class="form-control" placeholder="e.g. Cerulean City" />
    						
    					</div>
    						
    					<button id="findMyWeather" class="btn btn-success btn-lg">Find My Weather!</button>
    				
    				</form>
    				
    				<div id="success" class="alert alert-success">Success!</div>
    				
    				<div id="fail" class="alert alert-danger">Could not find the weather forecast for that city. Please try again.</div>
    				
    				<div id="no-city" class="alert alert-danger">Please enter a city.</div>
    				
    			</div>
    			
    		</div>
    		
    	</div>

	<script>
	
		$("#findMyWeather").click(function(event)
		{
			event.preventDefault();
			
			$(".alert").hide();
			
			if ($("#city").val() != "")
			{			
		
				$.get("scraper.php?city="+$("#city").val(), function(data)
				{					
					if (data == "")
					{
						$("#fail").fadeIn();
					}
					else
					{
						$("#success").html(data).fadeIn();
					}
					
				});
			}
			else
			{
				$("#no-city").fadeIn();
			}
		});
	
	</script>


  </body>
  
</html>