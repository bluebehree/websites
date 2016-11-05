function getRandomColor()
		{
			var letters = '0123456789ABCDEF'.split('');
			var color = '#';
			for (var i = 0; i < 6; i++)
			{
				color += letters[Math.round(Math.random() * 15)];
			}
			return color;
		}
		
	
		var clickedTime;
		var createdTime;
		var reactionTime;
	
		function makeSquare()
		{
			var time = Math.random() * (3000);
		
			setTimeout(function()
			{
				if (Math.random() > 0.5)
				{
					document.getElementById("square").style.borderRadius = "400px";
				}
				else
				{
					document.getElementById("square").style.borderRadius = "200px";
				}
				
				var top = Math.random() * (300);
				var left = Math.random() * (500);
				
				document.getElementById("square").style.top = top + "px";
				document.getElementById("square").style.left = left + "px";
				
				document.getElementById("square").style.backgroundColor = getRandomColor();
				
				document.getElementById("square").style.display = "block";
				createdTime = Date.now();
			}, time);
		}
	
		document.getElementById("square").onclick=function()
		{
			clickedTime = Date.now();
			reactionTime = (clickedTime - createdTime) / 1000;
			document.getElementById("time").innerHTML = reactionTime;
			
			this.style.display = "none";
			makeSquare();
		}
		
		makeSquare();