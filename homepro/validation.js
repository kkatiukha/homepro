 /* ================== Homepro:  Validation Scripts ======================

Set of javascript routines for validating user input within HOmePro

Functions:
==> isEmpty
==> isWhitespace
==> isEmailFormat


==> displayMessage


==> checkDate
==> checkEmail
==> checkFileName
==> checkNumber
==> checkSelect
==> checkString
==> checkTextArea
==> checkFormChanged

==> clearWhiteSpace


======================================================================== */


/* ============== Contants ============================================== */
var stdErrorHeader = "Homepro System                   \n____________________________________________________\n\n";
var defaultEmptyOK = false;





/* ----------------------------------------------------------------------
NAME:         isEmpty
DESCRIPTION:  Checks to see if 'STRING s' or its property, 'length' is 
              empty.
PARAMETERS:   STRING s
INHERITANCE:  None
------------------------------------------------------------------------*/
function isEmpty(s)
{
	return ((s == null) || (s.length == 0));	
}


/* ----------------------------------------------------------------------
NAME:         isWhitespace
DESCRIPTION:  Returns true when STRING s is empty or when whitespace 
              characters are found. 
PARAMETERS:   STRING s
INHERITANCE:  isEmpty()
------------------------------------------------------------------------*/
function isWhitespace(s)
{
	var vTemp = "";
	
    // Is s empty
    if (isEmpty(s)) return true;
    
    // Not empty - check for whitespace
    
    // Remove whitespace.  If length of what remains > 0, then it is not whitespace.
    vTemp = (s.replace(/\s/g,''));  
    if (vTemp.length > 0) return false;
    else return true;    	
}


/* ----------------------------------------------------------------------
NAME:         clearWhiteSpace
DESCRIPTION:  This function will look at each text input and remove the 
              entries which contain ONLY whitespace.  The purpose of 
              this is to ensure that non-mandatory entry fields do not 
              pass values of "  "  or more to the database as values.
              Additionally, if everything is filled, it trims any 
              leading or trailing whitespaces.
PARAMETERS:   form
INHERITANCE:  isWhitespace(), stripWhitespace(), trimString()
------------------------------------------------------------------------*/
function clearWhiteSpace(form)
{
	for (var i = 0; i <= form.elements.length - 1; i++)
	{
		if (form.elements[i].type == "text") 
		{
			if (isWhitespace(form.elements[i].value)) 
			{
				form.elements[i].value = stripWhitespace(form.elements[i].value);				
			}
			else 
			{
				form.elements[i].value = trimString(form.elements[i].value, " ");
			}
		}
	}

	return true;
}


/* ----------------------------------------------------------------------
NAME:         isEmail
DESCRIPTION:  Email address must be of form a@b.c -- in other words:
              
			  - there must be at least one character before the @
              - there must be at least one character before and after 
			    the "."
              - the characters @ and . are both required

              For explanation of optional argument emptyOK, see 
              comments of function, isInteger().
PARAMETERS:   STRING s [, BOOLEAN emptyOK]
INHERITANCE:  isEmpty(), isWhitespace() 
------------------------------------------------------------------------*/
function isEmail(s)
{
	if (isEmpty(s)) 
       if (isEmail.arguments.length == 1) return defaultEmptyOK;
       else return (isEmail.arguments[1] == true);
   
    // is s whitespace?
    if (isWhitespace(s)) return false;
    
    // there must be >= 1 character before @, so we
    // start looking at character position 1 
    // (i.e. second character)
    var i = 1;
    var sLength = s.length;

    // look for @
    while ((i < sLength) && (s.charAt(i) != "@"))
    {
		i++
    }

    if ((i >= sLength) || (s.charAt(i) != "@")) return false;
    else i += 2;

    // look for .
    while ((i < sLength) && (s.charAt(i) != "."))
    {
		i++
    }

    // there must be at least one character after the .
    if ((i >= sLength - 1) || (s.charAt(i) != ".")) return false;
    else return true;
}


