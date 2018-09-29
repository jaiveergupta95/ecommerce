function getXMLHTTP()
{ //fuction to return the xml http object
   var xmlhttp=false;
	try
	{
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)
	{
     try
	   {
         xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	   }
catch(e){
try{
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e1){
xmlhttp=false;
}
}
}
return xmlhttp;
}
function getBranch()
{	
var CatgoryId = document.getElementById('CatId').value;
var strURL="imaginesubcat.php?Catid="+CatgoryId;
var req = getXMLHTTP();
//alert(id_citylocation);

if(req) {
req.onreadystatechange = function() {
	
if(req.readyState == 4){
// only if "OK"
if (req.status == 200) {						
document.getElementById('zonediv').innerHTML=req.responseText;	
					
} else {
alert("There was a problem while using XMLHTTP:\n" + req.statusText);
}
}				
}			
req.open("GET", strURL, true);
req.send(null);
}
}