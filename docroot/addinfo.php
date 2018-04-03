<?php include 'header.php'; ?>

<cfif isdefined ("add")>
	<script language="JavaScript">
		<!-- hide
		function closeIt()
		  {
		  setTimeout("close()", 4000);
		  }
		// -->
	</script>
	<body bgcolor="#666666" onLoad="closeIt()">
	<!--- <body bgcolor="#666666"> --->
<cfelse>
	<body bgcolor="#666666">
</cfif>

<div id="Layer1" style="position: absolute; width: 275px; z-index: 2; top: 20; left: 20; font-family: sans-serif; font-weight: normal; font-size: 13px; line-height: 18px; color: White;">	

<cfif isdefined ("add")>
	
	<?php
		// <cfparam name="form.image" default="">
		if (!isset($form.image)) {
			$form.image = '';
		}
	?>
	
	<!--- Upload file if one was provided --->
	<CFIF image_upload NEQ "">
		<cffile action="UPLOAD"
        	filefield="image_upload"
        	destination="#Application.imagedir#\"
        	nameconflict="MAKEUNIQUE"
        	accept="*/*">
		<CFSET form.image = File.ServerFile>
	</CFIF>
	<cfinsert datasource="#application.datasource#" 
		tablename="#application.sitetable#" 
		formfields="realt,reall,name,description,image">	
	<cfquery datasource="#application.datasource#" name="getrecord">
		select * from #application.sitetable#
		where realt=#realt#
			  and reall=#reall#
			  and name='#name#'
			  and description='#description#'
	</cfquery>
	You entered the following information:
	<cfoutput>
		<ul>
		<li>Coordinates: #realt#,#reall#
		<li>Name: #name#
		<li>Description: #description#
		<li>Image: #image#
		</ul>
	</cfoutput>
<cfelse>
	<cfset check_t_lo = realt-8>
	<cfset check_t_hi = realt+8>
	<cfset check_l_lo = reall-8>
	<cfset check_l_hi = reall+8>
	<cfquery datasource="#application.datasource#" name="checkproximity">
		select * from #application.sitetable#
		where realt >= #check_t_lo#
		  and realt <= #check_t_hi#
		  and reall >= #check_l_lo#
		  and reall <= #check_l_hi#
	</cfquery>
	<cfoutput>
	You wish to add info for the following coordinates:
	#realt#,#reall#
	<cfif checkproximity.recordcount>
		<br><br>
		You may not add a new point here, as the following location(s) 
		have already been assigned:<br>
		<cfloop query="checkproximity">
			<br><b>#name#</b> (#realt#,#reall#)
		</cfloop>
		<br><br>
		If you wish to add information to the above location(s), please
		close this window, and select one of them from the list of place 
		names to the right.
	<cfelse>
		<br><br>
		<form action="addinfo.php?add=1" method="post" enctype="multipart/form-data">
		<input type="Hidden" name="realt" value="#realt#">
		<input type="Hidden" name="reall" value="#reall#">
		Name:<br>
		<input type="text" name="Name" size="35" maxlength="255"><br>
		<img src="i/glass.gif" width=1 height=10><br>
		Description:<br>
		<textarea name="description" cols="30" rows="5"></textarea><br>
		<img src="i/glass.gif" width=1 height=10><br>
		Image:<br>
		<input type="file" name="image_upload">		
		<!--- <cfdirectory action="LIST" directory="#application.imagedir#" name="images">
		<table border="0" cellspacing="0" cellpadding="5">
		<cfloop query="images" startrow="3">
			<tr>
			<td><input type="Radio" name="image" value="#name#" checked></td>
			<td><img src="images/#name#" width=100></td>
			</tr>
		</cfloop>
		</table> --->		
		<br><br>
		<input type="Submit" value="Add this Info">
		</form>
	</cfif>
	</cfoutput>
</cfif>

</div>

<?php include 'footer.php'; ?>
