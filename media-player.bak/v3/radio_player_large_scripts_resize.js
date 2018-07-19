	var _isIE = false;
	var _isSafari = false;
	var _isFox = false;

	if(document.all)
		_isIE = true;
		
	if(/Safari/.test(navigator.userAgent))
		_isSafari = true;
		
	if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent))
		_isFox = true;

	function resizeWindowToElement(sElementId, bSecondResize) {
		
		var dx, dy, el;
		var wWidth, wHeight;

		el = document.getElementById(sElementId);

		if( el )
			{
			if( typeof( window.innerWidth ) == 'number' ) 
				{
				//Non-IE
				wWidth = window.innerWidth;
				wHeight = window.innerHeight;
				} 
			else if( document.documentElement && 
			( document.documentElement.clientWidth ||
			document.documentElement.clientHeight ) ) 
				{
				//IE 6+ in 'standards compliant mode'
				wWidth = document.documentElement.clientWidth;
				wHeight = document.documentElement.clientHeight;
				} 
			else if( document.body && 
			( document.body.clientWidth || 
			document.body.clientHeight ) ) 
				{
				//IE 4 compatible
				wWidth = document.body.clientWidth;
				wHeight = document.body.clientHeight;
				}

			dx = el.offsetWidth - wWidth;
			dy = el.offsetHeight - wHeight;
			
			try
				{
				window.resizeBy(dx, dy);
				}
			catch(e) { }


			// Resizing the window can cause menu bars to 
			// re-arrange themselves and block content.
			// Resize again to accomodate this
			if( !bSecondResize )
				{
				resizeWindowToElement(sElementId, true);
				}
			}

		}
		
	function playerDspToggle(targetMode) {
	
		var thisTargetMode = (targetMode != undefined ? targetMode : (playerDspMode == "mini" ? "full" : "mini"));
		resizePlayerDiv = (thisTargetMode == "mini" ? "playerTransportDiv" : "bodyDiv");
	
		if (playerDspModeToggle == true)
			{
			var pICN = document.getElementById("playerTransportDivIcons");
			}
		var pTD = document.getElementById("playerTransportDiv");
		var pTT = document.getElementById("playerTransportTable");
		var bDiv = document.getElementById("bodyDiv");
		
		//document.getElementById("debugDiv").innerHTML += "****" + pTD.className + " / " + pTD.style.margin + "****<br>";
		
		playerDspMode = thisTargetMode;
		
		if (thisTargetMode == "mini" &&
			pTD.style.display != "fixed")
			{
			pTD.style.display="block";
			pTD.style.position = "fixed";
			pTD.style.left = "10px";
			pTD.style.top = "10px";	
			pTD.style.width="303px";
			if (playerSkinTuner == true)
				{
				pTT.style.marginLeft = "22px";
				}
			if (playerDspModeToggle == true)
				{
				pICN.style.display = "inline";
				pICN.style.position = "fixed";			
				pICN.style.top = "223px";
				pICN.style.left = "11px";
				pTD.style.height="253px";
				}
			else
				{
				pTD.style.height="223px";
				}
			bDiv.style.display="block";
			bDiv.style.position = "fixed";
			bDiv.style.left = "-1000px";
			bDiv.style.top = "-1000px";
			resizeWindowToElement("playerTransportDiv");
			}
		
		if (thisTargetMode == "full" &&
			pTD.style.display != "inline")
			{
			if (playerDspModeToggle == true)
				{
				pICN.style.display = "none";
				pICN.style.position = "static";
				}
			if (playerSkinTuner == true)
				{
				pTT.style.marginLeft = "0px";
				}
			pTD.style.width = "289px";
			pTD.style.height = (playerSkinTuner == true ? "203px" : "209px");
			pTD.style.position = "static";
			bDiv.style.left = "0px";
			bDiv.style.top = "0px";
			bannerSelect();
			videoPlayerDsp(mPlayerPlaying);
			resizeWindowToElement("bodyDiv");
			}
	}
	
	function miniPlayerVideoStretch(stretchFlag) {
		if (playerDspMode == "mini")
			{
			document.getElementById("playerTransportDiv").style.width = (stretchFlag == true ? "350px" : "303px");
			resizeWindowToElement("playerTransportDiv");
			}
	}
	
	function confirmClose(){
		if (allowPrompt == true)
			{
			//event.returnValue = "You will close the web player.\nTo view a different web page, press Cancel and open a new browser.";
			return "You will close the web player.\nTo view a different web page, press Cancel and open a new browser.";
			}
		else
			{
			allowPrompt = true;
			}			
	}

	function NoPrompt() {
		allowPrompt = false;
	} 
	
	function pageWidth() 
	{
		return window.innerWidth != null ? window.innerWidth: document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth:document.body != null? document.body.clientWidth:null;
	}

	function pageHeight() {
		return window.innerHeight != null? window.innerHeight: document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight:document.body != null? document.body.clientHeight:null;
		}

	function posLeft() {
		return typeof window.pageXOffset != 'undefined' ? window.pageXOffset:document.documentElement && document.documentElement.scrollLeft? document.documentElement.scrollLeft:document.body.scrollLeft? document.body.scrollLeft:0;
		}

	function posTop() {
		return typeof window.pageYOffset != 'undefined' ? window.pageYOffset:document.documentElement && document.documentElement.scrollTop? document.documentElement.scrollTop: document.body.scrollTop?document.body.scrollTop:0;
		}

	//---- display div ----
	function dspDiv(divName,zIndex,displayMode,displayPos,width,height) 
		{
		var p='px';
		divName.style.height=pageHeight()+p;
		divName.style.width=pageWidth()+p;
		divName.style.top=posTop()+p;
		divName.style.left=posLeft()+p;
		divName.style.display=displayMode;
		divName.style.position=displayPos;
		divName.style.top=0;
		divName.style.left=0;
		divName.style.zIndex=zIndex;
		divName.style.width=width + (!isNaN(width) ? p : "");
		divName.style.height=height + (!isNaN(height) ? p : "");
		
		//---- center ----
		if (!isNaN(width) && !isNaN(height))
			{
			divName.style.left = Math.floor((pageWidth() - width) / 2) + 'px';
			divName.style.top = Math.floor((pageHeight() - height) / 2) + 'px';
			}		
		}
	//---- END ----
