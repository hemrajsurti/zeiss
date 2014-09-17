<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1615223755370942',
          xfbml      : true,
          version    : 'v2.0'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

	function show_share_box(){

		FB.ui({
		method: 'share_open_graph',
		action_type: 'og.likes',
		action_properties: JSON.stringify({
		object:'https://apps.facebook.com/zeissindia/',
		})
		}, function(response){});
	}
	
	function invite_ppl(){
	FB.ui({method: 'apprequests',
      message: "Has invited you to enjoy a game"
    }, function(response){
        console.log(response);
    });
	}
  </script>