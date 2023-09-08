var FormValidation = function () {

    // basic validation
    var validationUsersAdd = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var usersAdd = $('#usersAdd');
            var error1 = $('.alert-danger', usersAdd);
            var success1 = $('.alert-success', usersAdd);

            usersAdd.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    },
                    email: {
                        required: "This field is required",
                        email: "Please provide valid email",
                        remote: "Email already exists"
                    },
                    username: {
                        minlength: 'Username should be max or greater than 2 char',
                        required: "This field is required",
                        alphanumeric: 'Username should be alpha numeric',
                        //remote: "Username already exists"
                    },
                    phone: {
                        minlength: 'Please enter 10 characters',
                        maxlength: "Please enter not more than 10 characters",
                    }
                },
                rules: {
                    name: {
                        minlength: 2,
                        required: true,
                        lettersonly: true
                    },
                    username: {
                        minlength: 2,
                        required: true,
                        alphanumeric: true,
                       // alphaNumericUsername: true,
                        //remote: base_url+"App/isUniqueUsernameAjax"
                    },
                    email: {
                        required: true,
                        email: true,
                        //remote: base_url+"App/isUniqueEmailAjax"
                    },
                    phone: {
                        required: true,
                        minlength: 12,
                        maxlength: 12,
                       // number: true
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    passwordConfirm: {
                        required: true,
                        equalTo: '#password'
                    },
                    role: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //success1.hide();
                    //error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //success1.show();
                   // error1.hide(); 
                    form.submit();
                }
            });


    }
    var validationdriverAdd = function() {
            // $("#phone").attr("maxlength","12");
            // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var driverAdd = $('#driverAdd');
            var error1 = $('.alert-danger', driverAdd);
            var success1 = $('.alert-success', driverAdd);

            driverAdd.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    },
                    email: {
                        email: "Please provide valid email",
                       
                    },
                    username: {
                        minlength: 'Username should be max or greater than 2 char',
                        required: "This field is required",
                        alphanumeric: 'Username should be alpha numeric',
                        //remote: "Username already exists"
                    },
                    phone: {
                        minlength: 'Please enter 10 characters',
                        maxlength: "Please enter not more than 10 characters",
                    }
                },
                rules: {
                    name: {
                        minlength: 2,
                        required: true,
                        lettersonly: true
                    },
                    username: {
                        minlength: 2,
                        required: true,
                        alphanumeric: true,
                       // alphaNumericUsername: true,
                        //remote: base_url+"App/isUniqueUsernameAjax"
                    },
                    email: {
                       
                        email: true,
                        //remote: base_url+"App/isUniqueEmailAjax"
                    },
                    phone: {
                        required: true,
                        minlength: 12,
                        maxlength: 12,
                       // number: true
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    passwordConfirm: {
                        required: true,
                        equalTo: '#password'
                    },
                    role: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //success1.hide();
                    //error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //success1.show();
                    //error1.hide();
                    form.submit();
                }
            });


    }
    var validationShippingAdd = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var addShipping = $('#addShipping');
            var error1 = $('.alert-danger', addShipping);
            var success1 = $('.alert-success', addShipping);

            addShipping.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    },
                    phone: {
                        minlength: 'Please enter 10 characters',
                        maxlength: "Please enter not more than 10 characters",
                    }
                },
                rules: {
                    carrier_name: {
                      
                        required: true
                    },
                    phone: {
                        required: true,
                        minlength: 12,
                        maxlength: 12,
                        //number: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //success1.hide();
                    //error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //success1.show();
                    //error1.hide();
                    form.submit();
                }
            });


    }
    
    var validationChangePassword = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var changePassword = $('#changePassword');
            var error1 = $('.alert-danger', changePassword);
            var success1 = $('.alert-success', changePassword);

            changePassword.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    oldpassword: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                         minlength: 6,
                        maxlength: 20
                    },
                    passwordConfirm: {
                        required: true,
                        equalTo: '#password'
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //success1.hide();
                    //error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //success1.show();
                    //error1.hide();  
                    form.submit();
                }
            });


    }
    
    var validationFormLoginUser = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var formLoginUser = $('#formLoginUser');
            var error1 = $('.alert-danger', formLoginUser);
            var success1 = $('.alert-success', formLoginUser);

            formLoginUser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //success1.hide();
                    //error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //success1.show();
                    //error1.hide();
                    form.submit();
                }
            });


    }
    
     var validationFormCmsPages = function() {
        
            var formCmsPages = $('#cmspageedit');
            var errorCmsPages = $('.alert-danger', formCmsPages);
            var successCmsPages = $('.alert-success', formCmsPages);

            formCmsPages.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    'CmsPages[pagename]': {
                        required: 'This field is required'
                    },
                    'CmsPages[pageurl]': {
                        required: 'This field is required'
                    },
                    'CmsPages[pageheading]': {
                        required: 'This field is required'
                    },
                    'CmsPages[pagecontent]': {
                        required: 'This field is required'
                    }
                },
                rules: {
                    'CmsPages[pagename]': {
                        required: true
                    },
                    'CmsPages[pageurl]': {
                        required: true
                    },
                    'CmsPages[pageheading]': {
                        required: true
                    },
                    'CmsPages[pagecontent]': {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //successCmsPages.hide();
                    //errorCmsPages.show();
                    App.scrollTo(errorCmsPages, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //successCmsPages.show();
                    //errorCmsPages.hide(); 
                    form.submit();
                }
            });


    }
    
    var validationFormEmailTemplates = function() {
        
            var formEmailTemplates = $('#templateedit');
            var errorEmailTemplates = $('.alert-danger', formEmailTemplates);
            var successEmailTemplates = $('.alert-success', formEmailTemplates);

            formEmailTemplates.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    'EmailTemplates[title]': {
                        required: 'This field is required'
                    },
                    'EmailTemplates[subject]': {
                        required: 'This field is required'
                    },
                    'EmailTemplates[email_from]': {
                        required: 'This field is required',
                        email: 'Kindly use valid email address'
                    },
                    'EmailTemplates[email_name]': {
                        required: 'This field is required'
                    },
                    'EmailTemplates[description]': {
                        required: 'This field is required'
                    }
                },
                rules: {
                    'EmailTemplates[title]': {
                        required: true
                    },
                    'EmailTemplates[subject]': {
                        required: true
                    },
                    'EmailTemplates[email_from]': {
                        required: true,
                        email: true
                    },
                    'EmailTemplates[email_name]': {
                        required: true
                    },
                    'EmailTemplates[description]': {
                       required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //successEmailTemplates.hide();
                    //errorEmailTemplates.show();
                    App.scrollTo(errorEmailTemplates, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //successEmailTemplates.show();
                    //errorEmailTemplates.hide();
                    form.submit();
                }
            });


    }
   
    var validationAddDriverCertificate = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var addDriverCertificate = $('#addDriverCertificate');
            var error1 = $('.alert-danger', addDriverCertificate);
            var success1 = $('.alert-success', addDriverCertificate);

            addDriverCertificate.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    document_title: {
                        required: true
                    },
                    document_number: {
                        required: true
                    },
                    issued_by: {
                        required: true
                        
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //success1.hide();
                    //error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //success1.show();
                    //error1.hide();  
                    form.submit();
                }
            });


    }
    
    var validationFormOrderAssignToAgent = function() {
        
            var formOrderAssignToAgent = $('#order_assign_to_agent');
            var redirectURL = $('#current_url').val();
            var errorOrderAssignToAgent = $('.alert-danger', formOrderAssignToAgent);
            var successOrderAssignToAgent = $('.alert-success', formOrderAssignToAgent);

            formOrderAssignToAgent.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    'packages[]': {
                        required: 'This field is required'
                    },
                    'driver': {
                        required: 'This field is required'
                    },
                    'agent': {
                        required: 'This field is required'
                    },
                    'thirdparty_providers': {
                        required: 'This field is required'
                    },
                    'tacking_id': {
                        required: 'This field is required'
                    }
                },
                rules: {
                    'packages[]': {
                        required: true
                    },
                    'driver': {
                        required: true
                    },
                    'agent': {
                        required: true
                    },
                    'thirdparty_providers': {
                        required: true
                    },
                    'tacking_id': {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //successOrderAssignToAgent.hide();
                    //errorOrderAssignToAgent.show();
                    App.scrollTo(errorOrderAssignToAgent, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //successOrderAssignToAgent.show();
                    //errorOrderAssignToAgent.hide();  
                    var actionURL = formOrderAssignToAgent.attr('action');
                                    
                    var btnID = 'order_assign_to_agent';
                    var formID = 'order_assign_to_agent';
                                    
                    var orgBtnVal=$("."+btnID).text();//GET BUTTON VALUE
                    $("."+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
                    $("."+btnID).text('Wait...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
                    var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
                
                    $.ajax({
                        url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
                        data:formData,//ALL SUBMITTED DATA FROM THE FORM
                         
                        success:function(res)
                        {
                            var response = res.split(':');
                            if($.trim(response[0]) == 'Success'){
                                $('.clr').html(''); //Emtpy Error MESSAGE
                                $('.response').html('<div class="note note-success"><h4 class="block">'+response[1]+'</h4></div>'); //DISPLAY SUCCESS MESSAGE
                                $('#'+formID)[0].reset();
                                setTimeout(function(){window.location.href = base_url+"users/dashboard";},1000);
                            }if($.trim(response[0]) == 'Error'){
                                $('.clr').html(''); //Emtpy Error MESSAGE
                                $('.response').html('<div class="note note-danger"><h4 class="block">'+response[1]+'</h4></div>');  //DISPLAY SUCCESS MESSAGE
                            }
                            
                            //CODE FOR CHANGE THE BUTTON STYLE AND TEXT
                            $("."+btnID).attr('disabled',false);
                            $("."+btnID).text(orgBtnVal);   
                        }
                    });
                }
            });


    }
    
    var validationFormOrderAssignToDriver = function() {
        
            var formOrderAssignToDriver = $('#order_assign_to_driver'); 
            var redirectURL = $('#current_url').val();
            var errorOrderAssignToDriver = $('.alert-danger', formOrderAssignToDriver);
            var successOrderAssignToDriver = $('.alert-success', formOrderAssignToDriver);

            formOrderAssignToDriver.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    'packages[]': {
                        required: 'This field is required'
                    },
                    'driver': {
                        required: 'This field is required'
                    },
                    'thirdparty_providers': {
                        required: 'This field is required'
                    },
                    'tacking_id': {
                        required: 'This field is required'
                    }
                },
                rules: {
                    'packages[]': {
                        required: true
                    },
                    'driver': {
                        required: true
                    },
                    'thirdparty_providers': {
                        required: true
                    },
                    'tacking_id': {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //successOrderAssignToDriver.hide();
                    //errorOrderAssignToDriver.show();
                    App.scrollTo(errorOrderAssignToDriver, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //successOrderAssignToDriver.show();
                    //errorOrderAssignToDriver.hide();  
                    var actionURL = formOrderAssignToDriver.attr('action');
                                    
                    var btnID = 'order_assign_to_driver';
                    var formID = 'order_assign_to_driver';
                                    
                    var orgBtnVal=$("."+btnID).text();//GET BUTTON VALUE
                    $("."+btnID).attr('disabled',true);//MAKE THE BUTTON FADE AFTER CLICKED ON IT
                    $("."+btnID).text('Wait...');//CHANGE THE BUTTON TEXT AFTER CLICKED ON IT
                    var formData = $('#'+formID).serialize();//BIND THE FORM VALUE INTO A VARIABLE
                
                    $.ajax({
                        url: actionURL,//AJAX URL WHERE THE LOGIC HAS BUILD
                        data:formData,//ALL SUBMITTED DATA FROM THE FORM
                         
                        success:function(res)
                        {
                            var response = res.split(':');
                            if($.trim(response[0]) == 'Success'){
                                $('.clr').html(''); //Emtpy Error MESSAGE
                                $('.response').html('<div class="note note-success"><h4 class="block">'+response[1]+'</h4></div>'); //DISPLAY SUCCESS MESSAGE
                                $('#'+formID)[0].reset();
                                setTimeout(function(){window.location.href = base_url+"users/dashboard";},1000);
                            }if($.trim(response[0]) == 'Error'){
                                $('.clr').html(''); //Emtpy Error MESSAGE
                                $('.response').html('<div class="note note-danger"><h4 class="block">'+response[1]+'</h4></div>');  //DISPLAY SUCCESS MESSAGE
                            }
                            
                            //CODE FOR CHANGE THE BUTTON STYLE AND TEXT
                            $("."+btnID).attr('disabled',false);
                            $("."+btnID).text(orgBtnVal);   
                        }
                    });
                }
            });


    }
    
    var validationImportOrder = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var ImportOrder = $('#import_order');
            var error_ImportOrder = $('.alert-danger', ImportOrder);
            var success_ImportOrder = $('.alert-success', ImportOrder);

            ImportOrder.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    order_file: {
                        required: 'This field is required',
                        accept: "Only XML file is allowed"
                    }
                },
                rules: {
                    order_file: {
                        required: true,
                        accept: "xml"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //success_ImportOrder.hide();
                    //ImportOrder.show();
                    App.scrollTo(ImportOrder, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //success_ImportOrder.show();
                    //ImportOrder.hide();  
                    form.submit();
                }
            });


    }
    
    var validationTracking = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
            var tracking_order = $('#track_order');
            var tracking_order_error = $('.alert-danger', tracking_order);
            var tracking_order_success = $('.alert-success', tracking_order);

            tracking_order.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                errorPlacement: function(error, element) {
                 error.insertAfter(element.parent());
               },
                messages: {
                    order_id: {
                        required: "This field is required",
                        remote: "Order not found related to this id"
                    }
                },
                rules: {
                   order_id: {
                        required: true,
                        remote: base_url+"App/isOrderExists"
                   }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    //tracking_order_success.hide();
                    //tracking_order_error.show();
                    App.scrollTo(tracking_order_error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    //tracking_order_success.show();
                    //tracking_order_error.hide();  
                    form.submit();
                }
            });
    }
    
    return {
        //main function to initiate the module
        init: function () {

            validationUsersAdd();
            validationdriverAdd();
            validationChangePassword();
            validationShippingAdd();
            validationFormCmsPages();
            validationFormEmailTemplates();
            validationAddDriverCertificate();
            validationFormOrderAssignToAgent();
            validationFormOrderAssignToDriver();
            validationImportOrder();
            validationTracking();
         
        }

    };

}();

