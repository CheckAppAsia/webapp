<?php $cut_ruri = explode("/",$ruri);   ?>
<div class="nav_heading">
	<span><?php echo $patient_name; ?></span> 
</div>
<div>
	<div>Start Time: <span id="time"><?php echo $time; ?></span> </div>
	<div>End Time: <span id="clock"></span></div>
	<button type="button" id="end-consultation">End Consultation</button>
</div>
<table class="nav_fullw">
	<tr>
		<td class="<?php echo ($cut_ruri[1]=="appointments" && $cut_ruri[2]=="view")?"active":"" ?> first"><a href="<?php echo base_url('dashboard/physician/appointments/view/'.$appointment_id.'/'.$member_id); ?>">
			<span>Overview</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="patient" && $cut_ruri[2]=="profile")?"active":"" ?> second"><a href="<?php echo base_url('dashboard/patient/profile'); ?>">
			<span>Diagnose</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="prescription" && $cut_ruri[2]=="create")?"active":"" ?> third"><a href="<?php echo base_url('dashboard/physician/prescription/create/'.$appointment_id.'/'.$member_id); ?>">
			<span>Prescription</span>
		</a></td>
		<td class="<?php echo ($cut_ruri[1]=="appointments" && $cut_ruri[2]=="privacy")?"active":"" ?> fourth"><a href="<?php echo base_url('dashboard/settings/privacy'); ?>">
			<span>Security & Privacy</span>
		</a></td>
		<td class="fifth"><a href="">
			<span>Emergency Contacts</span>
		</a></td>
	</tr>
</table>

<script type="text/javascript">
var currenttime = '<? echo date("F d, Y H:i:s", time())?>'  
var montharray= new Array("January","February","March","April","May","June", "July","August","September","October","November","December");
var serverdate=new Date(currenttime);
function padlength(what){
	var output=(what.toString().length==1)? "0"+what : what;
	return output;
}
function displaytime(){
	serverdate.setSeconds(serverdate.getSeconds()+1);
	var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear();
	var timestring = padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+ ":" + padlength(serverdate.getSeconds());
	document.getElementById("clock").innerHTML = datestring + " " + timestring;
}
setInterval("displaytime()", 1000);
</script>