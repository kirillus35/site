<html>
<head>
	<title></title>
</head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		var width = 100;
		var width2 = 300;
		var height = 10;
		var deltatime = 100; // десятая секунды
		var procents = 0;
		var speed = 2;
		$('#loading').css({width: width+'px', height: height+'px'}).find('#loading_into').css({width: parseInt(width/100*procents)+'px', height: height});
		setInterval(function()
		{
			if(procents<=100)
			{
				procents += 1*speed;
				$('#loading_into').css({width: parseInt(width/100*procents)+'px'});
                                $('.bar').css({width: parseInt(width2/100*procents)+'px'});
			}
		}, deltatime);
	});
	</script>
<body>
	<div id="loading" style="background: #999;">
		<div id="loading_into" style="background: #000;"></div>
	</div>

    <div class="progress progress-striped active">
    <div class="bar" style="margin-left:10px"></div>
    </div>
</body>
</html>