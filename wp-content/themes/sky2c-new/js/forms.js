function fullname(val)
{
	val1=document.getElementById(val).value
	var u =/^[a-zA-Z.& ]+$/;
	var c=u.test(val1);	
	if(c)
	{
	 Highlight(val,'#999999');
	return true;
	}
	else
	{
		Highlight(val,'#FF0080');
	return false;
	}
}


function selectcon(obj)
{
	if(document.getElementById(obj).value=='')
	{
		Highlight(obj,'#FF0080');

		return false;
	}
	else
	{
		Highlight(obj,'#999999');

		return true;
	}
}
function checkCountriesNotSame(obj,obj1)
{
	var c1 = document.getElementById(obj).value;
	var c2 = document.getElementById(obj1).value;
	if(C1==C2)
	{
		Highlight(obj,'#FF0080');

		return false;
	}
	else
	{
		Highlight(obj,'#999999');

		return true;
	}
}
function IsEmail(val)
{
	val1=document.getElementById(val).value
	//this is a regular expression
	var u = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var c=u.test(val1);	
	if(c)
	{
	 Highlight(val,'#999999');
	return true;
	}
	else
	{
		Highlight(val,'#FF0080');
	return false;
	}
}
function contact(val,minno,maxno)
{
	
	val1=document.getElementById(val).value
	var u =/^[0-9]+$/;
	var c=u.test(val1);	
	if ((val1.length>=minno && val1.length<=maxno) && (c))
	{
		Highlight(val,'#999999');
	return true;
	}
	else
	{
		Highlight(val,'#FF0080');
	return false;
	}
	
}
function checkInt(val)
{
	
	val1=document.getElementById(val).value
	var u =/^[0-9]+$/;
	var c=u.test(val1);	
	if (c)
	{
		Highlight(val,'#999999');
		return true;
	}
	else
	{
		Highlight(val,'#FF0080');
		return false;
	}
	
}
function check_checkbox(val) {	
	val1=document.getElementById(val).value;		
	if(val1.checked==false) {
		Highlight(val,'#999999');
		return true;
	} else {
		Highlight(val,'#FF0080');
		return false;
	}	
}
function Highlight(obj,col)
{
	document.getElementById(obj).style.border = col+' 1px solid';
	
}


function explode( delimiter, string, limit ) {
   
    var emptyArray = { 0: '' };
    
    // third argument is not required
    if ( arguments.length < 2
        || typeof arguments[0] == 'undefined'
        || typeof arguments[1] == 'undefined' )
    {
        return null;
    }
 
    if ( delimiter === ''
        || delimiter === false
        || delimiter === null )
    {
        return false;
    }
 
    if ( typeof delimiter == 'function'
        || typeof delimiter == 'object'
        || typeof string == 'function'
        || typeof string == 'object' )
    {
        return emptyArray;
    }
 
    if ( delimiter === true ) {
        delimiter = '1';
    }
    
    if (!limit) {
        return string.toString().split(delimiter.toString());
    } else {
        // support for limit argument
        var splitted = string.toString().split(delimiter.toString());
        var partA = splitted.splice(0, limit - 1);
        var partB = splitted.join(delimiter.toString());
        partA.push(partB);
        return partA;
    }
}
function trim (str, charlist) {
   
    var whitespace, l = 0, i = 0;
    str += '';
    
    if (!charlist) {
        // default list
        whitespace = " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    } else {
        // preg_quote custom list
        charlist += '';
        whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\$1');
    }
    
    l = str.length;
    for (i = 0; i < l; i++) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(i);
            break;
        }
    }
    
    l = str.length;
    for (i = l - 1; i >= 0; i--) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(0, i + 1);
            break;
        }
    }
    
    return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}


jQuery(window).load(function(){ 
	jQuery('#sapp1').submit(function(){   
		jQuery.post("http://www.0pointloan.com/send-smallapp.php?smbf1=1", jQuery("#sapp1").serialize(),  function(response) {
		//alert(response);
		if(response == 1) { 
			jQuery("a[aria-controls='step-2'").tab('show');
		} else if(response == 0) { alert("Check first part of form."); }
			});
		return false; 
	});
});

jQuery(window).load(function(){
	jQuery('#sapp2').submit(function(){
		jQuery.post("http://www.0pointloan.com/send-smallapp.php?smbf2=1", jQuery("#sapp2").serialize(),  function(response) {
			//alert(response);
			if(response ==1) {	
					jQuery("a[aria-controls='step-3'").tab('show');
			} else if(response =="step1") {
					alert("First fill first step information.");
					jQuery("a[aria-controls='step-1'").tab('show');	
			}
			
			});
		return false; 
	});
});

jQuery(window).load(function(){
	jQuery('#sapp3').submit(function(){
		jQuery.post("http://www.0pointloan.com/send-smallapp.php?smbf3=1", jQuery("#sapp3").serialize(),  function(response) {
			//alert(response);
			if(response =="step1") {
					alert("First fill first step information.");
					jQuery("a[aria-controls='step-1'").tab('show');	
			} else if(response =="step2") {
					alert("First fill second step information.");
					jQuery("a[aria-controls='step-2'").tab('show');
			}
			else {
				if(response == 1) { 
					window.location.href = 'http://www.0pointloan.com/thanks.php';	
				} else if(response == 0) { alert("no"); }

			}
			
			});
		return false; 
	});
});

jQuery('#rateqbtn').click(function(){
		var er=0;
		var foc =''; 						   
		var qstate = document.getElementById("qstate").value;
		var name = document.getElementById("name").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("phone").value;
		
		if (selectcon('qstate')==false) { 
			if(er==0)
			foc = 'qstate';
			er=1;
		}			
		if (selectcon('name')==false) { 
			if(er==0)
			foc = 'name';
			er=1;
		}
		if (IsEmail('email')==false) { 
			if(er==0)
			foc = 'email';
			er=1;
		}
		if (contact('phone',10,13)==false) { 
			if(er==0)
			foc = 'phone';
			er=1;
		}
		
		if(er==1) {
			document.getElementById(foc).focus();
			return false;
		} 
		
});
