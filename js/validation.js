function fullname(val) {
	val1=document.getElementById(val).value;
	//var u =/^[a-zA-Z.&]+$/;
	var u = /^[a-zA-Z ]+$/;
	var c=u.test(val1);	
	if(c) {
	 Highlight(val,'#898989');
	return true; 
	} else {
		Highlight(val,'red');
	return false; }
}
function alphanumeric(val) {
	val1=document.getElementById(val).value;
	//var u =/^[a-zA-Z.&]+$/;
	var u = /^[0-9a-zA-Z ]+$/;
	var c=u.test(val1);	
	if((val1.length<=8) && (c)) {
	 Highlight(val,'#898989');
	return true; 
	} else {
		Highlight(val,'red');
	return false; }
}
function selectcon(obj) {
	if(document.getElementById(obj).value=='') {
		Highlight(obj,'red');
		return false;
	} else {
	Highlight(obj,'#898989');
		return true;
	} 
}
function checkAgreeBox(obj) {
	if(jQuery("#agree").prop('checked') == false){
		Highlight("agreebox",'red');
		return false;
	} else {
		Highlight("agreebox",'#898989');
		return true;
	} 
}
function checkAgreeBox1(obj) {
	if(jQuery("#agree1").prop('checked') == false){
		Highlight("agreebox1",'red');
		return false;
	} else {
		Highlight("agreebox1",'#898989');
		return true;
	} 
}

