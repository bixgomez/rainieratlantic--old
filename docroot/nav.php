<?php /* ?>
<SCRIPT LANGUAGE="JavaScript">
	function moveElement(currElem,frameName,top,left)
	{
	var dom = eval('parent.' + frameName + docObj + currElem + styleObj);
	dom.top = top;
	dom.left = left;
	}
</SCRIPT>
<?php */ ?>

<!--- LIMITS --->
<cfif bmt LT 0>
	<cfset limta=30+#abs(bmt)#>
<cfelse>
	<cfset limta=30-#abs(bmt)#>
</cfif>	
<cfif bml LT 0>
	<cfset limlb=278+#abs(bml)#>
<cfelse>
	<cfset limlb=278-#abs(bml)#>
</cfif>

<cfset limtb=#abs(#limta#+248)#>
<cfset limla=#abs(248-#limlb#)#>

<cfquery name="findsomething" datasource="#application.datasource#">
	select * from #application.sitetable#
	where realt > #limta#
	  and realt < #limtb# 
	  and reall > #limla#
	  and reall < #limlb#
</cfquery>

<?php /* ?>
<cfif isdefined ("detail")>
	<body bgcolor="#666666" link="#CCCCCC" vlink="#CCCCCC" alink="#CCCCCC">
<cfelse>
	<body bgcolor="#666666" link="#CCCCCC" vlink="#CCCCCC" alink="#CCCCCC" onload="moveElement('.redball','bigmap.',1000,1000), moveElement('.redball','lilmap.',1000,1000)">
</cfif>
<?php */ ?>

<div class="body" id="Layer1" style="position: absolute; width: 200px; z-index: 2; top: 0; left: 1;">	

<!--- Sets the location of the red ball based on the rollover in "bigmap.php" --->
<cfif isdefined ("addcomment")>
	<img src="i/glass.gif" width=1 height=10><br>
	<cfquery name="detail" datasource="#application.datasource#">
		select * from #application.sitetable#
		where id=#addcomment#
	</cfquery>
	<cfoutput>
	<cfif len(detail.image) GT 2>
    <!-- <img src="images/#detail.image#" width=200><br> -->
    <img src="i/glass.gif" width=1 height=10><br>
  </cfif>
  <b>#detail.name#</b>
  <form action="nav.php?detail=#addcomment#&redballt=#redballt#&redballl=#redballl#&bmt=#bmt#&bml=#bml#" method="post">
    <textarea cols=22 rows=10 name="comment"></textarea><br>
    <img src="i/glass.gif" width=1 height=10><br>
    <input type="submit" value="Submit Comment">
  </form>
  </cfoutput>
<cfelseif isdefined ("detail")>
  <cfif isdefined ("form.comment")>
    <cfif len(trim(form.comment))>
      <cfquery name="descriptions" datasource="#application.datasource#">
        insert into descriptions (id,description)
        values (#detail#,'#form.comment#')
      </cfquery>
    </cfif>
  </cfif>
  <img src="i/glass.gif" width=1 height=10><br>
  <a href="nav.php"><strong>Return to screen choices</strong></a></b><br>
  <img src="i/glass.gif" width=1 height=10><br>
  <cfquery name="detail" datasource="#application.datasource#">
    select * from #application.sitetable#
    where id=#detail#
  </cfquery>
  <cfquery name="descriptions" datasource="#application.datasource#">
    select * from descriptions
    where id=#detail.id#
  </cfquery>
  <cfoutput>
  <cfif len(detail.image) GT 2>
    <!-- <img src="images/#detail.image#" width=200><br> -->
	<cfelse>
		<table border="0" cellspacing="0" cellpadding="5" width=200>
		<tr><td bgcolor=CCCCCC class="body">No photo available.</td></tr>
		</table>
	</cfif>
	<img src="i/glass.gif" width=1 height=10><br>
	<b>#detail.name#</b>
	<cfloop query="descriptions">
		<br><img src="i/glass.gif" width=1 height=10>
		<br>#description#
	</cfloop>
	<br><img src="i/glass.gif" width=1 height=10>
	<br><a href="nav.php?addcomment=#detail.id#&redballt=#redballt#&redballl=#redballl#&bmt=#bmt#&bml=#bml#">Add a comment to this item</a>
	</cfoutput>
<cfelseif findsomething.recordcount>
	<img src="i/glass.gif" width=1 height=10><br>
	Roll your mouse over any of the following place names to locate
	them on the map.  Click them to view detailed information or
	photographs, if available:<br><br>
	<cfoutput query="findsomething">
	<cfset redballt=#realt#+#bmt#-4>
	<cfset redballl=#reall#+#bml#-4>
	<a href="nav.php?detail=#id#&redballt=#redballt#&redballl=#redballl#&bmt=#bmt#&bml=#bml#" onmouseover="moveElement('.redball','bigmap.',#redballt#,#redballl#), moveElement('.redball','lilmap.',#redballt#,#redballl#)" onmouseout= "moveElement('.redball','lilmap.',1000,1000), moveElement('.redball','bigmap.',1000,1000)">
	<b>#name#</b></a>
	<cfif len(description) GT 2><br>#description#</cfif><br><br>
	</cfoutput>
</cfif>

</div>
