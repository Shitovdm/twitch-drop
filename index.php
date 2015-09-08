<html>
<head>
    <title>
    </title>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
  <body>
  	<b> Turn ON/OFF full console </b> 
    <input type="checkbox" id="full_console"  name="full_console"><br>
    <b> Auto send requests </b> 
    <input type="checkbox" id="auto_send_requests"  name="auto_send_requests"><br>
    
	<input type="button" onClick="online()" value="ONLINE">
    <input type="button" onClick="online_2()" value="ONLINE">
    
    <input type="button" onClick="test_online()" value="TEST ONLINE"><br>
    <b>0-40:</b><img src="images/preloader_2.gif" id="load_icon"> <br>
    <b>40-80</b><img src="images/preloader_2.gif" id="load_icon_2"> <br>
    <input type="button" onClick="clearLog()" value="Clear log">
    <b>Console:</b>
    <div class="log" id="log">
        
    </div>
  </body>
</html>

<script>
$(document).ready(function(){
	$("#load_icon").hide();
	$("#load_icon_2").hide();
	//online();
});
function clearLog(){
	$("#log").html("");
}
function online(){
	$("#load_icon").show();
	$.ajax({
	type:"POST",
	url: 'requests/online.php', 
	cache: false,
	dataType:"json",
	success: function(response){
		if($('#full_console').prop('checked')){
			$("#log").append("<p>" + response.full + "</p>");
		}else{
			$("#log").append("<p>" + response.short + "</p>");
		}
		$("#load_icon").hide();
	}
	});
}
setInterval(function(){
	if($('#auto_send_requests').prop('checked')){
		online();
	}
	
},58000);

function online_2(){
	$("#load_icon_2").show();
	$.ajax({
	type:"POST",
	url: 'requests/online_2.php', 
	cache: false,
	dataType:"json",
	success: function(response){
		if($('#full_console').prop('checked')){
			$("#log").append("<p>" + response.full + "</p>");
		}else{
			$("#log").append("<p>" + response.short + "</p>");
		}
		$("#load_icon_2").hide();
	}
	});
}
setInterval(function(){
	if($('#auto_send_requests').prop('checked')){
		online_2();
	}
	
},58000);

function test_online(){	
	$.ajax({
	type:"POST",
	url: 'requests/test_online.php', 
	cache: false,
	dataType:"json",
	success: function(response){
		if($('#full_console').prop('checked')){
			$("#log").append("<p>" + response.full + "</p>");
		}else{
			$("#log").append("<p>" + response.short + "</p>");
		}
	}
	});
}


</script>