function IsEmail(val) {
	val1=document.getElementById(val).value;
	//this is a regular expression
	var u = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var c=u.test(val1);	
	if(c) {
	 Highlight(val,'#898989');
	return true;
	} else {
		Highlight(val,'red');
	return false;
	}
}
function contact(val,minno,maxno) {
	//var maxno = 20;
	val1=document.getElementById(val).value;
	var u =/^[0-9]+$/;
	//var u = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
	var c=u.test(val1);	
	if ((val1.length>=minno && val1.length<=maxno) && (c)) {
		Highlight(val,'#898989');
	return true;
	} else {
		Highlight(val,'red');
	return false;
	}
}
function contactCustom(val,minno,maxno) {
	var maxno = 16;
	val1=document.getElementById(val).value;
	var u = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
	var c=u.test(val1);	
	if ((val1.length>=minno && val1.length<=maxno) && (c)) {
		Highlight(val,'#898989');
	return true;
	} else {
		Highlight(val,'red');
	return false;
	}
}
function contactCustomWithCountryCode(val,minno,maxno) {
	var maxno = 16;
	val1=document.getElementById(val).value;
	var u = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
	var c=u.test(val1);	
	if (u.test(val1)) {
		Highlight(val,'#898989');
		return true;
	} else {
		Highlight(val,'red');
		return false;
	}
}
//function Highlight(obj,col,objtd,img,objmsg) {
function Highlight(obj,col) { 
	document.getElementById(obj).style.borderBottom = col + ' 1px solid ';
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
//air order form validation starts here
function checkAirOrderForm() { 
	// alert('hi there');
	var er=0;
	var foc ='';
	var shipper_name = jQuery("#shipper_name").val();
	var spouse_name = jQuery("#spouse_name").val();
	var shipper_usa_address = jQuery("#shipper_usa_address").val();
	var shipper_usa_city = jQuery("#shipper_usa_city").val();
	var shipper_usa_state = jQuery("#shipper_usa_state").val();
	var shipper_usa_zip = jQuery("#shipper_usa_zip").val();	
  	var contact_home_no = jQuery("#contact_home_no").val();
	var contact_cell = jQuery("#contact_cell").val();
	var contact_email = jQuery("#contact_email").val();
		
	var pickup_address = jQuery("#pickup_address").val();
	var pickup_city = jQuery("#pickup_city").val();
	var pickup_state = jQuery("#pickup_state").val();
	var pickup_zip = jQuery("#pickup_zip").val();
	
	var consignee_name = jQuery("#consignee_name").val();
	var consignee_address = jQuery("#consignee_address").val();
	var consignee_city = jQuery("#consignee_city").val();
	var consignee_country = jQuery("#consignee_country").val();
	var consignee_tel_no = jQuery("#consignee_tel_no").val();
	var consignee_email = jQuery("#consignee_email").val();	
	
	var response = grecaptcha.getResponse();
	
	/*var receiver_name = jQuery("#receiver_name").val();
	var receiver_address = jQuery("#receiver_address").val();
	var receiver_city = jQuery("#receiver_city").val();
	var receiver_country = jQuery("#receiver_country").val();
	var receiver_tel_no = jQuery("#receiver_tel_no").val();
	var receiver_email = jQuery("#receiver_email").val();*/
	
	if (fullname('shipper_name')==false) { if(er==0) foc = 'shipper_name'; er=1; }
	if (fullname('spouse_name')==false) { if(er==0) foc = 'spouse_name'; er=1; }
	if (selectcon('shipper_usa_address')==false) { if(er==0) foc = 'shipper_usa_address'; er=1; }
	if (fullname('shipper_usa_city')==false) { if(er==0) foc = 'shipper_usa_city'; er=1; }
	if (selectcon('shipper_usa_state')==false) { if(er==0) foc = 'shipper_usa_state'; er=1; }
	if (selectcon('shipper_usa_zip')==false) { if(er==0) foc = 'shipper_usa_zip'; er=1; }	
	/*if (contact('contact_home_no',10,13)==false) { if(er==0) foc = 'contact_home_no'; er=1; }	
	if (contact('contact_cell',10,13)==false) { if(er==0) foc = 'contact_cell'; er=1; }	*/
	if (IsEmail('contact_email')==false) { if(er==0) foc = 'contact_email'; er=1; }
	if (selectcon('pickup_address')==false) { if(er==0) foc = 'pickup_address'; er=1; }
	if (fullname('pickup_city')==false) { if(er==0) foc = 'pickup_city'; er=1; }
	if (selectcon('pickup_state')==false) { if(er==0) foc = 'pickup_state'; er=1; }
	if (selectcon('pickup_zip')==false) { if(er==0) foc = 'pickup_zip'; er=1; }	
	if (fullname('consignee_name')==false) { if(er==0) foc = 'consignee_name'; er=1; }
	if (selectcon('consignee_address')==false) { if(er==0) foc = 'consignee_address'; er=1; }
	if (fullname('consignee_city')==false) { if(er==0) foc = 'consignee_city'; er=1; }
	if (fullname('consignee_country')==false) { if(er==0) foc = 'consignee_country'; er=1; }
	if (contactCustomWithCountryCode('consignee_tel_no',10,20)==false) { if(er==0) foc = 'consignee_tel_no'; er=1; }		
	if (IsEmail('consignee_email')==false) { if(er==0) foc = 'consignee_email'; er=1; }
	/*if (selectcon('receiver_name')==false) { if(er==0) foc = 'receiver_name'; er=1; }
	if (selectcon('receiver_address')==false) { if(er==0) foc = 'receiver_address'; er=1; }
	if (selectcon('receiver_city')==false) { if(er==0) foc = 'receiver_city'; er=1; }
	if (selectcon('receiver_country')==false) { if(er==0) foc = 'receiver_country'; er=1; }
	if (contact('receiver_tel_no',10,13)==false) { if(er==0) foc = 'receiver_tel_no'; er=1; }	
	if (IsEmail('receiver_email')==false) { if(er==0) foc = 'receiver_email'; er=1; }*/
	
	if (checkAgreeBox('agree')==false) { if(er==0) foc = 'agreebox'; er=1; }
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
	
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}
//air order form validation ends here

jQuery(function(){ 
	//air order form coding starts here			
	jQuery("#aoaddmorebtn").click(function(){
	    var markup = '<tr><td><div class="form-group"><input type="text" name="pickup_request_srno[]" id="pickup_request_srno" class="form-control"></div></td><td><div class="form-group"><input type="text" name="pickup_request_boxes_quantity[]" id="pickup_request_boxes_quantity" class="form-control"></div></td><td><div class="form-group"><input type="text" name="pickup_request_dimension[]" id="pickup_request_dimension" class="form-control"></div></td><td><div class="form-group"><input type="text" name="pickup_request_weight[]" id="pickup_request_weight" class="form-control"></div></td></tr>';
		jQuery("#aopickupreqtable tbody").append(markup);				  
	});
	
	jQuery("#checkSameAddr").on('click', function () { 
		var shipper_usa_address = jQuery("#shipper_usa_address").val();	
		var shipper_usa_city = jQuery("#shipper_usa_city").val();	
		var shipper_usa_state = jQuery("#shipper_usa_state").val();	
		var shipper_usa_zip = jQuery("#shipper_usa_zip").val();	
		
		if(jQuery("#checkSameAddr").prop('checked') == true){
			document.getElementById("pickup_address").value = shipper_usa_address;
			document.getElementById("pickup_city").value = shipper_usa_city;
			document.getElementById("pickup_state").value = shipper_usa_state;
			document.getElementById("pickup_zip").value = shipper_usa_zip;
		} else {
			jQuery("#pickup_address").val("");
			jQuery("#pickup_city").val("");
			jQuery("#pickup_state").val("");
			jQuery("#pickup_zip").val("");
		}		
	});
	//air order form coding ends here
	
	//LCL form coding starts here
	jQuery("#checkSameAddrLcl").on('click', function () { 
		var consignee_name = jQuery("#consignee_name").val();	
		var consignee_address = jQuery("#consignee_address").val();	
		var consignee_city = jQuery("#consignee_city").val();	
		var consignee_country = jQuery("#consignee_country").val();
		var consignee_tel_no = jQuery("#consignee_tel_no").val();
		var consignee_email = jQuery("#consignee_email").val();
		
		if(jQuery("#checkSameAddrLcl").prop('checked') == true){
			document.getElementById("receiver_name").value = consignee_name;
			document.getElementById("receiver_address").value = consignee_address;
			document.getElementById("receiver_city").value = consignee_city;
			document.getElementById("receiver_country").value = consignee_country;
			document.getElementById("receiver_tel_no").value = consignee_tel_no;
			document.getElementById("receiver_email").value = consignee_email;
		} else {
			jQuery("#receiver_name").val("");
			jQuery("#receiver_address").val("");
			jQuery("#receiver_city").val("");
			jQuery("#receiver_country").val("");
			jQuery("#receiver_tel_no").val("");
			jQuery("#receiver_email").val("");
		}		
	});
	//LCL form coding ends here
	
	//air order form coding starts here
	jQuery("#checkSameAddrAo").on('click', function () { 
		var consignee_name = jQuery("#consignee_name").val();	
		var consignee_address = jQuery("#consignee_address").val();	
		var consignee_city = jQuery("#consignee_city").val();	
		var consignee_country = jQuery("#consignee_country").val();
		var consignee_tel_no = jQuery("#consignee_tel_no").val();
		var consignee_email = jQuery("#consignee_email").val();
		
		if(jQuery("#checkSameAddrAo").prop('checked') == true){
			document.getElementById("receiver_name").value = consignee_name;
			document.getElementById("receiver_address").value = consignee_address;
			document.getElementById("receiver_city").value = consignee_city;
			document.getElementById("receiver_country").value = consignee_country;
			document.getElementById("receiver_tel_no").value = consignee_tel_no;
			document.getElementById("receiver_email").value = consignee_email;
		} else {
			jQuery("#receiver_name").val("");
			jQuery("#receiver_address").val("");
			jQuery("#receiver_city").val("");
			jQuery("#receiver_country").val("");
			jQuery("#receiver_tel_no").val("");
			jQuery("#receiver_email").val("");
		}		
	});
	//air order form coding ends here
	
	//FCL form coding part starts here
	jQuery("#veh_shipping").change(function(){ 
		var vehshippingval = jQuery("#veh_shipping").val();
		jQuery("#veh_shipping_other").html('');
		
		if(vehshippingval == 1) {
			jQuery("#veh_shipping_other").html('');
		} else {
			for(var i=1; i < vehshippingval; i++) {
				var markup = '<div class="row inner-form1-content"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><input type="text" name="veh_model[]" id="veh_model" class="form-control" placeholder=" "><label for="veh_model">Model of Vehicle</label></div></div></div><div class="row inner-form1-content"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><input type="text" name="veh_year[]" id="veh_year" class="form-control" placeholder=" "><label for="veh_year">Year of Vehicle</label></div></div></div>';
				jQuery("#veh_shipping_other").append(markup);				  
			} 
		}
	});
	//FCL form coding part ends here
	
	//Order form coding part starts here
	var count = 3;
	jQuery("#addmoreorderbtn").on('click', function () { 
		count = count + 1;											 
		var markup = '<tr><td><div class=form-group><select class="form-control designer-select" name=PackageType[] id=PackageType'+count+'><option selected="selected" value="Boxes">Boxes</option><option value="Pallets">Pallets</option><option value="Crates">Crates</option><option value="Full Containers">Full Containers</option><option value="Loose Furniture">Loose Furniture</option><option value="Full Truck Load">Full Truck Load</option><option value="Others">Others</option></select></div></td><td><div class=form-group><input class=form-control type=text name=Numbers'+count+' id=Numbers'+count+' size=5 value=0 onblur=calc("Numbers'+count+'","Length'+count+'","Width'+count+'","Height'+count+'","GrossWeight'+count+'","CubicFeet'+count+'","CubicWeight'+count+'","quote") /></div></td><td><div class=form-group><input class=form-control type=text name=Length'+count+' id=Length'+count+' size=5 value=0 onblur=calc("Numbers'+count+'","Length'+count+'","Width'+count+'","Height'+count+'","GrossWeight'+count+'","CubicFeet'+count+'","CubicWeight'+count+'","quote") /></div></td><td><div class=form-group><input class=form-control type=text name=Width'+count+' id=Width'+count+' size=5 value=0 onblur=calc("Numbers'+count+'","Length'+count+'","Width'+count+'","Height'+count+'","GrossWeight'+count+'","CubicFeet'+count+'","CubicWeight'+count+'","quote") /></div></td><td><div class=form-group><input class=form-control type=text name=Height'+count+' id=Height'+count+' size=5 value=0 onblur=calc("Numbers'+count+'","Length'+count+'","Width'+count+'","Height'+count+'","GrossWeight'+count+'","CubicFeet'+count+'","CubicWeight'+count+'","quote") /></div></td><td><div class=form-group><input class=form-control type=text name=GrossWeight'+count+' id=GrossWeight'+count+' size=5 value=0 onblur=calc("Numbers'+count+'","Length'+count+'","Width'+count+'","Height'+count+'","GrossWeight'+count+'","CubicFeet'+count+'","CubicWeight'+count+'","quote") /></div></td><td><div class=form-group><input class=form-control type=text name=CubicFeet'+count+' id=CubicFeet'+count+' size=5 value=0 onblur=calc("Numbers'+count+'","Length'+count+'","Width'+count+'","Height'+count+'","GrossWeight'+count+'","CubicFeet'+count+'","CubicWeight'+count+'","quote") /></div></td><td><div class=form-group><input class=form-control type=text name=CubicWeight'+count+' id=CubicWeight'+count+' size=5 value=0 onblur=calc("Numbers'+count+'","Length'+count+'","Width'+count+'","Height'+count+'","GrossWeight'+count+'","CubicFeet'+count+'","CubicWeight'+count+'","quote") /></div></td></tr>';
		jQuery("#packingprovider tbody").append(markup);	
	});
	//Order form coding part ends here
	
});

jQuery("#shipper_name").keyup(function(){ 
	var shippername = jQuery("#shipper_name").val(); 
	if(shippername!=""){ 
		document.getElementById("shipper_sign").value = shippername;
	}
});
jQuery("#fcl_shipper_name").keyup(function(){ 
	var shippername = jQuery("#fcl_shipper_name").val(); 
	if(shippername!=""){ 
		document.getElementById("fcl_shipper_sign").value = shippername;
	}
});

//fcl form validation starts here
function checkFCLForm() { 
	var er=0;
	var foc ='';
	var fcl_shipper_name = jQuery("#fcl_shipper_name").val();
	var spouse_name = jQuery("#spouse_name").val();
	var shipper_usa_address = jQuery("#shipper_usa_address").val();
	var shipper_usa_city = jQuery("#shipper_usa_city").val();
	var shipper_usa_state = jQuery("#shipper_usa_state").val();
	var shipper_usa_zip = jQuery("#shipper_usa_zip").val();	
  	var shipper_home_phone = jQuery("#shipper_home_phone").val();
	var shipper_cell_phone = jQuery("#shipper_cell_phone").val();
	var shipper_email = jQuery("#shipper_email").val();
	
	var container_loading_address = jQuery("#container_loading_address").val();
	var container_loading_city = jQuery("#container_loading_city").val();
	var container_loading_state = jQuery("#container_loading_state").val();
	var container_loading_zip = jQuery("#container_loading_zip").val();
	
	var consignee_name = jQuery("#consignee_name").val();
	var consignee_address = jQuery("#consignee_address").val();
	var consignee_city = jQuery("#consignee_city").val();
	var consignee_country = jQuery("#consignee_country").val();
	var consignee_tel_no = jQuery("#consignee_tel_no").val();
	var consignee_email = jQuery("#consignee_email").val();	
	
	var response = grecaptcha.getResponse();
	
	if (fullname('fcl_shipper_name')==false) { if(er==0) foc = 'fcl_shipper_name'; er=1; }
	if (fullname('spouse_name')==false) { if(er==0) foc = 'spouse_name'; er=1; }
	if (selectcon('shipper_usa_address')==false) { if(er==0) foc = 'shipper_usa_address'; er=1; }
	if (fullname('shipper_usa_city')==false) { if(er==0) foc = 'shipper_usa_city'; er=1; }
	if (selectcon('shipper_usa_state')==false) { if(er==0) foc = 'shipper_usa_state'; er=1; }
	if (selectcon('shipper_usa_zip')==false) { if(er==0) foc = 'shipper_usa_zip'; er=1; }	
	if (contactCustomWithCountryCode('shipper_home_phone',10,20)==false) { if(er==0) foc = 'shipper_home_phone'; er=1; }	
	if (contactCustomWithCountryCode('shipper_cell_phone',10,20)==false) { if(er==0) foc = 'shipper_cell_phone'; er=1; }	
	if (IsEmail('shipper_email')==false) { if(er==0) foc = 'shipper_email'; er=1; }	
	if (selectcon('container_loading_address')==false) { if(er==0) foc = 'container_loading_address'; er=1; }
	if (fullname('container_loading_city')==false) { if(er==0) foc = 'container_loading_city'; er=1; }
	if (selectcon('container_loading_state')==false) { if(er==0) foc = 'container_loading_state'; er=1; }
	if (selectcon('container_loading_zip')==false) { if(er==0) foc = 'container_loading_zip'; er=1; }	
	
	if (fullname('consignee_name')==false) { if(er==0) foc = 'consignee_name'; er=1; }
	if (selectcon('consignee_address')==false) { if(er==0) foc = 'consignee_address'; er=1; }
	if (fullname('consignee_city')==false) { if(er==0) foc = 'consignee_city'; er=1; }
	if (selectcon('consignee_country')==false) { if(er==0) foc = 'consignee_country'; er=1; }
	if (contactCustomWithCountryCode('consignee_tel_no',10,20)==false) { if(er==0) foc = 'consignee_tel_no'; er=1; }		
	if (IsEmail('consignee_email')==false) { if(er==0) foc = 'consignee_email'; er=1; }
	
	if (checkAgreeBox('agree')==false) { if(er==0) foc = 'agreebox'; er=1; }
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
	
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}
//fcl form validation ends here

//lcl form validation starts here
function checkLclOrderForm() { 
	// alert('hi there' );
	var er=0;
	var foc ='';
	var shipper_name = jQuery("#shipper_name").val();
	var spouse_name = jQuery("#spouse_name").val();
	var shipper_usa_address = jQuery("#shipper_usa_address").val();
	var shipper_usa_city = jQuery("#shipper_usa_city").val();
	var shipper_usa_state = jQuery("#shipper_usa_state").val();
	var shipper_usa_zip = jQuery("#shipper_usa_zip").val();	
  	var contact_home_no = jQuery("#contact_home_no").val();
	var contact_cell = jQuery("#contact_cell").val();
	var contact_email = jQuery("#contact_email").val();
		
	var pickup_address = jQuery("#pickup_address").val();
	var pickup_city = jQuery("#pickup_city").val();
	var pickup_state = jQuery("#pickup_state").val();
	var pickup_zip = jQuery("#pickup_zip").val();
	
	var consignee_name = jQuery("#consignee_name").val();
	var consignee_address = jQuery("#consignee_address").val();
	var consignee_city = jQuery("#consignee_city").val();
	var consignee_country = jQuery("#consignee_country").val();
	var consignee_tel_no = jQuery("#consignee_tel_no").val();
	var consignee_email = jQuery("#consignee_email").val();	
	
	var receiver_name = jQuery("#receiver_name").val();
	var receiver_address = jQuery("#receiver_address").val();
	var receiver_city = jQuery("#receiver_city").val();
	var receiver_country = jQuery("#receiver_country").val();
	var receiver_tel_no = jQuery("#receiver_tel_no").val();
	var receiver_email = jQuery("#receiver_email").val();
	
	var response = grecaptcha.getResponse();
	
	if (fullname('shipper_name')==false) { if(er==0) foc = 'shipper_name'; er=1; }
	if (fullname('spouse_name')==false) { if(er==0) foc = 'spouse_name'; er=1; }
	if (selectcon('shipper_usa_address')==false) { if(er==0) foc = 'shipper_usa_address'; er=1; }
	if (fullname('shipper_usa_city')==false) { if(er==0) foc = 'shipper_usa_city'; er=1; }
	if (selectcon('shipper_usa_state')==false) { if(er==0) foc = 'shipper_usa_state'; er=1; }
	if (selectcon('shipper_usa_zip')==false) { if(er==0) foc = 'shipper_usa_zip'; er=1; }	
	if (contactCustomWithCountryCode('contact_home_no',10,20)==false) { if(er==0) foc = 'contact_home_no'; er=1; }	
	if (contactCustomWithCountryCode('contact_cell',10,20)==false) { if(er==0) foc = 'contact_cell'; er=1; }	
	if (IsEmail('contact_email')==false) { if(er==0) foc = 'contact_email'; er=1; }
	if (selectcon('pickup_address')==false) { if(er==0) foc = 'pickup_address'; er=1; }
	if (selectcon('pickup_city')==false) { if(er==0) foc = 'pickup_city'; er=1; }
	if (selectcon('pickup_state')==false) { if(er==0) foc = 'pickup_state'; er=1; }
	if (selectcon('pickup_zip')==false) { if(er==0) foc = 'pickup_zip'; er=1; }	
	if (fullname('consignee_name')==false) { if(er==0) foc = 'consignee_name'; er=1; }
	if (selectcon('consignee_address')==false) { if(er==0) foc = 'consignee_address'; er=1; }
	if (fullname('consignee_city')==false) { if(er==0) foc = 'consignee_city'; er=1; }
	if (selectcon('consignee_country')==false) { if(er==0) foc = 'consignee_country'; er=1; }
	if (contactCustomWithCountryCode('consignee_tel_no',10,20)==false) { if(er==0) foc = 'consignee_tel_no'; er=1; }		
	if (IsEmail('consignee_email')==false) { if(er==0) foc = 'consignee_email'; er=1; }
	if (fullname('receiver_name')==false) { if(er==0) foc = 'receiver_name'; er=1; }
	if (selectcon('receiver_address')==false) { if(er==0) foc = 'receiver_address'; er=1; }
	if (fullname('receiver_city')==false) { if(er==0) foc = 'receiver_city'; er=1; }
	if (selectcon('receiver_country')==false) { if(er==0) foc = 'receiver_country'; er=1; }
	if (contactCustomWithCountryCode('receiver_tel_no',10,20)==false) { if(er==0) foc = 'receiver_tel_no'; er=1; }	
	if (IsEmail('receiver_email')==false) { if(er==0) foc = 'receiver_email'; er=1; }
	
	if (checkAgreeBox('agree')==false) { if(er==0) foc = 'agreebox'; er=1; }
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
	//if(jQuery("#agree").prop('checked') == false){ if(er==0) document.getElementById("agreebox").style.border = "1px solid red"; er=1; return false; } 
	
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}
//lcl form validation ends here

//home page form validation starts here
function checkbtnclick() { 
	var er=0;
	var foc ='';
	var FromZip = jQuery("#FromZip").val();
	var ToZip = jQuery("#ToZip").val();
	var Fromcountry = jQuery("#Fromcountry").val();
	var Tocountry = jQuery("#Tocountry").val();
	var fname = jQuery("#fname").val();
	var lname = jQuery("#lname").val();	
  	var EmailAddress = jQuery("#EmailAddress").val();
	var CellPhone = jQuery("#CellPhone").val();
	var Comments = jQuery("#Comments").val();
	
	var response = grecaptcha.getResponse();
	
	if (alphanumeric('FromZip')==false) { if(er==0) foc = 'FromZip'; er=1; }	
	if (alphanumeric('ToZip')==false) { if(er==0) foc = 'ToZip'; er=1; }	
	//if (contact('FromZip',4,6)==false) { if(er==0) foc = 'FromZip'; er=1; }
	//if (contact('ToZip',4,6)==false) { if(er==0) foc = 'ToZip'; er=1; }
	if (selectcon('Fromcountry')==false) { if(er==0) foc = 'Fromcountry'; er=1; }
	if (selectcon('Tocountry')==false) { if(er==0) foc = 'Tocountry'; er=1; }
	if (fullname('fname')==false) { if(er==0) foc = 'fname'; er=1; }
	if (fullname('lname')==false) { if(er==0) foc = 'lname'; er=1; }
	if (IsEmail('EmailAddress')==false) { if(er==0) foc = 'EmailAddress'; er=1; }	
	if (contactCustomWithCountryCode('CellPhone',10,20)==false) { if(er==0) foc = 'CellPhone'; er=1; }
	if (selectcon('Comments')==false) { if(er==0) foc = 'Comments'; er=1; }
	
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
	
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} else {
		jQuery('#btnSubmit').attr("disabled", "true");
		jQuery('.form-submit-loader').show();
		var data = "ToZip="+ToZip+"&FromZip="+FromZip+"&Fromcountry="+Fromcountry+"&fname="+fname+"&lname="+lname+ "&Tocountry="+Tocountry+"&EmailAddress="+EmailAddress+"&CellPhone="+CellPhone+"&Comments="+Comments+"&qf=1";
		  jQuery.ajax({
			type: "POST",
			url: "http://localhost/sky2c/process_form.php",
			data: data,
			success: function(message) {
				//alert("Server::"+message);
				if(message == "sucess"){
				var source = 'sky2c';							
				window.location="https://www.sky2c.com/thanks.htm"; /* }, delay);*/
				
				jQuery("#ToZip").val("");
				jQuery("#FromZip").val("");  
				jQuery("#EmailAddress").val("");
				jQuery("#CellPhone").val("");
				jQuery("#Comments").val("");
				jQuery("#security_code").val("");
				jQuery("#fname").val("");
				jQuery("#lname").val("");
				jQuery('.form-submit-loader').hide();
				jQuery('#btnSubmit').removeAttr("disabled");
           } else if (message == "Invalid captcha") {
                jQuery('.form-submit-loader').hide();
				jQuery('#btnSubmit').removeAttr("disabled");
				
				jQuery("#message_box").removeClass("error").addClass("error");
				jQuery("#message_box").html(message);	
				jQuery("#security_code").focus();	
		   } else {
		        jQuery('.form-submit-loader').hide();
				jQuery('#btnSubmit').removeAttr("disabled");
				/*alert(message);*/
           }
        }//sucess function
        }); // ajax
		/*jQuery('#btnSubmit').removeAttr("disabled");*/
	}
}
//home page form validation ends here

