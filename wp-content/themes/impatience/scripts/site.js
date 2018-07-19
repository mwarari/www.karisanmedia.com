//type = textarea, input, select, option

function resetFields() {
	//give inputs a class
	$$('input[type="text"]').each(function(el) { el.addClassName('textInput'); });
	$$('input[type="checkbox"]').each(function(el) { el.addClassName('checkboxInput'); });
	$$('input[type="radio"]').each(function(el) { el.addClassName('radioInput'); });
	$$('input[type="submit"]').each(function(el) { el.addClassName('submitInput')});
	
	var inputs = $A(document.getElementsByTagName('input'));	
	var textareas = $A(document.getElementsByTagName('textarea'));
	var selects = $A(document.getElementsByTagName('select'));
	var options = $A(document.getElementsByTagName('option'));
	var elements = inputs.concat(textareas).concat(selects).concat(options);
	for (var i = 0; i<elements.length; i++) {
		var element = elements[i];
    if (element.type == "submit") continue;
    	
			$(element).addClassName("default");
			element.onfocus = function() {
				$(this).addClassName('focus');				
				if ($(this).className.match(/new/)) {
					$(this).addClassName('default');
					if (this.value == this.defaultValue) {
					this.value = '';					
					}
				}
			}
		
    element.onblur = function() {	
				$(this).removeClassName("focus");
				$(this).removeClassName("default");
				if ($(this).className.match(/new/)) {
					if (this.value == '') {
						this.value = this.defaultValue;
						$(this).addClassName('default');
					}
				}
		}
  }
}


document.observe("dom:loaded", resetFields);