jQuery(document).ready(function() {

    setTimeout(function() {
        //jQuery(".success").hide();
        //jQuery(".error").hide();
        //jQuery(".loginError").hide();  
        //jQuery(".flasherror").hide(); 
        //jQuery(".flashsuccess").hide();      
    }, 10000);

    FormValidation.init();
    
    jQuery.validator.addMethod("alphaNumericUsername", function (value, element) {
        return this.optional(element) || /^(?=\D*\d)(?=[^a-z]*[a-z])[0-9a-z]+$/i.test(value);
    }, "username must contain atleast one number and one character");
    
    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Letters only please"); 

    /****************************************** cancel order by admin start here ************************************/
    jQuery(".cancelOrder").click(function(event){
        event.preventDefault();

        if (confirm("Are you sure you want to cancel this order?")) {
            var dataUrl     = jQuery(this).attr("data-href");
            var redirectUrl = jQuery(this).attr("data-redirect");
            jQuery(".loaderImage").show();
            jQuery.post(dataUrl, function(data){   
                jQuery(".loaderImage").hide();            
                var data = jQuery.trim(data);
                var res = jQuery.parseJSON(data);
                if(res.status=="0"){
                    alert(res.message); 
                }else if(res.status=="1"){
                    alert(res.message);
                    window.location.href=redirectUrl; 
                }else{
                    alert("There is error occured please try again");
                } 
                
            });
            return true;
        }
    });
    /***************************************** cancel order by admin end here *************************************/

    /****************************************** cancel order by admin start here ************************************/
    jQuery(".markComplete").click(function(event){
        event.preventDefault();

        if (confirm("Are you sure you want to mark complete this order?")) {
            var dataUrl     = jQuery(this).attr("data-href");
            var redirectUrl = jQuery(this).attr("data-redirect");
            jQuery(".loaderImage").show();
            jQuery.post(dataUrl, function(data){   
                jQuery(".loaderImage").hide();            
                var data = jQuery.trim(data);
                var res = jQuery.parseJSON(data);
                if(res.status=="0"){
                    alert(res.message); 
                }else if(res.status=="1"){
                    alert(res.message);
                    window.location.href=redirectUrl; 
                }else{
                    alert("There is error occured please try again");
                } 
                
            });
            return true;
        }
    });
    /***************************************** cancel order by admin end here *************************************/

});