//domestic order form validation starts here
function checkDomesticOrderForm() { 
	// alert('hi there');
	var er=0;
	var foc ='';
	var shipper_name = jQuery("#shipper_name").val();
	var spouse_name = jQuery("#spouse_name").val();
	var shipper_usa_address = jQuery("#shipper_usa_address").val();
	var shipper_usa_city = jQuery("#shipper_usa_city").val();
	var shipper_usa_state = jQuery("#shipper_usa_state").val();
	var shipper_usa_zip = jQuery("#shipper_usa_zip").val();	
  	var contact_home_no = jQuery("#contact_home_no").val();
	var contact_cell = jQuery("#contact_cell").val();
	var contact_email = jQuery("#contact_email").val();
		
	var pickup_address = jQuery("#pickup_address").val();
	var pickup_city = jQuery("#pickup_city").val();
	var pickup_state = jQuery("#pickup_state").val();
	var pickup_zip = jQuery("#pickup_zip").val();
	
	var consignee_name = jQuery("#consignee_name").val();
	var consignee_address = jQuery("#consignee_address").val();
	var consignee_city = jQuery("#consignee_city").val();
	var consignee_country = jQuery("#consignee_country").val();
	var consignee_tel_no = jQuery("#consignee_tel_no").val();
	var consignee_email = jQuery("#consignee_email").val();	
	
	var response = grecaptcha.getResponse();
		
	if (fullname('shipper_name')==false) { if(er==0) foc = 'shipper_name'; er=1; }
	if (fullname('spouse_name')==false) { if(er==0) foc = 'spouse_name'; er=1; }
	if (selectcon('shipper_usa_address')==false) { if(er==0) foc = 'shipper_usa_address'; er=1; }
	if (fullname('shipper_usa_city')==false) { if(er==0) foc = 'shipper_usa_city'; er=1; }
	if (selectcon('shipper_usa_state')==false) { if(er==0) foc = 'shipper_usa_state'; er=1; }
	if (selectcon('shipper_usa_zip')==false) { if(er==0) foc = 'shipper_usa_zip'; er=1; }	
	if (contactCustomWithCountryCode('contact_home_no',10,20)==false) { if(er==0) foc = 'contact_home_no'; er=1; }	
	if (contactCustomWithCountryCode('contact_cell',10,20)==false) { if(er==0) foc = 'contact_cell'; er=1; }	
	if (IsEmail('contact_email')==false) { if(er==0) foc = 'contact_email'; er=1; }
	if (selectcon('pickup_address')==false) { if(er==0) foc = 'pickup_address'; er=1; }
	if (selectcon('pickup_city')==false) { if(er==0) foc = 'pickup_city'; er=1; }
	if (selectcon('pickup_state')==false) { if(er==0) foc = 'pickup_state'; er=1; }
	if (selectcon('pickup_zip')==false) { if(er==0) foc = 'pickup_zip'; er=1; }	
	if (fullname('consignee_name')==false) { if(er==0) foc = 'consignee_name'; er=1; }
	if (selectcon('consignee_address')==false) { if(er==0) foc = 'consignee_address'; er=1; }
	if (fullname('consignee_city')==false) { if(er==0) foc = 'consignee_city'; er=1; }
	if (selectcon('consignee_country')==false) { if(er==0) foc = 'consignee_country'; er=1; }
	if (contactCustomWithCountryCode('consignee_tel_no',10,20)==false) { if(er==0) foc = 'consignee_tel_no'; er=1; }		
	if (IsEmail('consignee_email')==false) { if(er==0) foc = 'consignee_email'; er=1; }
		
	if (checkAgreeBox('agree')==false) { if(er==0) foc = 'agreebox'; er=1; }
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; } 
	
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}
//domestic order form validation ends here

