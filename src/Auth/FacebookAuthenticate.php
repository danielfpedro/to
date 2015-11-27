<?php

namespace App\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\ORM\TableRegistry;

use App\Lib\FacebookLib;

class FacebookAuthenticate extends BaseAuthenticate
{
	public $Users;

	public function __construct()
	{
		$this->Users = TableRegistry::get('Users');
	}
	public function authenticate(Request $request, Response $response)
    {
		$code = $request->query('code');
    	if ($code) {
	        $fb = FacebookLib::getMyFacebook();
	        $helper = $fb->getRedirectLoginHelper();
	        $accessToken = $helper->getAccessToken();
			try {
				$response = $fb->get('/me?fields=name,email,gender', $accessToken);
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				return false;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				return false;
			}

			$me = $response->getGraphUser();

			$data = [
				'facebook_id' => $me->getId(),
				'name' => $me->getName(),
				'email' => $me->getEmail(),
				'gender' => $me->getGender(),
				'provider' => 'facebook'
			];

			$user = $this->_getUser($data);

			if ($user) {
				$user = $this->Users->patchEntity($user, $data);
			} else {
				$user = $this->Users->newEntity($data);
			}

			if (!$this->Users->save($user)) {
				return false;
			}
			return $this->_getUserProperties($user);
    	}
    	return false;
    }
    protected function _GetUserProperties($user)
    {
    	$fields = (isset($this->_config['fields'])) ? $this->_config['field'] : ['id', 'email', 'name', 'gender', 'facebook_id'];
    	$properties = [];
    	foreach ($fields as $field) {
    		$properties[$field] = $user->$field;
    	}
    	return $properties;
    }
    protected function _getUser($data)
    {
    	$user = $this
    		->Users
    		->find('all', [
    			'conditions' => ['Users.facebook_id' => $data['facebook_id']]
    		])
    		->first();
    	return $user;
    }
}