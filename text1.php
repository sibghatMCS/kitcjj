<form method="POST" action="--WEBBOT-SELF--">
  
  <input type="text" name="T1" size="20"><input type="submit" value="Submit" name="B1"><input type="reset" value="Reset" name="B2"></p>
</form>

<script language="javascript">


function newWindow(url) { 
	var x,y;
	x = screen.width-35;
	y = screen.height-30;
	var win = window.open(url,'glossaryWindow','toolbar=no,directories=no,width=500,height=500'+
	'screenX=0,screenY=0,top=0,left=0,location=no,status=no,scrollbars=no,resize=yes,menubar=no');
}  

// Start of Playme Function
function playme()
{
tempUrl ='';
url = '';


	//alert(tempUrl);
	url = "./player.php?songid=" + tempUrl.replace(/,$/,"");

	newWindow(url);
	return false;
}		
// End of Playme Function	
// -->	
</script>
