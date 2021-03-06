<?php session_start(); ?>	
	<meta name="google-signin-clientid" content="1076527969182-71a5dorqdpehvluq76fv0lsh3s7qasea.apps.googleusercontent.com" />
	<meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login" />
	<meta name="google-signin-requestvisibleactions" content="http://schema.org/AddAction" />
	<meta name="google-signin-cookiepolicy" content="single_host_origin" />
	<meta name="google-signin-callback" content="signinCallback" />
    <script type="text/javascript">
		  (function() {
			   var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			   po.src = 'https://apis.google.com/js/client:plusone.js';
			   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		 })();
		 
		 function render() {

		  // Additional params
		  var additionalParams = {
			'theme' : 'light' //Change this to dark if you want it dark.
		  };
		
		  gapi.signin.render('myButton', additionalParams);
		  if ($("#signUp").length) {
		  	gapi.signin.render('signUp', additionalParams);
		  }
		}
		
        function signinCallback(authResult) {
            if (authResult['status']['signed_in']) {
                <?php 
					if (isset($_SESSION["employeeInfo"])) {
						echo "console.log('";
						echo $_SESSION["employeeInfo"]["Name"];
						echo "');";
					} 
				?>
                
				gapi.client.load('plus', 'v1', function () {
						var request = gapi.client.plus.people.get( {'userId' : 'me'} );
						request.execute( function(profile) {
							if (profile.error) {
								console.log(profile.error);
								return;	
							}	
							
							console.log(profile);
							
							$("#user-image").html(profile.result.displayName + "&nbsp;<img src='" + profile.image.url + "' style='width: 35px; height: auto;' class='img-circle' />");
							
							$.post('/db/storeUser.php', profile);
							if (!$("#signUp").length) {
								console.log("storing user info");
								var url = "/db/storeEmployeeInfo.php?google_id=" + profile.id;
								$.get(url)
							}
							document.getElementById('gSignInWrapper').setAttribute('style', 'display: none');
							if ($("#signUp").length) {
								document.getElementById('signUp').setAttribute('style', 'display: none');
							}
							
							if ($("#signUp").length) {
								var myPID = $("#pid").val();
								$.post('/db/connectToGoogle.php', {pid: myPID, google_id: profile.id}).done(function() {
									window.location.replace("/index.php");
								});
							}
						});
					});
            } else {
                // Update the app to reflect a signed out user
                // Possible error values:
                //   "user_signed_out" - User is signed-out
                //   "access_denied" - User denied access to your app
                //   "immediate_failed" - Could not automatically log in the user
                console.log('Sign-in state: ' + authResult['error']);
				render();
            }
        }
		
		function signMeOut() {
			gapi.auth.signOut();
			$.post('/db/signOutUser.php').done(function() {
				location.reload();
			});
		}
    </script>