<?php

namespace App\Lib;

use Facebook\Facebook;
use Cake\Core\Configure;

class FacebookLib
{
	public static function getMyFacebook($accessToken = null)
	{
		$options = [
            'app_id' => Configure::read('facebookConnect.appId'),
            'app_secret' => Configure::read('facebookConnect.appSecret'),
            'default_graph_version' => 'v2.5'
        ];
        if ($accessToken) {
        	$options['default_access_token'] = $accessToken;
        }
        return new Facebook($options);
	}
}