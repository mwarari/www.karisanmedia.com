	var prevBannerFileID = "";
	var forceBannerFileID = "";
	var thisBannerTypeList = new Array();
	var bannerRollCount = 0;

	//---- display banners ----
	function bannerSelect() {

		if (playerDspMode == "full")
			{
		
			var bannerSyncToFile = false;

			document.getElementById('bannerSpanSL').style.display="none";
			document.getElementById('bannerX').style.display="none";
			document.getElementById('bannerB').style.display="none";

			//---- reset banner list if all have been displayed, and hide banner spans ---->
			for (i=0;i<bannerTypeList.length;i++)
				{

				if (bannerTypeList[i] != "B" || bannerRollCount != 0)
					{
					eval("document.getElementById(\"banner"+bannerTypeList[i]+"\").innerHTML=\"&nbsp;\"");
					//eval("document.getElementById(\"banner"+bannerTypeList[i]+"\").style.display=\"none\"");
					}

				eval("syncBannerIndexList"+bannerTypeList[i]+" = new Array()");
				thisBannerList = eval("bannerAdFileID"+bannerTypeList[i]);
				thisRandomFillList = eval("bannerRandomFill"+bannerTypeList[i]);
				thisBannerIDList = eval("bannerID"+bannerTypeList[i]);

				eval("bannerSpanDsp"+bannerTypeList[i] +"= false");
				eval("bannerTypeDsp"+bannerTypeList[i] +"= false");
				
				//---- clear out shuffle array on file change ----
				if (forceBannerFileID != "" && prevBannerFileID != forceBannerFileID)
					{
					eval("shuffleBannerList"+bannerTypeList[i]+" = []");
					}
				//---- END ----

				//---- reset empty shuffle and sync arrays ----
				shuffleBannerList = eval("shuffleBannerList"+bannerTypeList[i]);
				if (shuffleBannerList.length == 0)
					{
					//---- loop over banner list, and if available for random fill, add to shuffle list ----
					var CR = 0;
					for (j=0;j<thisBannerIDList.length;j++)
						{
						if (thisRandomFillList[j] == true ||
							(thisRandomFillList[j] == false && thisBannerList[j] == ""))
							{
							eval("shuffleBannerList"+bannerTypeList[i]+"[CR] = bannerID"+bannerTypeList[i]+"[j]");
							CR -= -1;
							}
						}
					//---- END ----
					//---- replace loop above with this line in case of errors ----
					//eval("shuffleBannerList"+bannerTypeList[i]+" = shuffleBannerList"+bannerTypeList[i]+".concat(bannerID"+bannerTypeList[i]+")");
					//---- END ----
					}
				//---- END ----

				//---- reset banner indices, if empty or on file change, for the file requested ----
				if (forceBannerFileID != "" &&
						(
						eval("syncBannerIndexList"+bannerTypeList[i]+".length") == 0 ||
						prevBannerFileID != forceBannerFileID
						)
					)
					{
					for (j=0;j<thisBannerList.length;j++)
						{
						if (thisBannerList[j] == forceBannerFileID)
							{
							eval("syncBannerIndexList"+bannerTypeList[i]+" = syncBannerIndexList"+bannerTypeList[i]+".concat(thisBannerIDList[j])");
							//---- add banner id back to the master shuffle array for the type, if not already present ----
							var addSyncBannerID = true;
							for (k=0;k<eval("shuffleBannerList"+bannerTypeList[i]+".length");k++)
								{
								if (eval("shuffleBannerList"+bannerTypeList[i]+"[k]") == thisBannerIDList[j] &&
									(thisRandomFillList[j] == true ||
									(thisRandomFillList[j] == false && thisBannerList[j] == ""))
									)
									{
									var addSyncBannerID = false;
									break;
									}
								}
							if (addSyncBannerID == true)
								{
								eval("shuffleBannerList"+bannerTypeList[i]+" = shuffleBannerList"+bannerTypeList[i]+".concat(thisBannerIDList[j])");
								}
							//---- END ----
							}
						}
					}
				//---- END ----
				
				}
			//---- END ---->		

			prevBannerFileID = forceBannerFileID;

			//---- sync banners ----
			if (forceBannerFileID != "")
				{
				bannerRandomRequest('sync');
				}
			//---- END ---->

			//---- regular banners ----
			bannerRandomRequest('full');
			//---- END ---->

			//document.getElementById('bannerSLseparator').style.display = (bannerSpanDspX == true ? "none" : "inline");

			//---- add "visit sponsor" tag as apropriate ----
			if (bannerSpanDspX == true &&
				document.getElementById("bannerX").innerHTML.indexOf("visit our sponsors") == -1)
				{
				document.getElementById("bannerX").innerHTML = "Please visit our sponsors &nbsp;&nbsp;&nbsp;" + document.getElementById("bannerX").innerHTML;
				}
			else
				{
				if (bannerSpanDspS == false &&
					document.getElementById("bannerS").innerHTML.indexOf("visit our sponsors") == -1)
					{
					document.getElementById("bannerS").innerHTML = "Please visit our sponsors&nbsp;&nbsp;&nbsp;";
					//document.getElementById("bannerS").style.display="inline";
					}
				else if (bannerTypeDspL == false &&
						 document.getElementById("bannerL").innerHTML.indexOf("visit our sponsors") == -1)
					{
					document.getElementById("bannerL").innerHTML = "&nbsp;&nbsp;&nbsp;Please visit our sponsors&nbsp;&nbsp;&nbsp;" + document.getElementById("bannerL").innerHTML;
					//document.getElementById("bannerL").style.display="inline";
					}
				}
			//---- END ----

			bannerAutoRollStart = true;
			bannerRollCount -= -1;
			resizeWindowToElement(resizePlayerDiv);
			
		}
		
	}
	//---- END ----
	
	//---- request random banners ----
	function bannerRandomRequest(bannerScope) {
		
		//---- billboard and text ----
			//---- skip non-sync billboard at first run, to display station billboard ----
			//if (bannerRollCount != 0)
			//	{
			//	bannerRandom(bannerScope,'B');
			//	}
			//---- END ----
			bannerRandom(bannerScope,'B');
			//bannerRandom(bannerScope,'T');
		//---- END ---->

		getRandomType = true;
		thisBannerType = "S";
		
		//---- if a S, L or X banner has been displayed, do not try to randomly determine whether to try X ----
		if (bannerSpanDspS == true ||
			bannerSpanDspL == true ||
			bannerSpanDspX == true)
			{
			getRandomType = false;
			}
		//---- END ----

		//---- determine random banner type for bottom ad space ---->
		if (getRandomType == true)
			{
			thisBannerType = bannerTypeList[Math.floor(Math.random()*bannerTypeList.length)];
			}
		//---- END ---->

		//---- get either an X or (S and L) banners ----
		if (thisBannerType == "X")
			{
			bannerRandom(bannerScope,"X");
			}
		else if (bannerSpanDspX == false)
			{
			bannerRandom(bannerScope,"S");
			bannerRandom(bannerScope,"L");
			}
		//---- END ----
		
		//---- if a S or L banner have not been determined, try X ----
		if (bannerSpanDspS == false &&
			bannerSpanDspL == false)
			{
			bannerRandom(bannerScope,"X");
			}
		//---- END ----
		
	}
	//---- END ----

	//---- random banner select ----
	function bannerRandom(thisBannerScope,thisBannerType,thisBannerSpan) {
		
		if (thisBannerSpan == undefined)
			{
			thisBannerSpan = thisBannerType;
			}

		if(eval("bannerSpanDsp"+thisBannerSpan) == false)
			{

			thisShuffleBannerList = eval("shuffleBannerList"+thisBannerType);		
			thisSyncBannerIndexList = eval("syncBannerIndexList"+thisBannerType);		
			thisBannerIndex = -1;
			bannerArrayPos = -1;

			if (thisBannerScope == "sync")
				{
				if (thisSyncBannerIndexList.length > 0)
					{
					thisBannerIndexSync = Math.floor(Math.random()*thisSyncBannerIndexList.length);
					//---- get actual index based on full banner list ----
					for (i=0;i<thisShuffleBannerList.length;i++)
						{
						if (thisShuffleBannerList[i] == thisSyncBannerIndexList[thisBannerIndexSync])
							{
							thisBannerIndex = i;
							break;
							}
						}
					//---- END ----
					}
				}
			else if (thisShuffleBannerList.length > 0)
				{
				thisBannerIndex = Math.floor(Math.random()*thisShuffleBannerList.length);
				}

			if (thisBannerIndex != -1)
				{

				//---- get position in master type array ----
				for (i=0;i<eval("bannerID"+thisBannerType+".length");i++)
					{
					if (eval("bannerID"+thisBannerType+"[i]") == thisShuffleBannerList[thisBannerIndex])
						{
						bannerArrayPos = i;
						break;
						}
					}
				//---- END ----
				
				if (bannerArrayPos != -1)
					{
					//---- found banner. display ----
					thisBannerID = eval("bannerID"+thisBannerType+"[bannerArrayPos]");
					thisBannerCode = eval("bannerCode"+thisBannerType+"[bannerArrayPos]");
					thisBannerURL = eval("bannerURL"+thisBannerType+"[bannerArrayPos]");
					thisBannerImg = eval("bannerImg"+thisBannerType+"[bannerArrayPos]");

					tempBannerListRemove = eval("shuffleBannerList"+thisBannerType+".splice(thisBannerIndex,1)");

					//---- also remove index from sync list ----
					if (thisBannerScope == "sync")
						{
						tempBannerListRemove = eval("syncBannerIndexList"+thisBannerType+".splice(thisBannerIndexSync,1)");
						}
					//---- END ----

					bannerDsp(thisBannerSpan,thisBannerType,thisBannerID,thisBannerCode,thisBannerURL,thisBannerImg);							
					//---- END ----
					}
				}

			if (bannerArrayPos == -1)
				{
				if (thisBannerType == "X")
					{
					//---- no X banner found. try other types in its place ----
					bannerRandom(thisBannerScope,"S");
					bannerRandom(thisBannerScope,"L");
					}
				else if (thisBannerType == "L")
					{
					//---- no L banner found. try S in its place ----
					bannerRandom(thisBannerScope,"S","L");
					}
				}
				
			}
	}
	//---- END ---->
	
	//---- display banner ----
	function bannerDsp(thisBannerSpan,thisBannerType,thisBannerID,thisBannerCode,thisBannerURL,thisBannerImg,thisBannerWidth) {
	
		if (thisBannerType != "B" || (thisBannerType == "B" && dspBannerB == true))
			{
			
			thisBannerWidth = (thisBannerType == "X" ? "468" : (thisBannerType == "L" ? "395" : "234"))

			switch (thisBannerType) {

				case "S": thisBannerWidth = 234; thisBannerHeight = 60; break;
				case "L": thisBannerWidth = 395; thisBannerHeight = 60; break;
				case "X": thisBannerWidth = 468; thisBannerHeight = 60; break;
				case "B": thisBannerWidth = 400; thisBannerHeight = 200; break;
				case "T": thisBannerWidth = 505; thisBannerHeight = 30; break;

			}

			eval("bannerSpanDsp"+thisBannerSpan+"= true");
			eval("bannerTypeDsp"+thisBannerType+"= true");

			bannerSpan = eval("document.getElementById(\"banner"+thisBannerSpan+"\")");
			bannerSpan.innerHTML = "";

			var clickThroughScript = "<a href=\""+centralSvrPrefixURL+"clickthrough.cfm?stationCallSign="+stationCallSign+"&bannerID="+thisBannerID+"&forwardURL="+escape(thisBannerURL)+"\" target=\"_blank\">";

			if (thisBannerType == "T")
				{
				//---- text ad ----
				bannerSpan.innerHTML += clickThroughScript + thisBannerCode + "</a>";
				}
			else
				{
				if (thisBannerCode != "")
					{
					//bannerSpan.innerHTML += thisBannerCode;
					$(bannerSpan).html(thisBannerCode);
					}
				else
					{
					bannerSpan.innerHTML += (thisBannerURL != "" ? clickThroughScript : "") + "<img src=\""+centralSvrPrefixURL+"file_radio/stations_large/"+stationCallSign+"/"+thisBannerImg+"\" align=\"middle\" border=\"0\" height=\""+thisBannerHeight+"\" width=\""+thisBannerWidth+"\" alt=\"Click here to visit our sponsor\" style=\"border:1px solid black;\"></a>";
					}
				}

			if (thisBannerSpan == "S" ||
				thisBannerSpan == "L")
				{
				document.getElementById('bannerSpanSL').style.display="inline";
				}
			else
				{
				//---- if this is a billboard banner, hide album art if currently displayed ----
				if (thisBannerType == "B")
					{
					document.getElementById("albumArtDsp").style.display = "none";
					}
				//---- END ----
				bannerSpan.style.display="inline";
				}

			//---- update impressions ----
			document.getElementById('bannerImpressionCount'+thisBannerSpan).src = centralSvrPrefixURL+"radio_player_large_impression_update.cfm?updateScope=banner&id="+thisBannerID;
			//---- END ----
			
			}
	
	}
	//---- END ----

	//---- banner auto roll ----
	function bannerAutoRoll() {
		if (bannerAutoRollStatus == "ini")
			{
			bannerSelect();
			bannerAutoRollStatus = "run";
			if (bannerAutoRollFqcy > 0)
				{
				var rollBanners = setInterval("bannerSelect()",bannerAutoRollFqcy*1000);
				}
			}
	}
	//---- END ----
