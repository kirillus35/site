<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 101 Template</title>
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

<input type="text" id="clock">
<script language=javascript>
var t=0;

if (t<=100){
setInterval(function(){clock()},1000);

function clock()
  {
  t=t+1;
  document.getElementById("clock").value=t;
  }


}

</script>

</head>
<button onclick="int=window.clearInterval(int)">Stop</button>
<body>
<h1>Hello, world!</h1>
<button type="button" class="btn">Default Button</button>
<br>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<button type="button" class="btn btn-success">Button</button>
<button type="button" class="btn btn-warning">Button</button>
<button type="button" class="btn btn-danger">Button</button>
    <div class="progress progress-striped active">
    <div class="bar" style="width: t+'%'"></div>
    </div>
</body>
</html>