/* ----------------------------------------------------------------------
NAME:         checkEmail
DESCRIPTION:  Check that string theField.value is a valid Email.

              For explanation of optional argument emptyOK, see comments 
              of function isInteger.
PARAMETERS:   TEXTFIELD theField [, BOOLEAN emptyOK==false]
INHERITANCE:  isEmpty(), isWhitespace(), warnInvalid()
------------------------------------------------------------------------*/
function checkEmail(theField, fieldName, emptyOK)
{
var sMessage = "";
	if (isWhitespace(theField.value)) {
    	sMessage = "You did not enter a value in " + fieldName + "." 
    	if (!emptyOK) { 
    		sMessage = sMessage + "  This is a Mandatory field.  Please enter it now."
    	}
    	return displayMessage (theField, fieldName, sMessage);
    }	   
	
	if (!isEmail(theField.value, false)) 
	{
       sMessage = sMessage + "This field entry must be a valid e-mail address (like anyone@anywhere.com). Please reenter it now."
		return displayMessage (theField, fieldName, sMessage); 
	}   
	else return true;
}

/* ----------------------------------------------------------------------
NAME:         displayMessage
DESCRIPTION:  Displays system message
PARAMETERS:   theField, STRING fieldName, STRING sMessage
INHERITANCE:  None
------------------------------------------------------------------------*/
function displayMessage(theField, fieldName, sMessage)
{
	//focus on field only if it is not hidden (display=none)
	if (theField.style.display != "none") theField.focus();
    alert(stdErrorHeader + sMessage);
    return false;
}


/* ----------------------------------------------------------------------
NAME:         checkString
DESCRIPTION:  Returns true when value passed is a string
PARAMETERS:   STRING fieldName
INHERITANCE:  isEmpty(), isWhiteSpace()
------------------------------------------------------------------------*/

function checkString(theField, fieldName, emptyOK)
{
	var sMessage = "";
	
	// Next line is needed to avoid "undefined is not a number"
	// error in equality comparison below.
    if (checkString.arguments.length == 2) emptyOK = defaultEmptyOK;
    if ((emptyOK == true) && (isEmpty(theField.value))) return true;
    if (isWhitespace(theField.value)) {
    	sMessage = "You did not enter a value in " + fieldName + "." 
    	if (!emptyOK) { 
    		sMessage = sMessage + "  This is a Mandatory field.  Please enter it now."
    	}
    	return displayMessage (theField, fieldName, sMessage);
    }
    else return true;
}


/* ----------------------------------------------------------------------
NAME:         checkSelect
DESCRIPTION:  Returns false when select object is empty or no valid value (value=0) has been selected
PARAMETERS:   STRING fieldName
INHERITANCE:  None
------------------------------------------------------------------------*/

function checkSelect(theField, fieldName, emptyOK)
{
	var sMessage = "";
	var sIndex = theField.selectedIndex
    if (checkSelect.arguments.length == 2) emptyOK = defaultEmptyOK;
    if ((theField.length == 0) || (sIndex == -1 || theField.options[sIndex].value == "0")) {
    	if (emptyOK == true) return true;
    	else { 
    		sMessage = "You have not selected any values in " + fieldName + ".  This is a Mandatory field.  Please enter it now."
    		return displayMessage (theField, fieldName, sMessage);
    	}
    }
    else return true;
}

/* ----------------------------------------------------------------------
NAME:         checkTree
DESCRIPTION:  Returns false when no nodes found in tree
PARAMETERS:   STRING fieldName
INHERITANCE:  None
------------------------------------------------------------------------*/

function checkTree(theField, fieldName, emptyOK)
{
	var sMessage = "";
	var vTemp = theField.getAllChecked().length + theField.getAllUnchecked().length;
	
    if (checkTree.arguments.length == 2) emptyOK = defaultEmptyOK;
    if (vTemp == "0") {
    	if (emptyOK == true) return true;
    	else { 
    		sMessage = "You have not selected any values in " + fieldName + ".  This is a Mandatory field.  Please enter it now."
    		//do not call display message - will cause error because tree does not have style property
    		return alert(stdErrorHeader + sMessage);
    	}
    }
    else return true;
}

/* ----------------------------------------------------------------------
NAME:         checkSelectTree
DESCRIPTION:  Returns false when no values selected in Country list
PARAMETERS:   STRING fieldName
INHERITANCE:  None
------------------------------------------------------------------------*/

function checkSelectTree(theField, fieldName, emptyOK)
{
	var sMessage = "";
	var vTemp = theField.getAllChecked().length;
	
    if (checkSelectTree.arguments.length == 2) emptyOK = defaultEmptyOK;
    if (vTemp == 0) {
    	if (emptyOK == true) return false;
    	else { 
    		sMessage = "You have not selected any values in " + fieldName + ".  This is a Mandatory field.  Please enter it now."
    		//do not call display message - will cause error because tree does not have style property
    		return alert(stdErrorHeader + sMessage);
    	}
    }
    else return true;
}