//roro form validation starts here
function checkRoOrderForm() { 
	var er=0;
	var foc ='';
	var fcl_shipper_name = jQuery("#fcl_shipper_name").val();
	var spouse_name = jQuery("#spouse_name").val();
	var shipper_usa_address = jQuery("#shipper_usa_address").val();
	var shipper_usa_city = jQuery("#shipper_usa_city").val();
	var shipper_usa_state = jQuery("#shipper_usa_state").val();
	var shipper_usa_zip = jQuery("#shipper_usa_zip").val();	
  	var shipper_home_phone = jQuery("#shipper_home_phone").val();
	var shipper_cell_phone = jQuery("#shipper_cell_phone").val();
	var shipper_email = jQuery("#shipper_email").val();
	
	var vehicles_pickup_address = jQuery("#vehicles_pickup_address").val();
	var vehicles_pickup_city = jQuery("#vehicles_pickup_city").val();
	var vehicles_pickup_state = jQuery("#vehicles_pickup_state").val();
	var vehicles_pickup_zip = jQuery("#vehicles_pickup_zip").val();
	
	var veh_model = jQuery("#veh_model").val();
	var veh_year = jQuery("#veh_year").val();
	
	var consignee_name = jQuery("#consignee_name").val();
	var consignee_address = jQuery("#consignee_address").val();
	var consignee_city = jQuery("#consignee_city").val();
	var consignee_country = jQuery("#consignee_country").val();
	var consignee_tel_no = jQuery("#consignee_tel_no").val();
	var consignee_email = jQuery("#consignee_email").val();	
	
	var response = grecaptcha.getResponse();
	
	if (fullname('fcl_shipper_name')==false) { if(er==0) foc = 'fcl_shipper_name'; er=1; }
	if (fullname('spouse_name')==false) { if(er==0) foc = 'spouse_name'; er=1; }
	if (selectcon('shipper_usa_address')==false) { if(er==0) foc = 'shipper_usa_address'; er=1; }
	if (fullname('shipper_usa_city')==false) { if(er==0) foc = 'shipper_usa_city'; er=1; }
	if (selectcon('shipper_usa_state')==false) { if(er==0) foc = 'shipper_usa_state'; er=1; }
	if (selectcon('shipper_usa_zip')==false) { if(er==0) foc = 'shipper_usa_zip'; er=1; }	
	if (contactCustomWithCountryCode('shipper_home_phone',10,20)==false) { if(er==0) foc = 'shipper_home_phone'; er=1; }	
	if (contactCustomWithCountryCode('shipper_cell_phone',10,20)==false) { if(er==0) foc = 'shipper_cell_phone'; er=1; }	
	if (IsEmail('shipper_email')==false) { if(er==0) foc = 'shipper_email'; er=1; }	
	
	if (selectcon('vehicles_pickup_address')==false) { if(er==0) foc = 'vehicles_pickup_address'; er=1; }
	if (selectcon('vehicles_pickup_city')==false) { if(er==0) foc = 'vehicles_pickup_city'; er=1; }
	if (selectcon('vehicles_pickup_state')==false) { if(er==0) foc = 'vehicles_pickup_state'; er=1; }
	if (selectcon('vehicles_pickup_zip')==false) { if(er==0) foc = 'vehicles_pickup_zip'; er=1; }	
	
	if (selectcon('veh_model')==false) { if(er==0) foc = 'veh_model'; er=1; }
	if (selectcon('veh_year')==false) { if(er==0) foc = 'veh_year'; er=1; }	
	
	if (fullname('consignee_name')==false) { if(er==0) foc = 'consignee_name'; er=1; }
	if (selectcon('consignee_address')==false) { if(er==0) foc = 'consignee_address'; er=1; }
	if (fullname('consignee_city')==false) { if(er==0) foc = 'consignee_city'; er=1; }
	if (selectcon('consignee_country')==false) { if(er==0) foc = 'consignee_country'; er=1; }
	if (contactCustomWithCountryCode('consignee_tel_no',10,20)==false) { if(er==0) foc = 'consignee_tel_no'; er=1; }		
	if (IsEmail('consignee_email')==false) { if(er==0) foc = 'consignee_email'; er=1; }
	
	if (checkAgreeBox('agree')==false) { if(er==0) foc = 'agreebox'; er=1; }
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
	//if(jQuery("#agree").prop('checked') == false){ if(er==0) document.getElementById("agreebox").style.border = "1px solid red"; er=1; return false; } 
	
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}
//roro form validation ends here

