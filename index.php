
<!DOCTYPE html>
<html>
<head>
	<title>Facebook api intregration</title>
	<script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>
	<script type="text/javascript" src="//connect.facebook.net/en_US/sdk/debug.js"></script>
</head>
<body>
	<?php 
	require_once("vendor/autoload.php");
// App Secrate : 8db3119160bb90b3154cd89bf91f8662
	use Facebook\FacebookSession;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
	use Facebook\FacebookRequestException;

	?>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '1446785365388047',
				cookie     : true,
				xfbml      : true,
				version    : 'v2.8'
			});
			FB.getLoginStatus(function(response) {
				console.log("checkLoginState: "+response);
			});
			FB.AppEvents.logPageView(); 
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			}); 
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<fb:like href="https://getratings.ca/" layout="button_count" action="like" show_faces="false" share="false"></fb:like>
	<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"><div>
		<?php 
		$fb = new \Facebook\Facebook([
			'app_id' => '1446785365388047',
			'app_secret' => '8db3119160bb90b3154cd89bf91f8662',
			'default_graph_version' => 'v2.10',
  				'default_access_token' => 'EAAUj1ZCfFKw8BAIXdfkSvC00r8vghIKZCdW9sutB0yilf7kVhnZB8b2Hyb9ZCv4eOOosKu2i5Uj36CluCVsmNQoANdpOurwDG0ObZCcdpZA5wmPNdGy2u7GuocBk4hRkaQnoqvELVVZA7oakcD3dTZChaNwFZBmtv0ohj6jv91hLj0QZDZD', // optional
  				]);

			// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
			//   $helper = $fb->getRedirectLoginHelper();
			//   $helper = $fb->getJavaScriptHelper();
			//   $helper = $fb->getCanvasHelper();
		// $helper = $fb->getPageTabHelper();
		// print_r($helper);
		// var_dump( $helper->getAccessToken());
			   // echo "<pre>" ; print_r($helper);
		try {
		  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
			$response = $fb->get('/saidylive?fields=id,fan_count,website,about,category,category_list,checkins,contact_address,context,country_page_likes,cover,current_location,description,description_html,display_subtext,displayed_message_response_time,emails,engagement,featured_video,features,founded,general_info,hours,written_by,were_here_count,verification_status,username,unseen_message_count,unread_notif_count,voip_info,talking_about_count', 'EAAUj1ZCfFKw8BAIXdfkSvC00r8vghIKZCdW9sutB0yilf7kVhnZB8b2Hyb9ZCv4eOOosKu2i5Uj36CluCVsmNQoANdpOurwDG0ObZCcdpZA5wmPNdGy2u7GuocBk4hRkaQnoqvELVVZA7oakcD3dTZChaNwFZBmtv0ohj6jv91hLj0QZDZD');
		} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  		// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  		// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		var_dump($response);
		echo "<br><pre> Session : <br>";
		// $request = $fb->request('GET', '/442496329431611', array (
		// 	'fields' => 'fan_count',
		// 	) );
		// try {
		// 	$response = $fb->getClient()->sendRequest($request);
		// } catch(Facebook\Exceptions\FacebookResponseException $e) {
  // 		// When Graph returns an error
		// 	echo 'Graph returned an error: ' . $e->getMessage();
		// 	exit;
		// } catch(Facebook\Exceptions\FacebookSDKException $e) {
  // 			// When validation fails or other local issues
		// 	echo 'Facebook SDK returned an error: ' . $e->getMessage();
		// 	exit;
		// }

		// $graphNode = $response->getGraphNode();
		// var_dump($graphNode);
		// 
		// 
		
		// $app = null, $accessToken = null, $method = null, $endpoint = null, array $params = [], $eTag = null, $graphVersion = null
		// $response = $request->execute();
		// $graphObject = $response->getGraphObject();
		// var_dump($graphObject);
		// $request = new FacebookRequest(
		//   $session,
		//   'GET',
		//   '/442496329431611',
		//   array(
		//     'fields' => 'fan_count'
		//   )
		// );

		// $response = $request->execute();
		// $graphObject = $response->getGraphObject();
		// var_dump($getGraphObject);
		/* handle the result */
		// echo 'Logged in as ' . $me->getName();

		/*$fb = new Facebook\Facebook([
			'app_id' => '1446785365388047',
			'app_secret' => '8db3119160bb90b3154cd89bf91f8662',
			'default_graph_version' => 'v2.10',
			]);

		$helper = $fb->getPageTabHelper();
		print_r($helper);
		try {
			$accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		if (! isset($accessToken)) {
			echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
			exit;
		}

// Logged in
		echo '<h3>Page ID</h3>';
		var_dump($helper->getPageId());

		echo '<h3>User is admin of page</h3>';
		var_dump($helper->isAdmin());

		echo '<h3>Signed Request</h3>';
		var_dump($helper->getSignedRequest());

		echo '<h3>Access Token</h3>';
		var_dump($accessToken->getValue());*/

		/*// GET page info 
		$pageUrl = 'https://www.facebook.com/mkhossaininfo/';  
		var_dump($pageUrl);
		FacebookSession::setDefaultApplication('1446785365388047','8db3119160bb90b3154cd89bf91f8662');
    //getting session
		$Session = FacebookSession::newAppSession();
		try
		{
      //validating if session is correct
			$Session->validate();
      //sending request
			$Request = new FacebookRequest($Session, 'GET', '/',
				array (
					'id' => $pageUrl,
					)
				);
			$Response = $Request->execute();
      //getting UserGraph object
			$UserObject = $Response->getGraphObject(GraphUser::className());
      //return page id
			return $UserObject->GetId();
		}
		catch (FacebookRequestException $ex)
		{}
		catch (Exception $ex)
		{}*/
		?>
	</div>
</div>

</body>
</html>