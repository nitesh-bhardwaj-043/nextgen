//blank line is required
app.controller('ctrl_dashboard',function($scope,$http)
{
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});


});