//order online form validation starts here
function checkOrderOnlineForm() { 
	var er=0;
	var foc ='';
	var ShipFrom = jQuery("#ShipFrom").val();
	var Shipper = jQuery("#Shipper").val();
	var FromEmail = jQuery("#FromEmail").val();
	var FromAddress = jQuery("#FromAddress").val();
	var FromCity = jQuery("#FromCity").val();
	var FromState = jQuery("#FromState").val();	
  	var FromZip = jQuery("#FromZip").val();
	var FromCountry = jQuery("#FromCountry").val();
	
	var ShipTo = jQuery("#ShipTo").val();
	var Consignee = jQuery("#Consignee").val();
	var ToEmail = jQuery("#ToEmail").val();
	var ToAddress = jQuery("#ToAddress").val();
	var ToCity = jQuery("#ToCity").val();
	var ToState = jQuery("#ToState").val();	
  	var ToZip = jQuery("#ToZip").val();
	var ToCountry = jQuery("#ToCountry").val();
	
	var streetaddress = jQuery("#streetaddress").val();
	var City = jQuery("#City").val();
	var Zip = jQuery("#Zip").val();
	var SignedBy = jQuery("#SignedBy").val();
	
	var Name = jQuery("#Name").val();
	var State = jQuery("#State").val();
	var Place = jQuery("#Place").val();		
	
	var response = grecaptcha.getResponse();
	
	if (selectcon('ShipFrom')==false) { if(er==0) foc = 'ShipFrom'; er=1; }
	if (fullname('Shipper')==false) { if(er==0) foc = 'Shipper'; er=1; }
	if (IsEmail('FromEmail')==false) { if(er==0) foc = 'FromEmail'; er=1; }	
	if (selectcon('FromAddress')==false) { if(er==0) foc = 'FromAddress'; er=1; }
	if (fullname('FromCity')==false) { if(er==0) foc = 'FromCity'; er=1; }
	if (selectcon('FromState')==false) { if(er==0) foc = 'FromState'; er=1; }
	if (selectcon('FromZip')==false) { if(er==0) foc = 'FromZip'; er=1; }	
	if (selectcon('FromCountry')==false) { if(er==0) foc = 'FromCountry'; er=1; }	
	
	if (selectcon('ShipTo')==false) { if(er==0) foc = 'ShipTo'; er=1; }
	if (selectcon('Consignee')==false) { if(er==0) foc = 'Consignee'; er=1; }
	if (IsEmail('ToEmail')==false) { if(er==0) foc = 'ToEmail'; er=1; }	
	if (selectcon('ToAddress')==false) { if(er==0) foc = 'ToAddress'; er=1; }
	if (fullname('ToCity')==false) { if(er==0) foc = 'ToCity'; er=1; }
	if (selectcon('ToState')==false) { if(er==0) foc = 'ToState'; er=1; }
	if (contact('ToZip',5,6)==false) { if(er==0) foc = 'ToZip'; er=1; }	
	if (selectcon('ToCountry')==false) { if(er==0) foc = 'ToCountry'; er=1; }
	
	if (selectcon('streetaddress')==false) { if(er==0) foc = 'streetaddress'; er=1; }
	if (fullname('City')==false) { if(er==0) foc = 'City'; er=1; }	
	if (selectcon('Zip')==false) { if(er==0) foc = 'Zip'; er=1; }
	if (selectcon('SignedBy')==false) { if(er==0) foc = 'SignedBy'; er=1; }
		
	if (fullname('Name')==false) { if(er==0) foc = 'Name'; er=1; }
	if (selectcon('State')==false) { if(er==0) foc = 'State'; er=1; }
	if (selectcon('Place')==false) { if(er==0) foc = 'Place'; er=1; }
	
	//if (checkAgreeBox('firstaccept')==false) { if(er==0) foc = 'agree1'; er=1; }
	//if (checkAgreeBox('secondaccept')==false) { if(er==0) foc = 'agree2'; er=1; }
	
	if (checkAgreeBox('agree')==false) { if(er==0) foc = 'agreebox'; er=1; }
	if (checkAgreeBox1('agree1')==false) { if(er==0) foc = 'agreebox1'; er=1; }
	
	
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
		
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}
//order online form validation ends here

