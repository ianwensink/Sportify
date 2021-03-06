<?php 
require ('initialize.php');

if (isset($_POST['page']) && !empty($_POST['page']))
{
	$page 						= $_POST['page'];
	$_SESSION["currentPage"] 	= $page;
	switch ($page) 
	{
		case 2:
			echo '<div class="white-container z-depth-1">	
					<div class="stagger">
						<div class="page-navigation back-arrow" data-transition="slide" data-page="1"><span class="' . CLASS_BACK_ARROW . '"></span></div>
						<h2 class="header teal">Gepersonaliseerde muziek</h2>
						<div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
						<h3 class="intro-subtitle">Kies hieronder uit wat voor muziek je lijst moet bestaan.</h3>
						<div class="row content-container">
							<ul class="row list-menu">
								<li data-page="3" data-transition="slide" class="choose-personalized-button waves-effect waves-green border-bottom page-navigation col s12 center">
									Genres
								</li>
								<li data-page="4" data-transition="slide" class="choose-personalized-button waves-effect waves-green border-bottom page-navigation col s12 center">
									Artiesten
								</li>
								<li data-page="'  . (isLoggedIn() ? 6 : 12) . '" data-transition="slide" class="choose-personalized-button waves-effect waves-green border-bottom page-navigation col s12 center">
									Eigen afspeellijst
								</li>
							</ul>
							<div class="right page-navigation next-button-container" data-transition="slide" data-page="7">
								<p class="waves-effect waves-orange btn-flat next-button"> 
									Skip 
									<span class="mdi-content-send"></span>
								</p>
							</div>
		    			</div>
    				</div>
    				<div id="pageInfoText">
		    				Houd je van alleen Rock en house geef dit dan aan via genre. Ben je meer in om muziek terug te krijgen die gebaseerd is op je favoriete artiest, klik dan op ‘Artiest’. Heb je liever je muziek gebaseerd op een eigen Spotify Afspeellijst, kies dan voor ‘Afspeellijst’.
Heb je vandaag geen zin om zelf keuzes te maken, druk dan op ‘skip’ en dan maken wij een mooie lijst voor je.
		    			</div>
    			</div>';
			break;
		case 3:
			echo '<div class="white-container z-depth-1">	
					<div class="stagger">
						<div class="page-navigation back-arrow" data-transition="slide" data-page="2"><span class="' . CLASS_BACK_ARROW . '"></span></div>
						<h2 class="header teal">Genre</h2>
						<div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
						<div class="row content-container">
							<div class="input-field col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
						        <input data-type="genres" id="searchGenre" type="text" class="validate searchItems">
						        <label for="searchGenre">Zoek een genre</label>
						    </div>
						    <div class="col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
							    <ul class="chosen-list">
							    </ul>
							    <ul class="result-list">
							    </ul>
							</div>
		    				<div data-function="pushToChosen" class="right page-navigation next-button-container" data-transition="slide" data-page="7">
		    					<p class="waves-effect waves-orange btn-flat next-button"> 
		    						Next 
		    						<span class="mdi-content-send"></span>
		    					</p>
		    				</div>
						</div>
					</div>
					<script>
						var searchDisplayText = function(v){ return v.name; };
						getItems ("genre", searchDisplayText);
						$(".white-container")
							.on("keyup", "#searchGenre", function (e) {
								getItems ("genre", searchDisplayText, e);
							})
							.on("click", "ul.result-list .clickable", addToChosenList)
							.on("click", "ul.chosen-list .clickable", removeFromChosenList)
					</script>
					<div class="modal maximum-chosen">
					    <div class="modal-content">
					      <h4>Oeps!</h4>
					      <p>Je kunt maximaal vijf genres tegelijk kiezen!</p>
					    </div>
					    <div class="modal-footer">
					      <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Okay</a>
					    </div>
					</div>
					<div id="pageInfoText">
		    				Klik op ‘zoek een genre’ om je genre op te zoeken, klik vervolgens op het genre dat je wilt toevoegen.
		    			</div>
				</div>
				';
			break;
		case 4:
			echo '<div class="white-container z-depth-1">
					<div class="stagger">
						<div class="page-navigation back-arrow" data-transition="slide" data-page="2"><span class="' . CLASS_BACK_ARROW . '"></span></div>
						<h2 class="header teal">Artiest</h2>
						<div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
						<div class="row content-container">
							<div class="input-field col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
						        <input data-type="artiesten" id="searchArtist" type="text" class="validate searchItems">
						        <label for="searchArtist">Zoek een artiest</label>
						    </div>
						    <div class="col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
							    <ul class="chosen-list" id="chosenArtists">
							    </ul>
							    <ul class="result-list" id="artistResults">
							    </ul>
							</div>
		    				<div data-function="pushToChosen" class="right page-navigation next-button-container" data-transition="slide" data-page="7">
		    					<p class="waves-effect waves-orange btn-flat next-button"> 
		    						Next 
		    						<span class="' . CLASS_NEXT_BUTTON . '"></span>
		    					</p>
		    				</div>
						</div>
						<div id="pageInfoText">
		    				Klik op ‘zoek een artiest’ om je artiest op te zoeken, klik vervolgens op de artiest die je wilt toevoegen.

		    			</div>
					</div>
				    <script>
				   		var searchDisplayText = function(v){ return v.name; };
				    	getItems ("artist", searchDisplayText);
						$(".white-container")
							.on("keyup", "#searchArtist", function (e) {
								getItems ("artist", searchDisplayText, e);
							})
							.on("click", "ul.result-list .clickable", addToChosenList)
							.on("click", "ul.chosen-list .clickable", removeFromChosenList)
				    </script>
				</div>';
			break;
		case 6:
			echo '<div class="white-container z-depth-1">
					<div class="stagger">
						<div class="page-navigation back-arrow" data-transition="slide" data-page="2"><span class="' . CLASS_BACK_ARROW . '"></span></div>
						<h2 class="header teal">Gebruik een eigen lijst</h2>
						<div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
						<div class="row content-container">
                            <form id="uri-form">
                                <div class="input-field col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
                                    <input id="uriplaylist" type="text" class="validate searchItems">
                                    <label for="uriplaylist">Voer hier een Spotify playlist ID of URI in</label>
                                </div>
                            </form>
                            <p class="col center col s10 m10 l8 offset-m1 offset-s1 offset-l2">
                                Of kies een lijst hieronder.
                            </p>
							<form>	
								<ul id="playlists" class="col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field"></ul>
							</form>
                            <ul id="playlist-pagination" class="pagination col s12 m12 l12">
                            </ul>
		    				<div class="right page-navigation next-button-container" data-transition="slide" data-function="validatePlaylist" data-page="7">
		    					<p class="waves-effect waves-orange btn-flat next-button"> 
		    						Next 
		    						<span class="' . CLASS_NEXT_BUTTON . '"></span>
		    					</p>
		    				</div>
		    			</div>
		    			<div id="pageInfoText">
		    				Klik op ‘zoek een Afspeellijst’ om je afspeellijst op te zoeken, klik vervolgens op de afspeellist die je wilt toevoegen.

		    			</div>
					</div>
					<script>
						$.getScript("scripts/getusersplaylist.js")
					</script>
				</div>';
			break;
		case 7:
			echo '<div class="white-container z-depth-1">
					<div class="stagger">
						<h2 class="header teal">Laden afspeellijst</h2>
						<div class="row center content-container">
							<div class="col s10 m10 l8 offset-m1 offset-s1 offset-l2">
								<div class="preloader-wrapper big active" id="spinner-loading-playlist">
								  <div class="spinner-layer spinner-blue">
								    <div class="circle-clipper left">
								      <div class="circle"></div>
								    </div><div class="gap-patch">
								      <div class="circle"></div>
								    </div><div class="circle-clipper right">
								      <div class="circle"></div>
								    </div>
								  </div>

								  <div class="spinner-layer spinner-red">
								    <div class="circle-clipper left">
								      <div class="circle"></div>
								    </div><div class="gap-patch">
								      <div class="circle"></div>
								    </div><div class="circle-clipper right">
								      <div class="circle"></div>
								    </div>
								  </div>

								  <div class="spinner-layer spinner-yellow">
								    <div class="circle-clipper left">
								      <div class="circle"></div>
								    </div><div class="gap-patch">
								      <div class="circle"></div>
								    </div><div class="circle-clipper right">
								      <div class="circle"></div>
								    </div>
								  </div>

								  <div class="spinner-layer spinner-green">
								    <div class="circle-clipper left">
								      <div class="circle"></div>
								    </div><div class="gap-patch">
								      <div class="circle"></div>
								    </div><div class="circle-clipper right">
								      <div class="circle"></div>
								    </div>
								  </div>
								</div>
							</div>
							<div id="loading-playlist-bar-container" class="col s10 m10 l8 offset-m1 offset-s1 offset-l2">
								<div id="loading-playlist-bar" class="progress">
							    	<div class="determinate" style="width: 0%"></div>
								</div>
							</div>
							<div class="col s12 m12 l12">	
								<p id="loading-playlist">De playlist wordt gegenereerd... Even geduld a.u.b.</p>
							</div>
						</div>
	    			</div>
	    			<script>  
	    				skipPersonalMusic ();
	    			</script>
	    		</div>';
			break;
		case 9:
			echo '<div class="white-container z-depth-1">
					<div class="stagger">
						<div class="page-navigation back-arrow" data-transition="slide" data-page="1"><span class="' . CLASS_BACK_ARROW . '"></span></div>
						<h2 class="header teal">Intervaltraining</h2>
						<div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
						<div class="row content-container">
							 <div class="form-field col s10 m10 l8 offset-m1 offset-s1 offset-l2">
						    	<p class="center">Snelheid rennen (BPM): <span class="mdi-action-info-outline tooltipped" data-position="top" data-delay="50" data-tooltip="BPM staat voor Beats Per Minute"></span></p>
						    	<div class="range-field form-field">
									<input type="range" id="bpmTwo">
								</div>
						    </div>
						     <div class="form-field col s10 m10 l8 offset-m1 offset-s1 offset-l2">
						    	<p class="center">Snelheid wandelen (BPM): <span class="mdi-action-info-outline tooltipped" data-position="top" data-delay="50" data-tooltip="BPM staat voor Beats Per Minute"></span></p>
						    	<div class="range-field form-field">
									<input type="range" id="bpmOne">
								</div>
						    </div>
							<div id="duration" class="center col s10 m10 l8 offset-m1 offset-s1 offset-l2">Duur van de training: <strong><span></span> minuten</strong></div>
							<div id="button_container" class="form-field col s10 m10 l8 offset-m1 offset-s1 offset-l2">
								<a data-action="add" id="add-interval" class="btn-floating floating-button btn waves-effect waves-light green"><i class="mdi-content-add"></i></a>
								<a data-action="remove" id="remove-interval" style="display:none;" class="btn-floating floating-button btn waves-effect waves-light red"><i class="mdi-content-remove"></i></a>
								<div></div>
								<p id="first-p">Voeg interval toe</p>
								<p style="display:none" id="second-p">Verwijder interval</p>
							</div>
							<ul id="interval-container" class="col s6 m6 l6 offset-m3 offset-s3 offset-l3">
							</ul>
		    				<div class="right page-navigation next-button-container" data-transition="slide" data-function="validateIntervalTraining" data-page="2">
		    					<p class="waves-effect waves-orange btn-flat next-button"> 
		    						Next 
		    						<span class="' . CLASS_NEXT_BUTTON . '"></span>
		    					</p>
		    				</div>
		    			</div>
		    			<div id="pageInfoText">
		    				Stel je eigen training samen! Stel een snelheid in voor de rengedeeltes en voor de wandelgedeeltes. Druk op het groene plusje om een extra interval toe te voegen.

		    			</div>
					</div>
					<script>
						$.getScript("scripts/interval.js");
						$("#bpmTwo").rangify({
							width:              "100%",
							min:                100,
							max:                160,
							step:               0,
							value:              120,
							valueDivider:       30,
							thumbColor:         "orange",
							valuePosition:      "bubble",
							valueBgColor:       "orange",
							valueColor:         "#fff",
							dividerColor:       "#c2c0c2",
							dividerLabels:      ["Beginner", "Normaal", "Gevorderd"],
							dividerLabelColor:  "#000000",
							labelType:          "text",
							bubbleAlwaysActive: true
						});
						$("#bpmOne").rangify({
							width:              "100%",
							min:                70,
							max:                110,
							step:               0,
							value:              90,
							valueDivider:       0,
							thumbColor:         "orange",
							valuePosition:      "bubble",
							valueBgColor:       "orange",
							valueColor:         "#fff",
							labelType:          "none",
							bubbleAlwaysActive: true
						});
					</script>
				</div>';
			break;
		case 10:
			echo '<div class="white-container z-depth-1"> 
			 <div class="stagger">
			  <div class="page-navigation back-arrow" data-transition="slide" data-page="13"><span class="' . CLASS_BACK_ARROW . '"></span></div>
			  <h2 class="header teal">Login</h2>
			  <div class="row content-container">
			   <div class="col s10 m10 l10 offset-m1 offset-s1 offset-l1">
			    <a class="waves-effect waves-light btn teal text" href="https://accounts.spotify.com/authorize?client_id=' . SPOTIFY_CLIENT_ID . '&response_type=token&redirect_uri=' . ROOT . 'nieuwelijst.php?page%3D17&scope=playlist-read-private%20playlist-modify-public%20playlist-modify-private' . (isLoggedIn() ? '"' : '&show_dialog=true"') . '"><img class="spotify-logo-mini" src="images/spotify-logo-mini.png" alt="">Login met Spotify</a>
			   </div>
			  </div>
			 </div>
			</div>';
			break;
		case 11:
			echo '<div class="white-container z-depth-1"> 
			 <div class="stagger">
			  <h2 class="header teal">Playlist opgeslagen</h2>
			  <div class="row content-container">
			   <div class="col s10 m10 l8 offset-m1 offset-s1 offset-l2">
			    <p style="margin-top:30px" class="center">
			     Je lijst is nu toegevoegd!
			    </p>
			    <div class="col s10 m10 l10 offset-m1 offset-s1 offset-l1">
			        <a id="playlistlink" class="waves-effect waves-light btn teal text" ><img class="spotify-logo-mini"  src="images/spotify-logo-mini.png" alt="">Open afspeellijst</a>
			    </div>
            </div>
            <div style="margin-top:20px" class="col s10 m10 l8 offset-m1 offset-s1 offset-l2 center">
			    <p>
                    Open Spotify en ga naar \'Afspeellijsten\' om hem te beluisteren.
			    </p>
			    <br>
			    <p id="veel-sportplezier-text">Veel sportplezier!</p>
                </div>
		   </div>
			   <div class="right page-navigation next-button-container" data-transition="slide" data-page="home">
			    <p class="waves-effect waves-orange btn-flat next-button"> 
			     Home
			     <span class="' . CLASS_NEXT_BUTTON . '"></span>
			    </p>
			   </div>
			  </div>
			 </div>
			 <script>
			  $("#playlistlink").attr("href", "spotify:user:" + getCookie("user_id") + ":playlist:"+ localStorage.playlist_id);
			  if (localStorage.trainingType == "intervaltraining") {
			  	$("#veel-sportplezier-text").before($("<p>", {text: "Bij een intervaltraining is het belangrijk dat je de afspeellijst niet shuffelt!"})).before($("<br>"));
			  }
			 </script>
			</div>';
		        break;
		case 'home':
			echo '<script>location.href="' . ROOT . '"</script>';
			break;
		case 12:
			echo '<div class="white-container z-depth-1">
			 <div class="stagger">
			  <div class="page-navigation back-arrow" data-transition="slide" data-page="2"><span class="' . CLASS_BACK_ARROW . '"></span></div>
			  <h2 class="header teal">Login</h2>
			  <div class="row content-container">
			   <div class="col s10 m10 l10 offset-m1 offset-s1 offset-l1">
			    <a class="waves-effect waves-light btn teal text" href="https://accounts.spotify.com/authorize?client_id=' . SPOTIFY_CLIENT_ID . '&response_type=token&redirect_uri=' . ROOT . 'nieuwelijst.php%3Fpage%3D6&scope=playlist-read-private%20playlist-modify-public%20playlist-modify-private' . (isLoggedIn() ? '"' : '&show_dialog=true"') . '><img class="spotify-logo-mini" src="images/spotify-logo-mini.png" alt="">Login met Spotify</a>
			   </div>
			  </div>
			 </div>
			</div>';
			break;
		case 13:
			echo '<div class="white-container z-depth-1">
	                <div class="stagger">
	                    <div class="page-navigation back-arrow" data-transition="slide" data-page="2" data-function="removeAttributes"><span class="' . CLASS_BACK_ARROW . '"></span></div>
	                    <h2 class="header teal">Lijst wijzigen</h2>
	                    <div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
	                    <h3 class="intro-subtitle">Beluister je lijst en vervang eventueel tracks.</h3>
	                    <div class="row content-container">
	                        <ul id="songs" class="center col s12 m12 l12">
	                        </ul>
	                        <div class="right page-navigation next-button-container" data-transition="slide" data-page="' . (isLoggedIn() ? 17: 10) . '">
	                            <p class="waves-effect waves-orange btn-flat next-button"> 
	                                Next 
	                                <span class="' . CLASS_NEXT_BUTTON . '"></span>
	                            </p>
	                        </div>
	                    </div>
	                    <div id="pageInfoText">
		    				Dit is jouw Lijst, druk op kruisje om nummers te vervangen door een ander nummer. Wil je de nummers eerst even luisteren klik dan op het play icoontje op de album cover.

		    			</div>
	                </div>
	                <script>
                        $.getScript("scripts/addplaylist.js").done(function(){
                            var playlist = JSON.parse(localStorage.playlist);
                            localStorage.playlistImage = playlist[0][0][5];
                            printSongs (playlist);
                        });
                    </script>
           		</div>';
			break;
		case 14:
			echo '<script>$.when(login()).then(function(){if (isLoggedIn()) {location.href="' . ROOT . '"}})</script>';
			break;
	    case 15:
	        function printProfilePlaylists ($conn)
	        {
	            $data   = getProfilePlaylists($conn);

	            if ($data->num_rows == 0)
	            {
	            	echo '<ul><li style="margin-top:30px;" class="col s12 center">Je hebt nog geen afspeellijsten.</li></ul>';
	            }
	            else
	            {
	            	echo "	                    	<tr>
	                    		<th>
	                    			
	                    		</th>
	                    		<th>
	                    			Naam afspeellijst
	                    		</th>
	                    		<th>
	                    			BPM
	                    		</th>
	                    		<th>
	                    			Verwijder
	                    		</th>
	                    	</tr>";
	            }

	            while ($row = $data -> fetch_assoc()) {
	            	$name = truncateText($row["name"]);
	                echo '<tr data-page="16" data-transition="slide" data-item="'. $row["idPlaylists"] .'" class="page-navigation border-bottom playlist"> <td style="width: 74px; height: 100px;" class="albumart"><img src="'. $row["image"] . '"></td><td class="tooltipped" data-position="top" data-delay="0" data-tooltip="' . $row["name"] . '">'. $name . '</td><td class="center"> '. $row["BPM"] . '</td><td class="delete_td"><input type="checkbox" id="playlist_' . $row["idPlaylists"] . '" value="' . $row["idPlaylists"] . '"><label for="playlist_' . $row["idPlaylists"] . '"></td></tr>';
	            }
	        }

	        function getProfilePlaylists ($conn)
	        {
	            $getPlaylistsQuery = 
	               "SELECT * FROM ". DB_PREFIX ."playlists P LEFT JOIN ". DB_PREFIX ."profiles_likes_playlists PLP ON PLP.profiles_idProfiles = '" . $_COOKIE["profile"] . "' WHERE P.profiles_idProfiles='" . $_COOKIE["profile"] . "' OR PLP.profiles_idProfiles = '" . $_COOKIE["profile"] . "'";
	            
	            return $conn -> query($getPlaylistsQuery);
	        }
	        echo '<div class="white-container z-depth-1">
	            <div class="stagger">
	                <div class="page-navigation back-arrow" data-transition="slide" data-page="home"><span class="' . CLASS_BACK_ARROW . '"></span></div>
	                <h2 class="header teal">Mijn lijsten</h2>
	                <div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
	                <div class="select_all"><input id="select-checkbox" type="checkbox"><label for="select-checkbox"></label></div>
	                <div class="delete_button"><i class="fa fa-trash-o fa-2x"></i></div>
	                <div class="row content-container">
	                    <table>
	                            '; printProfilePlaylists($conn);  echo '
	                    </table>
	                </div>
	                <div id="pageInfoText">
		    				Wil je je eigen lijst bekijken, klik dan op een van je lijsten en geniet nog even na.
		    			</div>
	            </div>
	            <script>
	           	$(function () {
	           		$("tr").on("click", ".delete_td", function (e) {
	           			e.stopPropagation();
	           		})
					$(".delete_button").on("click", confirmDelete);
					$(".confirm").on("click", deleteLists);
					$(".select_all #select-checkbox").on("change", toggleSelectAll);
					$(".tooltipped").tooltip({delay: 0});
	           	});

				function toggleSelectAll () {
	           		if ($(".select_all").hasClass("selected")) {
						$(".select_all").removeClass("selected").addClass("deselected");
						$("input[type=checkbox]:checked").prop("checked", false);
	           		}
	           		else {
	           			$(".select_all").addClass("selected").removeClass("deselected");
	           			$("input[type=checkbox]").prop("checked", true);
	           		}
				}

				function confirmDelete () {
					if ($(".delete_td input[type=checkbox]:checked").length > 0)
						$("#confirm_delete").openModal();
					else
						toast("Selecteer eerst minimaal één lijst", 4000);
				}

				function deleteLists () {
					var playlists = [];
					if ($(".delete_td input[type=checkbox]:checked").length > 0) {
						$(".delete_td input[type=checkbox]:checked").each(function (k, v) {
							playlists.push($(v).val());
						});
						console.log(playlists);
						$.ajax({
							url: "includes/deleteplaylists.php",
							method: "post",
							dataType: "text",
							data: {
								playlists: playlists
							},
							success: function (output) {
								console.log(output);
								location.reload();
							},
							error: function (output) {
								console.log(output);
							}
						})
					}
				}
	           </script>
	         </div>';
	    	break;
		case 16:
		    function getPlaylistInfo ($conn) 
		    {
		        if (isset($_POST["extraData"]) && !empty($_POST["extraData"])) 
		        {
		            $getPlaylistInfoQuery = 
		                "SELECT * 
		                FROM ". DB_PREFIX ."playlists
		                WHERE idPlaylists='". $_POST["extraData"] ."'";
		            
		            $row = $conn -> query($getPlaylistInfoQuery);
		            $data = $row -> fetch_assoc();
		            return $data;
		        }
		        else
		        {
		            //Back to my lists
		        }
		    }
		    function getTagsInfo ($conn)
		    {
		        if (isset($_POST["extraData"]) && !empty($_POST["extraData"]))
		        {
		            $tagInfo = [];
		            $getTagsInfoQuery = 
		                "SELECT * 
		                FROM ". DB_PREFIX ."tags T
		                    RIGHT JOIN ". DB_PREFIX ."playlists_has_tags PHT
		                        ON T.idTags = PHT.tags_idTags 
		                WHERE PHT.playlists_idPlaylists = '". $_POST["extraData"] ."'";

		            $row = $conn -> query($getTagsInfoQuery);

		            while ($data = $row ->fetch_assoc())
		            {
		                array_push($tagInfo, $data);
		            }
		            return $tagInfo;
		        }
		    }
		    function getSongsOfPlaylist ($conn)
		    {
		        $songIds = [];
		        $getSongsQuery = 
		            "SELECT SHS.songs_idSongs songId
		            FROM ". DB_PREFIX ."schemes SC
		            JOIN ". DB_PREFIX ."schemes_has_songs SHS
		            ON SHS.schemes_idSchemes = SC.idSchemes
		            WHERE SC.playlists_idPlaylists = '". $_POST["extraData"] ."'
		            ORDER BY SC.order ASC, SHS.order ASC";
		        
		        $row = $conn -> query($getSongsQuery);
		        
		        while ($data = $row -> fetch_assoc())
		        {
		            array_push($songIds, $data["songId"]);
		        }
		        return $songIds;
		    }
		    function getSpotifySongs ($conn) {
		        $songIds = implode(",", getSongsOfPlaylist($conn));
		        
		        $dataJson = file_get_contents("https://api.spotify.com/v1/tracks?ids=" . $songIds);
		        $data     = json_decode($dataJson);
		        
		        $songsInfo = [];
		        
		        foreach ($data->tracks as $track)
		        {
		            array_push($songsInfo, [$track->id, $track->artists[0]->name, $track->name, $track->duration_ms, $track->preview_url, $track->album->images[2]->url]);
		        }
		        $songsInfoJson = json_encode($songsInfo);
		        return $songsInfoJson;
		    }
		    $songsInfoJson = getSpotifySongs($conn);
		    $infoPlaylist = getPlaylistInfo ($conn);
		    $infoTags     = getTagsInfo ($conn);
		    echo '<div class="white-container z-depth-1">
		        <div class="stagger">
		            <div class="page-navigation back-arrow" data-transition="slide" data-page="15"><span class="' . CLASS_BACK_ARROW . '"></span></div>
		            <h2 class="header teal tooltipped" data-position="bottom" data-delay="50" data-tooltip="' . $infoPlaylist["name"] . '">'. truncateText($infoPlaylist["name"]) .'</h2>
		            <div class="delete_button"><i class="fa fa-trash-o fa-2x"></i></div>
		            <div class="row content-container">
		                <div class="center">
		                    <ul id="songs" class="center col s12 m12 l12">
		                  </ul>
		                </div>
                        <div class="right page-navigation next-button-container" data-transition="slide" data-function="duplicatePlaylist" data-page="11">
                            <p class="waves-effect waves-orange btn-flat next-button"> 
                                Voeg toe 
                                <span class="' . CLASS_NEXT_BUTTON . '"></span>
                            </p>
		    		    </div>
		            </div>
		            <script>
					$(function () {
						$(".delete_button").on("click", confirmDelete);
						$(".confirm").on("click", deleteLists);
					})

		            function printSongs (playlist) {
		                $.each(playlist, function(k, v) {
		                    $("#songs")
		                        .append($("<li>", {class: "song"})
		                            .append($("<div>", {class:"play-image"})
		                                .append($("<img>", {src: v[5], alt: v[1]}))
		                                .append($("<i>", {class: "play mdi-av-play-arrow small"}))
		                            .on("click", playAudio)
		                            .attr("data-audio", v[4])
		                            )
		                            .append($("<div>", {class:"songInfo"})
		                                .append($("<p>", {text: truncateText(v[2]), for: v[2], class: "tooltipped songTitle", "data-position": "top", "data-delay": "50", "data-tooltip": v[2]}))
		                                .append($("<p>", {text: truncateText(v[1]), for: v[1], class: "tooltipped songArtist", "data-position": "top", "data-delay": "50", "data-tooltip": v[1]})))
		                        )       
		                });
		                $(".tooltipped").tooltip({delay: 50});
		                launchOnResize();
		            }

		            var playedlast = "";

		           	function playAudio () {
		           	    var audio = $(this).attr("data-audio");
		           	    if (playedlast == "") {
		           	        $(this).find("i").attr("class", "play mdi-av-stop small");
		           	        $(this).append($("<audio>")
		           	                .append($("<source>", {src: audio, type: "audio/mpeg"})));
							var audioElement = $(this).find("audio");
							audioElement[0].play();
		           	        playedlast = $(this);
		           	    } 
		           	    else if (playedlast.find("audio").find("source").attr("src") == audio) {
		           	        $(this).find("i").attr("class", "play mdi-av-play-arrow small");
		           	        $(this).find("audio").remove();
		           	        playedlast = "";
		           	    } 
		           	    else {
		           	        playedlast.find("i").attr("class", "play mdi-av-play-arrow small");
		           	        playedlast.find("audio").remove();
		           	        $(this).find("i").attr("class", "play mdi-av-stop small");
		           	        $(this).append($("<audio>")
		           	                .append($("<source>", {src: audio})));
							var audioElement = $(this).find("audio");
							audioElement[0].play();
		           	        playedlast = $(this);
		           	    }
		           	    new Audio()
		           	}

                    function duplicatePlaylist () {
                        if (isLoggedIn()) {
                            $.ajax({
                                url: "https://api.spotify.com/v1/users/" + getCookie("user_id") + "/playlists", //localStorage.user_id is a string.
                                headers: {

                                    "Authorization": "Bearer " + getCookie("access_token") //localStorage.access_token is a string.
                                },
                                method: "post",
                                data: JSON.stringify({      //Have to stringify because cant receive JSON some-fucking-how.
                                    "name": "'. $infoPlaylist["name"] .'", //Does this need validation?
                                    "public": false                    
                                }),
                                dataType: "json",
                                success: function (output) {     
                                    var playlist_id = output.id;
                                    addSongsToPlaylist(playlist_id);
                                }
                            });
                            return false;
                        }
                        else {
                            nextPage(10, "slide");
                        }
                    }

                    function addSongsToPlaylist (playlist_id) {
                        var track_uris = []; //object
                        var playlist = '. $songsInfoJson .'; //object
                        var user_id = getCookie("user_id"); //string

                        $.each(playlist, function(k, v){
                            var uri = "spotify:track:" + v[0]; 
                            track_uris.push(uri);
                        });

                        $.ajax({
                            url: "https://api.spotify.com/v1/users/" + user_id + "/playlists/" + playlist_id + "/tracks",
                            data: JSON.stringify({
                                uris: track_uris
                            }),
                            headers: {
                                "Authorization": "Bearer " + getCookie("access_token"),
                                "Content-Type": "application/json"
                            },
                            method: "post",
                            success: function () {
                            	localStorage.playlist_id = playlist_id;
                                nextPage (11, "slide");
                            }
                        });
                        return false;
                    }
                    
		            printSongs('. $songsInfoJson .');

		            if (location.href.indexOf("zoeklijsten") > -1) {
		            	$(".back-arrow").attr("data-page", 18);
		            	$(".delete_container").remove();
		            }

		            function confirmDelete () {
		            	$("#confirm_delete").openModal();
		            }

		            function deleteLists () {
	            		$.ajax({
	            			url: "includes/deleteplaylists.php",
	            			method: "post",
	            			dataType: "text",
	            			data: {
	            				playlists: [' . $_POST["extraData"] . ']
	            			},
	            			success: function () {
	            				nextPage($(".back-arrow").attr("data-page"), "slide");
	            			}
	            		})
		            }
		            </script>
		        </div>
		    </div>';
			break;
	    case 17:
	    	echo '<div class="white-container z-depth-1">
	                <div class="stagger">
	                    <div class="page-navigation back-arrow" data-transition="slide" data-page="10"><span class="' . CLASS_BACK_ARROW . '"></span></div>
	                    <h2 class="header teal">Lijst opslaan</h2>
	                    <div class="row content-container">
	                        <div id="content">
	                           <form>
	                                <div class="input-field col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
	                                    <textarea class="validate center materialize-textarea" autofocus id="playlistName" />
	                                    <label for="playlistName">Naam van de lijst</label>
	                                </div>
	                           </form>
                               <ul id="songs" class="center col s12 m12 l12">
	                           </ul>
	                        </div>
	                        
	                        <div class="right page-navigation next-button-container" data-transition="slide" data-function="addPlaylist" data-page="11">
	                            <p class="waves-effect waves-orange btn-flat next-button"> 
	                                Voeg toe 
	                                <span class="' . CLASS_NEXT_BUTTON . '"></span>
	                            </p>
	                        </div>
	                    </div>
	                </div>
	                <script>
                        $.getScript("scripts/addplaylist.js").done(function() {
                            printPauperSongs(JSON.parse(localStorage.playlist));
                        });

                        function printPauperSongs (playlist) {
                            $.each(playlist, function(k, v) {
                                $("#songs")
                                    .append($("<li>", {class: "song"})
                                        .append($("<div>", {class:"play-image"})
                                            .append($("<img>", {src: v[0][5], alt: v[0][1]}))
                                            .append($("<i>", {class: "play mdi-av-play-arrow small"}))
                                        .on("click", playAudio)
                                        .attr("data-audio", v[0][4])
                                        )
                                        .append($("<div>", {class:"songInfo"})
                                            .append($("<p>", {text: truncateText(v[0][2]), for: v[0][2], class: "tooltipped songTitle", "data-position": "top", "data-delay": "50", "data-tooltip": v[0][2]}))
                                            .append($("<p>", {text: truncateText(v[0][1]), for: v[0][1], class: "tooltipped songArtist", "data-position": "top", "data-delay": "50", "data-tooltip": v[0][1]})))
                                    )       
                            });
                            
                            console.log($("songs"));
		                $(".tooltipped").tooltip({delay: 50});
		                launchOnResize();
		            }
                        

                    </script>
           		</div>';
	    		break;
            case 18:
                echo '<div class="white-container z-depth-1">	
					<div class="stagger">
						<div class="page-navigation back-arrow" data-transition="slide" data-page="home"><span class="' . CLASS_BACK_ARROW . '"></span></div>
						<h2 class="header teal">Zoek lijsten</h2>
						<div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
						<div class="row content-container">
                            <div class="input-field col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
						        <input id="searchList" autofocus type="text" class="validate center">
						        <label for="searchList">Zoek een lijst op naam</label>
						    </div>
							<table id="searchResults" class="list-menu">
		                    	
	                      </table>
		    			</div>
		    			<div id="pageInfoText">
		    				Klik op "zoek een lijst" en typ daar de lijst in die je wilt opzoeken. Klik vervolgens op de desbetreffende lijst.
		    			</div>
    				</div>
                    <script>
                        $.getScript("scripts/searchplaylists.js");
                    </script>
    			</div>';
            break;
		default:
			echo '<div class="white-container z-depth-1">
					<div class="stagger">
						' . (isLoggedIn () ? ('<div class="page-navigation back-arrow" data-transition="slide" data-page="home"><span class="' . CLASS_BACK_ARROW . '"></span></div>') : '' . '') . 
						'<h2 class="header teal">Nieuwe lijst</h2>
						<div><span id="open-page-info" class="mdi-action-info-outline fa-2x"></span></div>
						<div class="row content-container">
							<div class="input-field col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
						        <input id="duration" type="text" value="30" class="validate center">
						        <label class="active" for="duration">Duur (minuten)</label>
						    </div>
						    <div class="form-field col s10 m10 l8 offset-m1 offset-s1 offset-l2">
						    	<p class="center">Snelheid (BPM): <span class="mdi-action-info-outline tooltipped" data-position="top" data-delay="0" data-tooltip="BPM staat voor Beats Per Minute"></span></p>
									<input type="range" id="bpm">
						    </div>
							<div class="col s10 m10 l8 offset-m1 offset-s1 offset-l2 form-field">
								<p id="training_label" class="center">Training:</p>
								<div class="choose-training" style="width: 400px;">
									<div>
										<input checked class="with-gap choose-training" value="standaardtraining" data-page="2" name="training" type="radio" id="standaardtraining"  />
			    						<label for="standaardtraining">Standaardtraining</label>
			    						<input class="with-gap choose-training" name="training" value="intervaltraining" data-page="9" type="radio" id="intervaltraining"  />
			    						<label for="intervaltraining">Intervaltraining</label>
			    					</div>
								</div>
		    				</div>
		    				<div class="right page-navigation next-button-container" data-item="bla" data-transition="slide" data-function="validateDurAndBpm" data-page="2">
		    					<p class="waves-effect waves-orange btn-flat next-button"> 
		    						Next 
		    						<span class="' . CLASS_NEXT_BUTTON . '"></span>
		    					</p>
		    				</div>
		    			</div>
		    			<div id="pageInfoText">
		    				De start van het maken van jou gepersonaliseerde Spotify lijst. Denk jij de snelheid te hebben van Usain Bolt zet de BPM dan rond ‘Gevorderd’. Kan je dat misschien niet aan zet hem dan wat lager voor een fijnere ervaring. 
		    				Voor beginners raden we aan om ‘intervaltraining’ te kiezen. Dit zorgt voor een fijnere ervaring voor jezelf.
		    			</div>
					</div>
					<script>
						$("#bpm").rangify({
							width:              "100%",
							min:                100,
							max:                160,
							step:               0,
							value:              120,
							valueDivider:       30,
							thumbColor:         "orange",
							valuePosition:      "bubble",
							valueBgColor:       "orange",
							valueColor:         "#fff",
							dividerColor:       "#c2c0c2",
							dividerLabels:      ["Beginner", "Normaal", "Gevorderd"],
							dividerLabelColor:  "#000000",
							labelType:          "text",
							bubbleAlwaysActive: true
						});
						$(".tooltipped").tooltip({delay:0});
					</script>
				</div>';
			break;
	}
}