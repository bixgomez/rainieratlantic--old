<SCRIPT LANGUAGE="JavaScript">
	function moveElement(currElem,frameName,top,left)
	{
	var dom = eval('parent.' + frameName + docObj + currElem + styleObj);
	dom.top = top;
	dom.left = left;
	}
</SCRIPT>

<!--- This is all the info for the bottom frame, all the heavy scripting occurs here --->

<!--- set bigmap position based on movement along coordinates --->
<cfif isdefined ("w")><cfset session.bigmapleft=round(session.bigmapleft+application.bigmapmove)></cfif>
<cfif isdefined ("e")><cfset session.bigmapleft=round(session.bigmapleft-application.bigmapmove)></cfif>
<cfif isdefined ("n")><cfset session.bigmaptop=round(session.bigmaptop+application.bigmapmove)></cfif>
<cfif isdefined ("s")><cfset session.bigmaptop=round(session.bigmaptop-application.bigmapmove)></cfif>
<cfif isdefined ("guidetop")>
	<cfset gmaptdist=round(guidetop-application.redboxbasetop)>
	<cfset gmapldist=round(guideleft-application.redboxbaseleft)>
	<cfset bmaptdist=round(gmaptdist/application.bmapfactor)>
	<cfset bmapldist=round(gmapldist/application.bmapfactor)>
	<cfset session.bigmaptop=round(application.bigmapbasetop-bmaptdist)>
	<cfset session.bigmapleft=round(application.bigmapbaseleft-bmapldist)>
</cfif>

<!--- If this is an addition to the database --->
<!--- If the map is clicked (called from bigmap.php, 'locate(evt)') --->
<!--- Calculates the location of the pixel clicked as it relates to the map itself --->
<cfif isdefined ("cursort")>
	<cfif session.bigmaptop LT 0>
		<cfset realt=cursort+abs(session.bigmaptop)>
	<cfelse>
		<cfset realt=cursort-abs(session.bigmaptop)>
	</cfif>	
	<cfif session.bigmapleft LT 0>
		<cfset reall=cursorl+abs(session.bigmapleft)>
	<cfelse>
		<cfset reall=cursorl-abs(session.bigmapleft)>
	</cfif>
	<!--- open a new window to add info --->
	<script language="JavaScript">
	window.open("<cfoutput>addinfo.php?realt=realt#&reall=#reall#","add","toolbar=no,status=no,menubar=0,resizable=no,scrollbars=yes,width=350,height=400"</cfoutput>);
	</script>
</cfif>

<!--- Ensures that the map does not move too far up --->
<cfif session.bigmaptop GT application.bigmapbasetop>
	<cfset session.bigmaptop = application.bigmapbasetop>
</cfif>

<!--- Ensures that the map does not move too to the right --->
<cfif session.bigmapleft GT application.bigmapbaseleft>
	<cfset session.bigmapleft = application.bigmapbaseleft>
</cfif>

<!--- Ensures that the map does not move too far down --->   
<cfif session.bigmaptop LT application.bigmapslimit>
	<cfset session.bigmaptop = application.bigmapbasetop-application.bigmapheight+288>
</cfif>

<!--- Ensures that the map does not move too to the left --->
<cfif session.bigmapleft LT application.bigmapelimit>
	<cfset session.bigmapleft = application.bigmapbaseleft-application.bigmapwidth+288>
</cfif>

<!--- Corresponds to location of 'big map' --->
<!--- Determines the location of the red box over the guide map --->
<cfif session.bigmaptop LTE 0>
	<cfset bmaptdist=abs(session.bigmaptop)+application.bigmapbasetop>
<cfelseif session.bigmaptop LTE 10>
	<cfset bmaptdist=application.bigmapbasetop-session.bigmaptop>
<cfelse>
	<cfset bmaptdist=session.bigmaptop-application.bigmapbasetop>
</cfif>
    
<cfif session.bigmapleft LTE 0>
	<cfset bmapldist=Abs(session.bigmapleft)+application.bigmapbaseleft>
<cfelseif session.bigmapleft LTE 10>
	<cfset bmapldist=application.bigmapbaseleft-session.bigmapleft>
<cfelse>
	<cfset bmapldist=session.bigmapleft-application.bigmapbaseleft>
</cfif>
    
<cfset rboxtdist=round(bmaptdist*application.bmapfactor)>
<cfset rboxldist=round(bmapldist*application.bmapfactor)>
    
<cfset session.redboxtop=application.redboxbasetop+rboxtdist+1>
<cfset session.redboxleft=application.redboxbaseleft+rboxldist+1>

<!--- Moves the red box in the guide map, the map on the left, and the map on the left to the appropriate spot --->
<cfoutput>
<BODY link="White" vlink="White" alink="White" bgcolor="666666" onLoad=" moveElement('.redbox','guidemap.',#session.redboxtop#,#session.redboxleft#),
moveElement('.bigmap','bigmap.',#session.bigmaptop#,#session.bigmapleft#),
moveElement('.lilmap','lilmap.',#session.bigmaptop#,#session.bigmapleft#);">

<SCRIPT LANGUAGE="javascript">
	<!--
	window.open("nav.php?bmt=#session.bigmaptop#&bml=#session.bigmapleft#", "nav");
	//-->
</SCRIPT>
</cfoutput>