//household form validation starts here
function check_householdForm() { 
	var er=0;
	var foc ='';
	var hname = jQuery("#hname").val();
	var email = jQuery("#email").val();
	var hFromCity = jQuery("#hFromCity").val();
	var FromState = jQuery("#FromState").val();
	var FromCountry = jQuery("#FromCountry").val();
	var FromZip = jQuery("#FromZip").val();	
	
	var hToCity = jQuery("#hToCity").val();
	var ToState = jQuery("#ToState").val();
	var ToCountry = jQuery("#ToCountry").val();
	var ToZip = jQuery("#ToZip").val();
	
	var response = grecaptcha.getResponse();
	
	if (fullname('hname')==false) { if(er==0) foc = 'hname'; er=1; }
	if (IsEmail('email')==false) { if(er==0) foc = 'email'; er=1; }	
	if (fullname('hFromCity')==false) { if(er==0) foc = 'hFromCity'; er=1; }
	if (selectcon('FromState')==false) { if(er==0) foc = 'FromState'; er=1; }
	if (selectcon('FromCountry')==false) { if(er==0) foc = 'FromCountry'; er=1; }
	if (selectcon('FromZip')==false) { if(er==0) foc = 'FromZip'; er=1; }		
	
	if (fullname('hToCity')==false) { if(er==0) foc = 'hToCity'; er=1; }
	if (selectcon('ToState')==false) { if(er==0) foc = 'ToState'; er=1; }	
	if (selectcon('ToCountry')==false) { if(er==0) foc = 'ToCountry'; er=1; }
	if (selectcon('ToZip')==false) { if(er==0) foc = 'ToZip'; er=1; }	
	
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
		
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}
jQuery("#hhformbtn").click(function() { 
	var er=0;
	var foc ='';
	var hname = jQuery("#hname").val();
	var email = jQuery("#email").val();
	var hFromCity = jQuery("#hFromCity").val();
	var FromState = jQuery("#FromState").val();
	var FromCountry = jQuery("#FromCountry").val();
	var FromZip = jQuery("#FromZip").val();	
	
	var hToCity = jQuery("#hToCity").val();
	var ToState = jQuery("#ToState").val();
	var ToCountry = jQuery("#ToCountry").val();
	var ToZip = jQuery("#ToZip").val();
	
	var response = grecaptcha.getResponse();
	
	if (fullname('hname')==false) { if(er==0) foc = 'hname'; er=1; }
	if (IsEmail('email')==false) { if(er==0) foc = 'email'; er=1; }	
	if (fullname('hFromCity')==false) { if(er==0) foc = 'hFromCity'; er=1; }
	if (selectcon('FromState')==false) { if(er==0) foc = 'FromState'; er=1; }
	if (selectcon('FromCountry')==false) { if(er==0) foc = 'FromCountry'; er=1; }
	if (selectcon('FromZip')==false) { if(er==0) foc = 'FromZip'; er=1; }		
	
	if (fullname('hToCity')==false) { if(er==0) foc = 'hToCity'; er=1; }
	if (selectcon('ToState')==false) { if(er==0) foc = 'ToState'; er=1; }	
	if (selectcon('ToCountry')==false) { if(er==0) foc = 'ToCountry'; er=1; }
	if (selectcon('ToZip')==false) { if(er==0) foc = 'ToZip'; er=1; }	
	
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; er=1; }
		
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} else {
		//jQuery("#householdform").submit();	
		jQuery(this).parents('form').submit();
		//document.getElementById("householdform").submit();
	}
});
//household form validation ends here

