	//---- set auto media advance and loop ---->
	var autoAdvanceMediaSetting = true;
	var autoLoopMediaSetting = adReplacement;
	var shuffleMediaSetting = false;
	var shuffleMediaList = new Array();
	var mPlayerMode = "audio";
	var playMedia = true;
	if (mPlayerVolume == undefined)
		{
		var mPlayerVolume = 70;
		}
	var mPlayerWaitForMediaEnd = false;
	var changeStatusTo;
	var mPlayerSavedState = "";
	var mPlayerPlaying = false;
	var mPlayerWaitForStop = false;
	var resetmPlayerSavedState = false;
	var mPlayerURLSwitchLatch = true;
	var EOMpending = false;
	var EOMflag = false;	
	//---- END ---->

	//---- media advance toggles for on-demand play ----
		function autoAdvanceMediaToggle() {
			autoAdvanceMediaSetting = !autoAdvanceMediaSetting;
			document.getElementById("autoAdvanceMediaStatus").innerHTML = (autoAdvanceMediaSetting == true ? "all clips" : "one clip");
			if (autoAdvanceMediaSetting == false &&
				shuffleMediaSetting == true)
				{
				shuffleMediaToggle();
				}
			}

		function autoLoopMediaToggle() {
			autoLoopMediaSetting = !autoLoopMediaSetting;
			document.getElementById("autoLoopMediaStatus").innerHTML = (autoLoopMediaSetting == true ? "on" : "off");
			}

		function shuffleMediaToggle() {
			shuffleMediaSetting = !shuffleMediaSetting;
			document.getElementById("shuffleMediaStatus").innerHTML = (shuffleMediaSetting == true ? "on" : "off");
			if (shuffleMediaSetting == true)
				{
				shuffleMediaList = shuffleMediaList.concat(fileArchiveIndexList);
				// remove current track from shuffle playlist
				shuffleMediaListRemove = shuffleMediaList.splice(shuffleMediaList,1);

				if (autoAdvanceMediaSetting == false)
					{
					autoAdvanceMediaToggle();
					}
				}
			}
	//---- END ----

	//---- shuffle media ----
	function shuffleMedia() {
		if (shuffleMediaList.length == 0 &&
			autoLoopMediaSetting == true)
			{
			shuffleMediaList = shuffleMediaList.concat(fileArchiveIndexList);
			}
		if (shuffleMediaList.length > 0)
			{
			shufflePlayIndex = Math.floor(Math.random()*shuffleMediaList.length);
			currentFileArchivePlayIndex = shuffleMediaList[shufflePlayIndex];
			shuffleMediaListRemove = shuffleMediaList.splice(shufflePlayIndex,1);
			playMedia = true;
			}
		else	
			{
			playMedia = false;
			}
		}
	//---- END ----	

	//---- play file ----
	function playFile(fileArchivePlayIndex) {

		//---- disable position control. if on-demand, it will be re-enabled a few lines below, within this function ----
		mPlayerAllowPositionControl = false;
		//---- END ----
		
		//---- synchronize banner ----
		if (fileArchivePlayIndex!=undefined)
			{
			forceBannerFileID = fileArchiveIDList[fileArchivePlayIndex];
			if (bannerAutoRollStatus == "ini")
				{
				bannerAutoRoll();
				}
			else
				{
				bannerSelect();
				}
			}
		//---- END ----

		//---- set player url ----
		var url = streamSRCbase;
		
		if (fileArchivePlayIndex!=undefined)
			{
			url+="&onDemandMedia=" + fileArchiveList[fileArchivePlayIndex];
			}
		
		changePlayerUrl(url);
		//---- END ----

		//---- for on-demand, highlight file being played and set duration ----
		if (fileArchive == true)
			{
			//---- display file list and set flag to allow position control ----
			document.getElementById("onDemandFileList").style.display="inline";
			mPlayerAllowPositionControl = true;
			//---- END ----
			for (i=0;i<fileArchiveIDList.length;i++)
				{
				thisFontColor = (i == fileArchivePlayIndex ? "#ff0000" : "#000000");
				eval("document.getElementById('fileArchive_" + i + "').style.color=thisFontColor");
				}

			document.getElementById('filelistDiv').scrollTop = (fileArchivePlayIndex*13) - 15;

			//---- set file duration for progress bar update ----
			nowPlayingDuration = fileArchiveDurationList[fileArchivePlayIndex];
			if (embedPlayerType == "WMP")
				{
				mPlayerPositionDsp();
				}
			//---- END ----			
			
			}
		//---- END ----

		currentFileArchivePlayIndex = fileArchivePlayIndex;
		
		//---- update plays ----
		if (!isNaN(forceBannerFileID))
			{
			updatePlayCount(forceBannerFileID);
			}
		//---- END ----
	
		}
	//---- END ----
	
	//---- audio preroll ----
	var audioPrerollHold = false;
	function dspAudioPreroll() {

			audioPrerollHold = true;
			
			//---- set file id for banner sync ----
			forceBannerFileID = audioPrerollFileID;
			//---- END ----
			
			//---- start banner roll on initial function call ----
			if (audioPrerollStatus == "start")
				{
				bannerAutoRoll();
				}
			//---- END ----

			//---- progress bar display ----
			nowPlayingDuration = audioPrerollDuration;
			if (embedPlayerType == "WMP")
				{
				mPlayerPositionDsp();
				}
			//---- END ----
			
			//---- show stream resume counter ----
			streamResumeCounterDsp(true);
			//---- END ----
			
			mPlayerMode = "audio";
			audioPrerollStatus = "run";
			changePlayerUrl(streamSRCbase + "&fileType=PRA&audioPrerollFileID=" + audioPrerollFileID);

			forceBannerFileID = "";
			audioPrerollStatus = "end";

		}
	//---- END ----
	
	//---- update plays ----
	function updatePlayCount(fileID) {
		document.getElementById('filePlayCountUpdate').src = centralSvrPrefixURL+"radio_player_large_impression_update.cfm?updateScope=file&id="+fileID;
		}
	//---- END ----

	//---- stream resume counter display ----
	var streamResumeCounterVisible = false;
	
	function streamResumeCounterDsp(dspDiv) {
		document.getElementById("streamResumeCounterDsp").style.display = (dspDiv == true ? "inline" : "none");
		document.getElementById("streamResumeCounter").innerHTML = "....";
		streamResumeCounterVisible = dspDiv;
	}
	//---- END ----
	
	//---- display video player ----
	function videoPlayerDsp(dspFlag) {
		if (dspVideoPlayer == true &&
			mPlayerMode == "audio" &&
			playerDspMode != "mini")		
			{
			if (dspFlag == true &&
				audioPrerollHold == false &&
				adReplacementFlag == false
				)
				{
				mPlayerDiv.style.display = "inline";
				mPlayerDiv.style.position = "absolute";
				mPlayerDiv.style.left = dspVideoPlayerLeftOffset+"px";
				mPlayerDiv.style.top = dspVideoPlayerTopOffset+"px";
				mPlayerDiv.style.width = "350px";
				mPlayerDiv.style.height = "202px";
				mPlayerDiv.style.borderWidth = "1px";
				dspBannerB = false;
				albumArtDspToggle("off");
				document.getElementById("albumArtDsp").style.display = "none";
				document.getElementById("bannerB").style.display = "none";
				}
			else
				{
				mPlayerDiv.style.display = "block";
				mPlayerDiv.style.position = "absolute";
				mPlayerDiv.style.left = "0px";
				mPlayerDiv.style.top = "0px";
				mPlayerDiv.style.width = "1px";
				mPlayerDiv.style.height = "1px";
				mPlayerDiv.style.borderWidth = "0px";
				dspBannerB = true;
				document.getElementById("bannerB").style.display = "inline";
				albumArtDspToggle("on");
				}
			}
	}
	//---- END ----	