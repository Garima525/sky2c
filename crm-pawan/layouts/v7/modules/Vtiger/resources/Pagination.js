/*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************/

Vtiger.Class('Vtiger_Pagination_Js', {},{
	
	container : jQuery('body'),
	
	initialize : function(container) {
		if(typeof container  !== 'undefined') {
			this.container = container;
		}
		
		var thisInstance = this;
		thisInstance.registerNextPageButtonClickEvent();
		thisInstance.registerPreviousPageButtonClickEvent();
		thisInstance.registerPageJumpButtonClickEvent();
		thisInstance.registerNumOfRecordsButtonClickEvent();
		thisInstance.registerPageJumpSubmitButtonClickEvent();
		this.intializeEventNames();
	},
	
	intializeEventNames : function() {
		var randomNumber = app.helper.rand();
		this.nextPageButtonClickEventName = 'Post.NextPage.Click'+randomNumber;
		this.previousPageButtonClickEventName = 'Post.PrevPage.Click'+randomNumber;
		this.pageJumpButtonClickEventName = 'Post.PageJump.Click'+randomNumber;
		this.totalNumOfRecordsButtonClickEventName = 'Post.TotalRecords.Click'+randomNumber;
		this.pageJumpSubmitButtonClickEvent = 'Post.PageJumpSumit.Click'+randomNumber;
	},
	
	registerNextPageButtonClickEvent : function() {
		var thisInstance = this;
		thisInstance.container.on('click','#NextPageButton',function(e){
			var currentEle = jQuery(e.currentTarget);
			app.event.trigger(thisInstance.nextPageButtonClickEventName, currentEle);
		});
	},
	
	registerPreviousPageButtonClickEvent : function() {
		var thisInstance = this;
		thisInstance.container.on('click','#PreviousPageButton',function(e){
			var currentEle = jQuery(e.currentTarget);
			app.event.trigger(thisInstance.previousPageButtonClickEventName, currentEle);
		});
	},
	
	registerPageJumpButtonClickEvent : function() {
		var thisInstance = this;
		thisInstance.container.on('click', '#PageJump', function(e){
			var currentEle = jQuery(e.currentTarget);
			app.event.trigger(thisInstance.pageJumpButtonClickEventName, currentEle);
		});
		
		var thisInstance = this;
		thisInstance.container.on('click', '#PageJump2', function(e){
			var currentEle = jQuery(e.currentTarget);
			app.event.trigger(thisInstance.pageJumpButtonClickEventName, currentEle);
		});
		
	},
	
	registerNumOfRecordsButtonClickEvent : function() {
		var thisInstance = this;
		thisInstance.container.on('click', '.totalNumberOfRecords', function(e){
			var currentEle = jQuery(e.currentTarget);
			app.event.trigger(thisInstance.totalNumOfRecordsButtonClickEventName, currentEle);
		});
	},
	
     checkPositiveNumber : function(currentEle) {
         var fieldValue = currentEle.val();
         var negativeRegex= /(^[-]+\d+)$/ ;
         if(fieldValue == 0) {
             var errorInfo = app.vtranslate('JS_VALUE_SHOULD_BE_GREATER_THAN_ZERO');
             vtUtils.showValidationMessage(currentEle, errorInfo, {
                    position : {
                        my: 'top left',
                        at: 'bottom left',
                        container: currentEle.closest('.listViewBasicAction')
                    }
               });
               return false;
         }else if(isNaN(fieldValue) || fieldValue < 0 || fieldValue.match(negativeRegex)){
               errorInfo = app.vtranslate('JS_ACCEPT_POSITIVE_NUMBER');
               vtUtils.showValidationMessage(currentEle, errorInfo, {
                    position : {
                        my: 'top left',
                        at: 'bottom left',
                        container: currentEle.closest('.listViewBasicAction')
                    }
               });
               return false;
         }
         return true;
     },
     
     
	registerPageJumpSubmitButtonClickEvent : function() {
		var thisInstance = this;
		
        thisInstance.container.on('click','ul#PageJumpDropDown li',function(e){
            e.stopImmediatePropagation();
        }).on('click','#pageToJumpSubmit',function(e){
			var currentEle = jQuery(e.currentTarget);
               var element = thisInstance.container.find('#pageToJump');
               if(thisInstance.checkPositiveNumber(element)) {
                   vtUtils.hideValidationMessage(element);
                   app.event.trigger(thisInstance.pageJumpSubmitButtonClickEvent, currentEle);
               }    
        });
		
		thisInstance.container.on('click','ul#PageJumpDropDown2 li',function(e){
            e.stopImmediatePropagation();
        }).on('click','#pageToJumpSubmit2',function(e){			
			var currentEle = jQuery(e.currentTarget);			
               var element = thisInstance.container.find('#pageToJump2');						   
               if(thisInstance.checkPositiveNumber(element)){
                   //vtUtils.hideValidationMessage(element);
                   //app.event.trigger(thisInstance.pageJumpSubmitButtonClickEvent, currentEle);
				   for(var i=0;i<element.length;i++){
					var sm = element[i].value;
					window.location.href = '?module=Leads&parent=&page='+sm+'&view=List&viewname=1&orderby=createdtime&sortorder=DESC&app=MARKETING&search_params=[]&tag_params=[]&nolistcache=0&list_headers=["cf_1250"%2C"lead_no"%2C"firstname"%2C"email"%2C"phone"%2C"assigned_user_id"%2C"leadstatus"%2C"createdtime"%2C"cf_1254"]&tag=';
				   }
               }    
        });
		
        thisInstance.container.on('click','ul#PageJumpDropDown li',function(e){
            e.stopImmediatePropagation();
        }).on('keypress','#pageToJump',function(e){
			if(e.which === 13) {
                            e.stopImmediatePropagation();
                            e.preventDefault();
                            var currentEle = jQuery(e.currentTarget);
                            if(thisInstance.checkPositiveNumber(currentEle)) {
                              vtUtils.hideValidationMessage(currentEle);
                              app.event.trigger(thisInstance.pageJumpSubmitButtonClickEvent, currentEle);
                            }
			}
            });
			
			 thisInstance.container.on('click','ul#PageJumpDropDown2 li',function(e){
            e.stopImmediatePropagation();
        }).on('keypress','#pageToJump2',function(e){
			if(e.which === 13) {
                            e.stopImmediatePropagation();
                            e.preventDefault();
                            var currentEle = jQuery(e.currentTarget);
                            if(thisInstance.checkPositiveNumber(currentEle)) {
                              vtUtils.hideValidationMessage(currentEle);
                              app.event.trigger(thisInstance.pageJumpSubmitButtonClickEvent, currentEle);
                            }
			}
            });
			

            thisInstance.container.on('focusout','ul#PageJumpDropDown',function(){
                var element = thisInstance.container.find('#pageToJump');
                vtUtils.hideValidationMessage(element);
            });
			
			 thisInstance.container.on('focusout','ul#PageJumpDropDown2',function(){
                var element = thisInstance.container.find('#pageToJump2');
                vtUtils.hideValidationMessage(element);
            });
	}
});