//contact form validation starts here
function checkContactForm() { 
	var er=0;
	var foc ='';
	var cname = jQuery("#cname").val();
	var cemail = jQuery("#cemail").val();
	var csubject = jQuery("#csubject").val();
	var cmessage = jQuery("#cmessage").val();
	
	var response = grecaptcha.getResponse();
	
	if (fullname('cname')==false) { if(er==0) foc = 'cname'; er=1; }
	if (IsEmail('cemail')==false) { if(er==0) foc = 'cemail'; er=1; }	
	if (selectcon('csubject')==false) { if(er==0) foc = 'csubject'; er=1; }
	if (selectcon('cmessage')==false) { if(er==0) foc = 'cmessage'; er=1; }
	
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
		
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	} 
}

jQuery("#submitbtn").click(function(){  	
	var er=0;
	var foc ='';
	var cname = jQuery("#cname").val();
	var cemail = jQuery("#cemail").val();
	var csubject = jQuery("#csubject").val();
	var cmessage = jQuery("#cmessage").val();	
	var response = grecaptcha.getResponse();	
	
	if(fullname('cname')==false){ if(er==0) foc = 'cname'; er=1; }
	if(IsEmail('cemail')==false){ if(er==0) foc = 'cemail'; er=1; }
	if(selectcon('csubject')==false){ if(er==0) foc = 'csubject'; er=1; }
	if(selectcon('cmessage')==false){ if(er==0) foc = 'cmessage'; er=1; }
	
	if(response.length === 0){ 
		if(er==0) foc = 'grecaptcha'; 
		document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; 
		er=1; 
	}else{ 
		document.getElementById("grecaptcha").style.borderBottom = "none"; 
	}
		
	if(er==1){
		document.getElementById(foc).focus();
		return false;
	}else{		
		jQuery("#contactform").submit();
		jQuery(this).parents('form').submit();
	}
});
//contact form validation ends here  

