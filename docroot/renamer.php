<?php include 'header.php'; ?>

<body>

Renaming images...

<cfdirectory action="LIST" directory="#application.imagedir#" name="images">

<cfloop query="images">
<cfoutput>#name#</cfoutput> is now<br>

<cfif #name# contains " ">
<cffile action="RENAME" source="#application.imagedir#/#name#" destination="#application.imagedir#/#Replace(name," ","")#">
<cfoutput>#Replace(name," ","")#</cfoutput>
</cfif>

<cfif #name# contains "-">
<cffile action="RENAME" source="#application.imagedir#/#name#" destination="#application.imagedir#/#Replace(name,"-","_","ALL")#">
<cfoutput>#Replace(name,"-","_")#</cfoutput>
</cfif>

<cfif #name# contains "__">
<cffile action="RENAME" source="#application.imagedir#/#name#" destination="#application.imagedir#/#Replace(name,"__","_","ALL")#">
<cfoutput>#Replace(name,"__","_","ALL")#</cfoutput>
</cfif>

<cfif #name# contains "__">
<cffile action="RENAME" source="#application.imagedir#/#name#" destination="#application.imagedir#/#Replace(name,"__","_","ALL")#">
<cfoutput>#Replace(name,"__","_","ALL")#</cfoutput>
</cfif>

<cfif #name# contains "__">
<cffile action="RENAME" source="#application.imagedir#/#name#" destination="#application.imagedir#/#Replace(name,"__","_","ALL")#">
<cfoutput>#Replace(name,"__","_","ALL")#</cfoutput>
</cfif>

<br><br>
</cfloop>

Done.

<?php include 'footer.php'; ?>
