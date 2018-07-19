//	var albumArtDspDiv = document.getElementById("albumArtDsp");
//	var bannerBDspDiv = document.getElementById("bannerB");
	
	var xmlhttp;
	var timeoutSeq;
	var lookupURL;
	var lookupMode = "statusUpdate";

	//---- initialize ad replacement on initial load or switch from preroll ----
	function adReplacementInitialize() {	
		if (fileArchive == false &&
			playerPollingEnable == true &&
			adReplacementInitializeStatus == false)
			{
			if (adReplacementFlag == true)
				{
				lookupMode = "adReplacementCheck";
				}
			else
				{
				//---- station is in live mode. display now playing info if data is not blank ----
				if (quickTrim(nowPlayingTitle) != "" ||
					quickTrim(nowPlayingArtist) != "" ||
					quickTrim(nowPlayingAlbum) != "")
					{
					document.getElementById('nowPlayingMaster').style.display = "inline";
					//---- get album art ----
					if (dspAlbumArt == true)
						{
						//lookupMode = "getAlbumArt";				
						}
					//---- END ----
					}
				//---- END ----
				
				resizeWindowToElement(resizePlayerDiv);

				}
			streamStatusMonitor();
			}
		adReplacementInitializeStatus = true;
	}
	//---- END ----
	
	function statusChangeSet() {
		if (adReplacement == true && 
			mPlayerWaitForMediaEnd == false)
			{
			adReplacementFlag = changeStatusTo;
			autoAdvanceMediaSetting = changeStatusTo;
			autoLoopMediaSetting = changeStatusTo;
			mPlayerURLSwitchLatch = true;
			autoAdvanceMedia('2');					
			}
	}	

	//---- display album art ----
	function fn_albumArtDsp(updateResponse){
		if (playerDspMode == "full")
			{

			if (updateResponse.indexOf("http") != -1)
				{
				//---- image was found ----
					//---- hide billboard banner ----
					document.getElementById("bannerB").style.display = "none";
					//---- show album art div ----
					document.getElementById("albumArtDsp").innerHTML = "<img src=\""+updateResponse+"\" height=\"200\" border=\"1\">";
					if (dspBannerB == true)
						{
						document.getElementById("albumArtDsp").style.display = "inline";
						}
					//---- hide album art in 15 seconds and show billboard again, if present ----
					if (bannerIDB.length > 0)
						{
						setTimeout("document.getElementById('albumArtDsp').style.display = 'none'",15000);
						}
					if (dspBannerB == true)
						{
						setTimeout("document.getElementById('bannerB').style.display = 'inline'",15000);
						}
				//---- END ----
				}
			else
				{
				document.getElementById("albumArtDsp").innerHTML = "";
				document.getElementById("albumArtDsp").style.display = "none";
				if (dspBannerB == true)
					{
					document.getElementById("bannerB").style.display = "inline";
					}
				}

			//document.getElementById("debugDiv").innerHTML += "********************<br>"+updateResponse+"<br>*******************<br>";

			}	
	}
	//---- END ----
	
	//---- stream status change process ----
	function playerSourceChange(updateResponse) {
	
		if (lookupMode == "getAlbumArt")
			{
			//---- album art response ----
			fn_albumArtDsp(updateResponse);
			//---- END ----

			//---- resume status change update ----
			lookupMode = "statusUpdate";
			setLookupURL((adReplacementFlag == true? "1" : "0"),nowPlayingTitle,nowPlayingArtist,nowPlayingAlbum,nowPlayingDuration);
			//---- END ----
				
			//---- END ----
			}
		else
			{
			//---- status change response ----
		
			updateResponse = quickTrim(updateResponse);
			updateResponseArry = updateResponse.split("|");
			
			if (updateResponseArry.length >= 5)
				{
				changeStatusTo = updateResponseArry[0];

				this_nowPlayingTitle = updateResponseArry[1].replace(/[<>]/g,"");
				this_nowPlayingArtist = updateResponseArry[2].replace(/[<>]/g,"");
				this_nowPlayingAlbum = updateResponseArry[3].replace(/[<>]/g,"");
				this_nowPlayingDuration = updateResponseArry[4].replace(/[<>]/g,"");
				if (changeStatusTo == 0 && updateResponseArry.length >= 6)
					{
					this_nowPlayingAlbumArt = updateResponseArry[5].replace(/[<>]/g,"");
					}
				else
					{
					this_nowPlayingAlbumArt = "";
					}

				//---- if spot file id was determined, set variable for banner sync ----
				if (updateResponseArry.length >= 7)
					{
					adReplacementPlayBannerFileID = (isNaN(updateResponseArry[5]) ? "" : updateResponseArry[5]);
					adReplacementPlayCampaignID = (isNaN(updateResponseArry[6]) ? "" : updateResponseArry[6]);
					}
				//---- END ----
				//---- on initial load, play media ----
				if (lookupMode == "adReplacementCheck")
					{
					autoAdvanceMedia('1');
					}
				//---- END ----

				//---- if no errors were returned, process change and check for status again ----
				lookupMode = "statusUpdate";
				setLookupURL(changeStatusTo,this_nowPlayingTitle,this_nowPlayingArtist,this_nowPlayingAlbum,this_nowPlayingDuration);

				changeStatusTo = (changeStatusTo == 1 ? true : false);

				//document.getElementById('debugDiv').innerHTML += "***" + updateResponse + "***<br>";

				if (adReplacementFlag != changeStatusTo)
					{
					//---- status change ----

						if (mPlayerWaitForMediaEnd == false)
							{
							mPlayerWaitForMediaEnd = (changeStatusTo == 0 && rejoinPriority == 'SPT' ? true: false);
							}

						statusChangeSet();

					//---- END ----
					}

				if (mPlayerWaitForMediaEnd == false)
					{
					//---- update now playing information ----
					if (changeStatusTo == 0)
						{

						if (this_nowPlayingTitle != nowPlayingTitle ||
							this_nowPlayingArtist != nowPlayingArtist ||
							this_nowPlayingAlbum != nowPlayingAlbum ||
							this_nowPlayingAlbumArt != nowPlayingAlbumArt)

							{
							//---- only if there is a change ----

								//---- show/hide album art ----
								if (this_nowPlayingAlbumArt != nowPlayingAlbumArt && dspAlbumArt == true)
									{
									fn_albumArtDsp(this_nowPlayingAlbumArt);
									}
								//---- END ----

								nowPlayingTitle = this_nowPlayingTitle;
								nowPlayingArtist = this_nowPlayingArtist;
								nowPlayingAlbum = this_nowPlayingAlbum;
								nowPlayingAlbumArt = this_nowPlayingAlbumArt;
								nowPlayingDuration = this_nowPlayingDuration;

								//---- update now playing and amazon buy link ----
								if (quickTrim(nowPlayingTitle) != "" ||
									quickTrim(nowPlayingArtist) != "" ||
									quickTrim(nowPlayingAlbum) != "" ||
									quickTrim(nowPlayingAlbumArt) != "")
									{

									var elem = document.getElementById('nowPlayingMaster');
									if(elem)
										elem.style.display = "inline";
									elem = document.getElementById('nowPlayingTitleDsp');
									if(elem)
										elem.innerHTML = "<nobr>"+nowPlayingTitle+"</nobr>";
									elem = document.getElementById('nowPlayingArtistDsp');
									if(elem)
										elem.innerHTML = "<nobr>"+nowPlayingArtist+"</nobr>";
									elem = document.getElementById('nowPlayingAlbumDsp');
									if(elem)
										elem.innerHTML = "<nobr>"+nowPlayingAlbum+"</nobr>";
									elem = document.getElementById('nowPlayingBuyLinkAmazon');
									if(elem)
										elem.href = "http://www.amazon.com/s/ref=nb_ss_gw?tag="+affiliateIDamazon+"&url=search-alias%3Daps&field-keywords="+escape(nowPlayingArtist+" "+(nowPlayingAlbum.length > 1 ? nowPlayingAlbum : nowPlayingTitle));
									document.title = nowPlayingTitle + " - " + nowPlayingArtist;
									//---- END ----		

									//document.getElementById("debugDiv").innerHTML +=lookupURL+"<br>";

									}
								//---- END ----

							//---- END ----
							}

						}
					else if (adReplacement == true)
						{
						nowPlayingTitle = "";
						nowPlayingArtist = "";
						nowPlayingAlbum = "";
						nowPlayingAlbumArt = "";
						nowPlayingDuration = 0;
						document.getElementById('nowPlayingMaster').style.display = "none";
						}
					//---- END ----

					}

				//---- END: status change response ----
				}
			}

		//---- recheck in 5 seconds for update, or immediately for album art ----
		if (playerPollingEnable == true)
			{
			timeoutSeq = setTimeout("loadXMLDoc()",(lookupMode == "getAlbumArt" ? 1 : 1000));
			}
		//---- END ----

	}
	//---- END ----
	
	//---- set lookup url ----
	function setLookupURL(lastCode,title,artist,album,duration) {
	
		if (lookupMode == "getAlbumArt")
			{
			lookupURL = "/radio_player_large_ajax_proxy.cfm?Keywords=" + escape(artist+" "+(album.length > 1 ? album : title));
			}
		else
			{
			//lookupURL = streamStatusMonitorURL + "?stcode=" + stationCallSign + "&LastCode=" + lastCode + "|" + escape(title) + "|" + escape(artist) + "|" + escape(album) + "|" + escape(duration);
			lookupURL = "/player_status_update/"+stationCallSign+".txt?randStr=" + Math.random();
			}	
	}
	//---- END ----
	
	//---- stream status change polling ----
	function streamStatusMonitor() {
		if (playerPollingEnable == true)
			{
			
			//---- set to monitor player state ----
			playerMonitorState = true;
			//---- END ----
			
			setLookupURL((adReplacementFlag == true? "1" : "0"),nowPlayingTitle,nowPlayingArtist,nowPlayingAlbum);
			loadXMLDoc();
				
			}
					
	}
	//---- END ----
	
	function loadXMLDoc() {
		//document.getElementById("debugDiv").innerHTML +=lookupMode+"========"+lookupURL+"<br>";
		if (xmlhttp!=null)
			{
			//---- abort previous connection ----
			xmlhttp.abort();
			}
		xmlhttp=null;
		if (window.XMLHttpRequest)
			{
			// code for all new browsers
			xmlhttp=new XMLHttpRequest();
			}
		else if (window.ActiveXObject)
			{
			// code for IE5 and IE6
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		if (xmlhttp!=null)
			{
			xmlhttp.onreadystatechange=state_Change;
			xmlhttp.open("GET",lookupURL,true);
			//xmlhttp.setRequestHeader('Content-Length', '1');
			xmlhttp.send('1');
			}
		}	
	
	function state_Change()	{
		//document.getElementById("debugDiv").innerHTML += "READY STATE: " + xmlhttp.readyState + "<br>";
		if (xmlhttp.readyState==4)
			{
			// 4 = "loaded"
			//document.getElementById("debugDiv").innerHTML += "STATUS HEADER: " + xmlhttp.status + "<br>*********" + xmlhttp.responseText + "******<br>";
			if (xmlhttp.status==200)
				{
				// 200 = "OK"
				playerSourceChange(xmlhttp.responseText);
				//xmlhttp.abort();
				//xmlhttp=null;
				}
			else if (lookupMode != "getAlbumArt")
				{
				//---- stop polling if unable to successfully load the update file ----
				playerPollingEnable = false;
				playerSourceChange('');
				}
			else
				{
				loadXMLDoc_tryAgain();
				}
			}
		}
	
    //---- cancel previous timeout and try again in 20 seconds ----
	function loadXMLDoc_tryAgain() {
		//document.getElementById("debugDiv").innerHTML +="STATUS HEADER: "+xmlhttp.status+"!!!!!!!!!!!!TRYAGAIN!!!!!!!!!!!!!!!!<br>";
		if (timeoutSeq != "")
			{
			clearTimeout(timeoutSeq);
			}
		//xmlhttp.abort();
		//xmlhttp=null;
		timeoutSeq = setTimeout("loadXMLDoc()",20000);
		}
	//---- END ----	
	
	//---- toggle album art display on/off ----
	function albumArtDspToggle(dspMode) {
		try
			{
			if (playerDspMode == "full" &&
				document.getElementById("albumArtDsp").innerHTML != "")
				{
				if (adReplacementFlag == false &&
					dspMode == "on")
					{
					if (dspBannerB == true)
						{
						document.getElementById("albumArtDsp").style.display = "inline";
						}
					document.getElementById("bannerB").style.display = "none";
					}
				else
					{
					if (bannerIDB.length > 0)
						{
						document.getElementById("albumArtDsp").style.display = "none";
						}
					if (dspBannerB == true)
						{
						document.getElementById("bannerB").style.display = "inline";
						}
					}
				}
			}
		catch(e) { }
		}
	//---- END ----
	
	//---- trim whitespace ----
	function quickTrim(str) {
		str = str.replace(/^\s+/, '');
		for (var i = str.length - 1; i >= 0; i--)
			{
			if (/\S/.test(str.charAt(i)))
				{
				str = str.substring(0, i + 1);
				break;
				}
			}
		return str;
		}
	//---- END ----
	