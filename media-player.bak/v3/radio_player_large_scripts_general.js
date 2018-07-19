	var bannerAutoRollStatus = "ini";
	var videoPrerollStatus = "ini";
	var audioPrerollStatus = "ini";
	var mPlayerMode = "ini";
	var mPlayerAllowPositionControl = false;
	var resizePlayerDiv = "bodyDiv";
	var SLVprocessStart = false;
	
	function pageProcessOnLoad() {
		processStartFlag = true;
		if (playerDspMode == "mini")
			{
			//---- display mini player ----
			playerDspToggle(playerDspMode,false);
			//---- END ----
			}
		switch(embedPlayerType)
			{
			case "FLA":
				//---- write flash player. the player will call the processStart function once initialized ----
				so.write('playerDiv');
				break;
				//---- END ----
			case "SLV":
				//---- wait for event listeners on the silverlight player ----
				createPlayer(streamSRC,playerAutoStart);
				break;
				//---- END ----
			default:
				processStart();
				break;
			}
	}

	function processStart() {

			if (videoPrerollEnabled == true)
				{
				mPlayerMode = "video";
				videoPrerollStatus = "start";
				dspVideoPreroll();
				resizeWindowToElement(resizePlayerDiv);
				}
			else if (audioPrerollEnabled == true)
				{
				mPlayerMode = "audio";
				audioPrerollStatus = "start";
				dspAudioPreroll();
				resizeWindowToElement(resizePlayerDiv);
				}	
			else if (fileArchive == true)
				{
				mPlayerMode = "audio";
				document.getElementById("onDemandFileList").style.display="inline";
				resizeWindowToElement(resizePlayerDiv);
				currentFileArchivePlayIndex = -1;
				mPlayerAllowPositionControl = true;
				autoAdvanceMedia();
				}
			else
				{
				mPlayerMode = "audio";
				//---- start player ----
				if (playerAutoStart == false &&
					adReplacementFlag == false)
					{
					mPlayerTransport('play');
					}
				//---- END ----

				//---- initialize ad replacement ----
				adReplacementInitialize();
				//---- END ----

				//---- banner roll will also resize the window ----
				bannerAutoRoll();
				//---- END ----

				}

			if (embedPlayerType == "WMP")
				{
				if (mPlayer.settings.volume != undefined)
					{
					mPlayerVolume = mPlayer.settings.volume;			
					}
				}

	}

 	function createPlayerShortcutBookmark() {
		title = "Listen to "+ stationCallSign; 
		url = location.href; 

		if (window.sidebar)
			{ 
			// Mozilla Firefox Bookmark 
			window.sidebar.addPanel(title, url,""); 
			}
		else if( window.external )
			{ 
			// IE Favorite 
			window.external.AddFavorite( url, title); 
			}
		else if(window.opera && window.print) 
			{ 
			// Opera Hotlist 
			return true; 
			} 
			
 	}
 	//---- END ----
 	
 	function toggleChatDsp(){
		document.getElementById("chatDiv").innerHTML = (isChatVisible==false ? chatSRC : "Loading chat, please wait....");
 		isChatVisible = !isChatVisible;
 	}