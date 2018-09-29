<!DOCTYPE HTML>
<html>
<head>
<title>Jaiveer Gupta</title>
<link href="css1/style.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image" href="images/jaiicon/android-icon-36x36.png"  />
<link rel="icon" type="image" href="../images/jaiicon/android-icon-36x36.png" >


<script>
	function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0)
		 {
            timer = duration;
			alert("You are logout");
			window.location.href = "../logout.php";
			
        }
    }, 1000);
}
window.onload = function () {
    var fiveMinutes = 1 * 200000,
        display = document.querySelector('#time');
		 startTimer(fiveMinutes, display);

};

</script>
</head>
<body bgcolor="#FF9900">
<!---<span id="time" style="display:Block"></span>--->