<html>
<head>
<title>Detecting browser close in IE</title>
<script type="text/javascript">
var message="If you have made any changes to the fields without clicking the Save button, your changes will be lost.";
function ConfirmClose(e)
{
	var evtobj=window.event? event : e;
	if(evtobj == e)
      {
		//firefox
		  if (!evtobj.clientY)
		  {
				evtobj.returnValue = message;
		  }
	  }
	  else
	  {
	  //IE
		if (evtobj.clientY < 0)
		  {
				evtobj.returnValue = message;
		  }
	  }
}
</script>
</head>




<body onbeforeunload="ConfirmClose(event)">
<h4>Close browser!</h4>
</body>
</html>