jQuery(document).ready(function() {
	var url = "countries_list.php";
	jQuery.getJSON(url, function (data) {
		jQuery('#consignee_country').append('<option value="">Select Country</option>');
		jQuery('#receiver_country').append('<option value="">Select Country</option>');
		
		jQuery('#FromCountry').append('<option value="">Select Country</option>');
		jQuery('#ToCountry').append('<option value="">Select Country</option>');
		
		jQuery.each(data, function (index, value) { 
			// APPEND OR INSERT DATA TO SELECT ELEMENT.
			jQuery('#consignee_country').append('<option value="' +value.name + '">' + value.name + '</option>');
			jQuery('#receiver_country').append('<option value="' +value.name + '">' + value.name + '</option>');
			
			jQuery('#FromCountry').append('<option value="' +value.name + '">' + value.name + '</option>');
			jQuery('#ToCountry').append('<option value="' +value.name + '">' + value.name + '</option>');
		});
	});	
});
jQuery(document).ready(function() { 
	jQuery('#FromCountry').change(function() {
		var fromCountry = jQuery("#FromCountry").val();
		jQuery("#FromState option").remove();
		var url = "states_listwithcountry.php?fromCountry="+fromCountry;
		jQuery.getJSON(url, function (data) {
			jQuery('#FromState').append('<option value="">Select State</option>');
			jQuery.each(data, function (index, value) { 
				// APPEND OR INSERT DATA TO SELECT ELEMENT.
				jQuery('#FromState').append('<option value="' +value.name + '">' + value.name + '</option>');
			});
		});
	});	
	jQuery('#ToCountry').change(function() {
		var toCountry = jQuery("#ToCountry").val();
		jQuery("#ToState option").remove();
		var url = "states_listwithcountry.php?fromCountry="+toCountry;
		jQuery.getJSON(url, function (data) {
			jQuery('#ToState').append('<option value="">Select State</option>');
			jQuery.each(data, function (index, value) { 
				// APPEND OR INSERT DATA TO SELECT ELEMENT.
				jQuery('#ToState').append('<option value="' +value.name + '">' + value.name + '</option>');
			});
		});
	});										
	/*var url1 = "states_list.php";
	jQuery.getJSON(url1, function (data1) { 
		jQuery('#FromState').append('<option value="">Select State</option>');
		jQuery('#ToState').append('<option value="">Select State</option>');
		jQuery('#State').append('<option value="">Select State</option>');
		jQuery('#container_loading_state').append('<option value="">Select State</option>');
		jQuery.each(data1, function (index1, value1) { 
			// APPEND OR INSERT DATA TO SELECT ELEMENT.
			jQuery('#FromState').append('<option value="' +value1.name + '">' + value1.name + '</option>');
			jQuery('#ToState').append('<option value="' +value1.name + '">' + value1.name + '</option>');
			jQuery('#State').append('<option value="' +value1.name + '">' + value1.name + '</option>');
			jQuery('#container_loading_state').append('<option value="' +value1.name + '">' + value1.name + '</option>');
		});
	});*/
});	
jQuery(document).ready(function(){
	/*jQuery('#FromState').change(function() {
		var fromstate = jQuery("#FromState").val();
		jQuery("#FromCountry option").remove();
		var url = "countries_listwithstate.php?fromstate="+fromstate;
		jQuery.getJSON(url, function (data) {
			//jQuery('#FromCountry').append('<option value="">Select Country</option>');
			jQuery.each(data, function (index, value) { 
				// APPEND OR INSERT DATA TO SELECT ELEMENT.
				jQuery('#FromCountry').append('<option value="' +value.name + '">' + value.name + '</option>');
			});
		});
	});
	jQuery('#ToState').change(function() {
		var fromstate = jQuery("#ToState").val();
		jQuery("#ToCountry option").remove();
		var url = "countries_listwithstate.php?fromstate="+fromstate;
		jQuery.getJSON(url, function (data) {
			//jQuery('#ToCountry').append('<option value="">Select Country</option>');
			jQuery.each(data, function (index, value) { 
				// APPEND OR INSERT DATA TO SELECT ELEMENT.
				jQuery('#ToCountry').append('<option value="' +value.name + '">' + value.name + '</option>');
			});
		});
	});*/
	
	jQuery("#comcarbtn").click(function(e) {
		var name = jQuery("#name").val();
		if (fullname('name')==false) { if(er==0) foc = 'name'; er=1; }
	});
});

//commercial cargo form validation starts here
function commericalCargoForm() { 
	var er=0;
	var foc ='';
	var uname = jQuery("#uname").val();
	var ucompany = jQuery("#ucompany").val();
	var uemail = jQuery("#uemail").val();
	var uphone = jQuery("#uphone").val();
	var message = jQuery("#message").val();	
	var response = grecaptcha.getResponse();
	
	if (selectcon('uname')==false) { if(er==0) foc = 'uname'; er=1; }
	if (selectcon('ucompany')==false) { if(er==0) foc = 'ucompany'; er=1; }
	if (IsEmail('uemail')==false) { if(er==0) foc = 'uemail'; er=1; }	
	if (contactCustomWithCountryCode('uphone',10,20)==false) { if(er==0) foc = 'uphone'; er=1; }
	if (selectcon('message')==false) { if(er==0) foc = 'message'; er=1; }
	
	if (response.length === 0) { if(er==0) foc = 'grecaptcha'; document.getElementById("grecaptcha").style.borderBottom = "1px solid red"; er=1; } else { document.getElementById("grecaptcha").style.borderBottom = "none"; }
		
	if(er==1) {
		document.getElementById(foc).focus();
		return false;
	}else{
	    
	    jQuery('#btnSubmit').attr("disabled", "true");
		jQuery('.form-submit-loader').show();
	    var data = "uname="+uname+"&ucompany="+ucompany+"&uemail="+uemail+"&uphone="+uphone+"&message="+message+ "&cmf=1";
	    
	    jQuery.ajax({
			type: "POST",
			url: "https://www.sky2c.com/send-commericalcargorequest.php",
			// url: "http://localhost/sky2c/send-commericalcargorequest.php",

			data: data,
			success: function(message) {
			
				if(message == "sucess"){
									
				window.location="https://www.sky2c.com/thanks.htm"; 
				
				
				jQuery("#uname").val("");
				jQuery("#ucompany").val("");  
				jQuery("#uemail").val("");
				jQuery("#uphone").val("");
				jQuery("#message").val("");
				jQuery('.form-submit-loader').hide();
				jQuery('#btnSubmit').removeAttr("disabled");
           } else if (message == "Invalid captcha") {
                jQuery('.form-submit-loader').hide();
				jQuery('#btnSubmit').removeAttr("disabled");
				
				jQuery("#message_box").removeClass("error").addClass("error");
				jQuery("#message_box").html(message);	
				jQuery("#security_code").focus();	
		   } else {
		        jQuery('.form-submit-loader').hide();
				jQuery('#btnSubmit').removeAttr("disabled");
			
           }
        }//sucess function
        }); // ajax
	    
	    
	}
}
//commercial cargo form validation ends here  

jQuery(document).ready(function(){ 
	jQuery("input[name='insurance_option']").click(function() {  
		var insopt = jQuery(this).val().split([0]); 
		if(insopt=="Yes") {
			jQuery("#insurance_rowyes").show();
		} else if(insopt=="No") {
			jQuery("#insurance_rowyes").hide();
		}
	});
});