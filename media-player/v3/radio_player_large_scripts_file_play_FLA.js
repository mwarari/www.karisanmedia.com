	//---- media advance ----
	function autoAdvanceMedia(e) {
		
		//document.getElementById('debugDiv').innerHTML += "e:"+e+"/";
		//mPlayerDivMessage.style.display = "inline";
		if (adReplacement == true)
			{
			//---- ad replacement ----

				if (adReplacementFlag == true)
					{
					changePlayerUrl(streamSRCbase+"&playLocalAds=true&adReplacementPlayCampaignID="+adReplacementPlayCampaignID)
					forceBannerFileID = adReplacementPlayBannerFileID;
					bannerSelect();
					}
				else
					{
					//---- live feed ----
					changePlayerUrl(streamSRCbase,-1)
					adReplacementPlayBannerFileID = "";
					forceBannerFileID = "";
					bannerSelect();
					}
				//---- END ---->

			//---- END ----
			}
		else if (fileArchive == true)
			{
			//---- on-demand ---->
			
				if (shuffleMediaSetting == true)
					{
					//---- shuffle ---->
					shuffleMedia();
					//---- END ---->
					}
				else 
					{
					if (currentFileArchivePlayIndex < fileArchiveList.length - 1)
						{
						if (autoAdvanceMediaSetting == true)
							{
							currentFileArchivePlayIndex -= -1;
							}
						playMedia = true;
						}
					else
						{
						currentFileArchivePlayIndex = 0;
						playMedia = autoLoopMediaSetting;
						}
					}

				//---- play file and start position bar ---->
				if (playMedia == true)
					{
					playFile(currentFileArchivePlayIndex);
					//mPlayerPositionDsp();
					}
				//---- END ---->

			//---- END ---->
			}
		else
			{
			//---- switch to live feed ---->
			changePlayerUrl(streamSRCbase,-1);
			forceBannerFileID = "";
			nowPlayingDuration = 0;
			bannerSelect();
			//---- END ---->
			}
		}
	//---- END ----

	function mPlayerStateMonitor(state) {
		var _tempDate = new Date();
		//document.getElementById('debugDiv').innerHTML += "<br>"+_tempDate.toString() + "--state:" + state + "*" + mPlayerSavedState + "----";

		switch(state)
			{
			case "PLAYING":
				mPlayerPlaying = true;
				playerDivPlayingDsp = "inline";
				mPlayerDivMessageDsp = "none";
				setPlayButtonAction("play");
				EOMpending = false;
				EOMflag = false;
				break;

			case "BUFFERING":
				mPlayerPlaying = false;
				playerDivPlayingDsp = "none";
				mPlayerDivMessageDsp = "inline";
				setPlayButtonAction("loading");
				break;
				
			case "IDLE":
				mPlayerPlaying = false;
				playerDivPlayingDsp = "none";
				mPlayerDivMessageDsp = "none";				
				setPlayButtonAction("stop");
				break;
			
			default:
				mPlayerPlaying = false;
				playerDivPlayingDsp = "none";
				mPlayerDivMessageDsp = "none";
				setPlayButtonAction("stop");
				break;				
			}
		
		document.getElementById('playerDivPlaying').style.display = playerDivPlayingDsp;
		mPlayerDivMessage.style.display = mPlayerDivMessageDsp;
		
		//---- show player at video preroll play start ----
		if (mPlayerMode == "video" &&
			mPlayerPlaying == true)
			{
			miniPlayerVideoStretch(true);
			dspDiv(document.getElementById('videoPreroll'),'997','block','absolute','100%','100%');
			dspDiv(mPlayerDiv,'999','inline','absolute','320','240');
			videoPrerollStatus = "run";
			mPlayerDiv.style.border = "1px solid black";
			}			
		//---- END ----
		
		//---- show/hide video player ----
		videoPlayerDsp(mPlayerPlaying);
		//---- END ----		
		
		//---- handle end of media event ----
		if (playerMonitorState == true &&
			EOMflag == true &&
			(autoAdvanceMediaSetting == true ||
			 autoLoopMediaSetting == true))
			{
				
			//---- reset end of media flag and hide position bar ----
			EOMflag = false;
			//---- END ----

			//---- hide player at video preroll end ----
			if (mPlayerMode == "video")
				{
				miniPlayerVideoStretch(false);
				mPlayerDiv.style.display = "block";
				mPlayerDiv.style.position = "absolute";
				mPlayerDiv.style.left = "0px";
				mPlayerDiv.style.width = "1px";
				mPlayerDiv.style.height = "1px";
				mPlayerDiv.style.borderWidth = "0px";
				dspDiv(document.getElementById('videoPreroll'),'997','none','static','0','0');

				mPlayerMode = "audio";
				videoPrerollStatus = "end";
				audioPrerollStatus = "start";
				//document.getElementById('debugDiv').innerHTML += "<br>"+_tempDate.toString() + "----Video preroll end. Line 278 ----";
				}
			//---- END ----

			if (blackoutInProgress == true &&
				blackoutType == "REC")
				{
				//---- if EOM in blackout mode, replay sound bed ----
				setTimeout("mPlayerTransport('play')",1000);
				//---- END ----				
				}
			else if (audioPrerollEnabled == true &&
				"start,run".indexOf(audioPrerollStatus) != -1)
				{
				//---- run audio preroll ----
				dspAudioPreroll();
				//document.getElementById('debugDiv').innerHTML += "<br>"+_tempDate.toString() + "----Audio preroll. Line 287 ----";
				//---- END ----
				
				//---- show stream resume counter ----
				streamResumeCounterDsp(true);
				//---- END ----
				}
			else
				{
				audioPrerollHold = false;
				nowPlayingDuration = 0;
				
				//---- hide stream resume counter ----
				streamResumeCounterDsp(false);
				//---- END ----

				//document.getElementById('debugDiv').innerHTML += "<br>"+_tempDate.toString() + "---- Ad replacement flag: "+adReplacementFlag+"---Line 294 ----";

				if (fileArchive == true)
					{
					//---- run on-demand play ----
					autoAdvanceMedia('4');
					//---- END ----
					}				
				else if (adReplacementFlag == true)
					{
					//document.getElementById('debugDiv').innerHTML += "<br>"+_tempDate.toString() + "---- adReplacementInitializeStatus: "+adReplacementInitializeStatus+"---Line 304 ----";
					if (adReplacementInitializeStatus == false)
						{
						//---- start stream monitoring for the player at the end of video or audio preroll cycle ----
						adReplacementInitialize();
						//---- END ----
						}
					else
						{
						//---- run ad replacement local ads ----
						//document.getElementById('debugDiv').innerHTML += "<br>"+_tempDate.toString() + "---- Local ads.---Line 314 ----";
						if (mPlayerWaitForMediaEnd == true)
							{
							//---- online spot rejoin priority ----
							mPlayerWaitForMediaEnd = false;
							statusChangeSet();
							//---- END ----
							}
						else
							{
							autoAdvanceMedia('3');
							}
						//---- END ----
						}
					}
				else
					{
					//---- start banner roll ----
					bannerAutoRoll();
					//---- END ----
					//---- start stream monitoring for the player at the end of video or audio preroll cycle ----
					adReplacementInitialize();
					//---- END ----
					//---- run live programming ----
					changePlayerUrl(streamSRCbase,-1);
					//---- END ----
					}
				}

			}
		//---- END ----
		
		}
	//---- END ----
	
	//---- player transport control ----
	function mPlayerTransport(pAction) {
		//document.getElementById('debugDiv').innerHTML += pAction;
		if (typeof(mPlayer) != "undefined")
			{
			switch(pAction)
				{

				case "play":
					if (mPlayerPlaying != true)
						{
						mPlayerDivMessage.style.display = "inline";
						mPlayer.sendEvent('PLAY','true');
						}
					break;

				case "pause":
					mPlayer.sendEvent('PLAY','false');
					break;

				case "stop":
					mPlayerDivMessage.style.display = "none";
					mPlayer.sendEvent('STOP','true');
					break;

				}
			}
			
		//setPlayButtonAction(pAction);
	}
	//---- END ----
	
	//---- set play button action and icon ----
	function setPlayButtonAction(pAction) {
		switch(pAction)
			{
			
			case "play":
				document.getElementById('mPlayerButtonPlay').src = centralSvrPrefixURL + "/file_radio/v3/skins/skin_files/"+playerSkin+"/transport_pause.gif";
				document.getElementById('mPlayerButtonPlayLink').href = "javascript:mPlayerTransport('pause');";
				break;
				
			case "loading":
				document.getElementById('mPlayerButtonPlay').src = centralSvrPrefixURL + "/file_radio/v3/skins/skin_files/"+playerSkin+"/loading_circle.gif";
				break;

			default:
				document.getElementById('mPlayerButtonPlay').src = centralSvrPrefixURL + "/file_radio/v3/skins/skin_files/"+playerSkin+"/transport_play.gif";
				document.getElementById('mPlayerButtonPlayLink').href = "javascript:mPlayerTransport('play');";
				break;
				
			}
	}
	//---- END ----
	
	//---- position control, if on-demand ----
	function mPlayerPositionControl(Obj,event) {
		
		//---- for manual override to allow position control ----
		//mPlayerAllowPositionControl = true;
		//---- END ----
		
		if (mPlayerAllowPositionControl == true)
			{
			var newPosition = 0;

			if (window.ActiveXObject)
				{
				newPosition = window.event.offsetX;
				}
			else
				{
				var left = 0;
				var elm = Obj;
				while (elm)
					{
					left = elm.offsetLeft + left;
					elm = elm.offsetParent;
					}
					newPosition = event.pageX - left;
			}

			if (!isNaN(newPosition) &&
				nowPlayingDuration > 0)
				{
				newPosition -= 9;
				newPosition = (newPosition < 207 ? newPosition : 207);
				mPlayer.sendEvent("SEEK",newPosition * nowPlayingDuration/207);
				}
			}
	}	
	//---- END ----
	
	//---- position display ----
	var posUpdateSeq;
	var posUpdateElapsedSec = 0;
	
	function mPlayerPositionDsp(Obj) {
		mpDuration = Obj.duration;
		mpPosition = Obj.position;
		
		if (mpDuration > 0)
			{
			nowPlayingDuration = mpDuration;
			if (dspPositionBar == true)
				{
				posUpdateElapsedSec = mpPosition;
				if (mpDuration - mpPosition >= 0)
					{
					document.getElementById("mPlayerPositionBar").style.width = Math.floor(mpPosition*207/mpDuration) + "px";
					}	
				}

			if (mpDuration-mpPosition <= 0.5)
				{
				EOMpending = true;
				}
			if (EOMpending && mpPosition == 0)
				{
				setPlayButtonAction("stop");
				EOMpending = false;
				EOMflag = true;
				}
			if (streamResumeCounterVisible == true)
				{
				document.getElementById("streamResumeCounter").innerHTML = parseInt(mpDuration-mpPosition);
				}
			}
		else
			{
			nowPlayingDuration = 0;
			}
	}
	//---- END ----	
	
	//---- volume control ----
	var t;
	function mPlayerVolumeChange(dir)
		{

		// if a song is not playing then just return
		if (mPlayerPlaying == false)
			return;

		if (document.getElementById('vol_display'))
			document.getElementById('vol_display').innerHTML = mPlayerVolume;

		if (dir == 1 || dir == 5) // left or down
			{	
			mPlayerVolume -= 10;
			mPlayerVolume = (mPlayerVolume >= 0 ? mPlayerVolume : 0);
			if (dir == 1)
				t = setTimeout('mPlayerVolumeChange('+dir+')', 100);
			}
		else if (dir == 2) // right or up
			{
			mPlayerVolume -= -10;
			mPlayerVolume = (mPlayerVolume <= 100 ? mPlayerVolume : 100);
			t = setTimeout('mPlayerVolumeChange('+dir+')', 100);
			}
		else if (dir == 3) // stop changing volume
			{
			clearTimeout(t);
			}

		mPlayer.sendEvent('VOLUME',mPlayerVolume);
		return mPlayerVolume;
	} 	
	//---- END ----
	
	function changePlayerUrl(url,resetDuration) {
		if (resetDuration != undefined)
			{
			if (streamServerType == "FLA")
				{
				var streamObj = {type: "rtmp", file: "live", streamer: streamSRClive, duration: resetDuration};
				}
			else if (streamSRClive.indexOf("type=.flv") != -1)
				{
				var streamObj = {file: streamSRClive, duration: resetDuration};
				}
			else
				{
				var streamObj = {type: "sound", file: url, duration: resetDuration};
				}
			}
		else if (mPlayerMode == "video")
			{
			var streamObj = {file: url, type:"video"};
			}
		else
			{
			var streamObj = {file: url, type:"sound"};
			}
		mPlayer.sendEvent('LOAD',streamObj);
		mPlayer.sendEvent('PLAY','true');
	}
	
	//---- if player is in video mode, revert back to in-frame ----
	function mPlayerFullScreen() {
		mPlayer.sendEvent('FULLSCREEN','false');
	}
	//---- END ----

	//---- video preroll ----
	function dspVideoPreroll() {
		//---- progress bar display ----
		nowPlayingDuration = videoPrerollDuration;
		//mPlayerPositionDsp();
		//---- END ----

		mPlayerMode = "video";
		changePlayerUrl(streamSRCbase + "&fileType=PRV&videoPrerollFileID="+videoPrerollFileID);
	}
	//---- END ----