/* ----------------------------------------------------------------------
NAME:         checkTEXTAREA
DESCRIPTION:  Uses the onKeyPress event handler to create a faux 
              MAXTEXTLENGTH attribute in a TEXTAREA element.
PARAMETERS:   theField, sTEXTAREAlength, emptyOK
INHERITANCE:  None
------------------------------------------------------------------------*/
function checkTEXTAREA(theField, s, sTEXTAREAlength, emptyOK) {
	
	if (checkTEXTAREA.arguments.length < 3) emptyOK = defaultEmptyOK;
	if (emptyOK == false && (isWhitespace(theField.value) || theField.value.length > sTEXTAREAlength)) {
		alert(stdErrorHeader + s + " is a mandatory field with a maximum limit of "  + sTEXTAREAlength + " characters. Please enter it now.");			
		theField.focus();
		return false;
	}

	if (emptyOK == true && theField.value.length > sTEXTAREAlength) {
		alert(stdErrorHeader + "The maximum limit for " + s + " field is " + sTEXTAREAlength + " characters.");
		theField.focus();
		return false;
	}
	else return true;
}

/* ----------------------------------------------------------------------
NAME:         checkDateSingleField
DESCRIPTION:  Returns true when value passed is a valid date
PARAMETERS:   STRING fieldName
INHERITANCE:  None
------------------------------------------------------------------------*/
function checkDateSingleField(theField, fieldName, emptyOK) 
{
	var sMessage = "";

	if (checkDateSingleField.arguments.length == 2) emptyOK = defaultEmptyOK;

    if ((isWhitespace(theField.value)) && (!emptyOK)) {
    	sMessage = "You did not enter a value in " + fieldName + ".  This is a Mandatory field.  Please enter it now.";
        return displayMessage (theField, fieldName, sMessage);    			
    }
    
    //Verify date
	if (isDate(theField.value)) return true
	else {
		sMessage = "You did not enter a valid date in " + fieldName + "."
		return displayMessage (theField, fieldName, sMessage);
	}	
}

/* ----------------------------------------------------------------------
NAME:         compareSingleFieldDates
DESCRIPTION:  Checks that the first date passed is equal to or earlier than the second date
			  Assumes mandatory fields have already been checked - therefore, if one or both dates are null, returns true.
PARAMETERS:   dateOne, dateTwo			  
INHERITANCE:  isEmpty ()
------------------------------------------------------------------------*/
function compareSingleFieldDates(dateOne, labelStringOne, dateTwo, labelStringTwo) {

	if (dateOne.value != "" && dateTwo.value != "")
		if (dateOne.value > dateTwo.value) {
			sDynamicMsg = labelStringOne + " must be equal to or earlier than " + labelStringTwo + ".";
			alert (stdErrorHeader + sDynamicMsg);
			return false;
		}	
		else return true;
	else return true;
}

/* ----------------------------------------------------------------------
NAME:         isDate
DESCRIPTION:  Checks to see if value passed is a valid date.
			  NULL values are returned at TRUE.
PARAMETERS:   STRING s
INHERITANCE:  isWhitespace()
------------------------------------------------------------------------*/
function isDate(s)
{		
	var pattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
	var vTemp = s.match(pattern); 
	var arrTemp = s.split("/");
	
	//If value is NULL or blank return as true
	if (isWhitespace(s)) return true;
	
	//If value matches the pattern and only 3 sections returned in split	
	if ((vTemp != null) && arrTemp.length == 3) {
		
		var vMonth = arrTemp[0];
		var vDay = arrTemp[1];
		var vYear = arrTemp[2];		
			
		if (vMonth < 0 || vMonth > 12) return false;
		if (vDay < 1 || vDay > 31) return false;
		if ((vMonth == 4 || vMonth == 6 || vMonth == 9 || vMonth == 11) && vDay == 31) return false;
		if (vMonth == 2){
			var isLeap = (vYear % 4 == 0 && (vYear % 100 != 0 || vYear % 400 == 0));
			if (vDay > 29 || (vDay == 29 && !isLeap)) return false;
		}		
		return true;		
	}
			
	else {		
		return false;
	}
}






