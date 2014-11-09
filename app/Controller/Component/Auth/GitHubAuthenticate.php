<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/7/2014
 * Time: 8:42 PM
 *
 * A GitHub Open Authentication method.
 */

App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class GitHubAuthenticate extends BaseAuthenticate {

    var $settings = array(
        "clientID" => "",
        "clientSecret" => "",
        "redirect_url" => "http://csc413.computershopware.com/users/callback",
        "appName" => "Ticketer"
    );

    public function authenticate(CakeRequest $request, CakeResponse $response) {
        $session = new CakeSession();
        if (isset($request->data["GitHub"]) && $request->data["GitHub"]["login"] == 1) {
            // this happens when the user clicks login
            $this->getGitHubToken($session, $response);
        }

        if(isset($request->query['code'])) {
            // this means we have gotten the callback from github.
            $access = $this->exchangeCode($request->query['code']);
            $session->write('github_auth_code', $request->query['code']);

            if (isset($access->access_token)) {
                $session->write('github_auth_token', $access->access_token);
                $data = array('url' => 'https://api.github.com/user?access_token=' . $access->access_token,
                    'header' => array("Content-Type: application/x-www-form-urlencoded", "User-Agent: " . $this->settings['appName'], "Accept: application/json"),
                    'method' => 'GET');
                $gitUser = json_decode($this->curlRequest($data));
                return $this->checkUser($gitUser, $access->access_token);
            } else {
                // error
            }
        }
        return false;
    }

    private function getGitHubToken($session, $response) {
        $response->header('Location', 'https://github.com/login/oauth/authorize?scope=user&client_id=' . $this->settings['clientID']);
    }

    private function exchangeCode($code){
        $fields = array('client_id' => $this->settings['clientID'], 'client_secret' => $this->settings['clientSecret'], 'code' => $code);
        $postValues = '';
        foreach ($fields as $key => $value) {
            $postValues .= $key . "=" . $value . "&";
        }

        $data = array('url' => 'https://github.com/login/oauth/access_token',
            'data' => $postValues,
            'header' => array("Content-Type: application/x-www-form-urlencoded", "Accept: application/json"),
            'method' => 'POST');

        $gitResponse = json_decode($this->curlRequest($data));
        return $gitResponse;
    }

    private function checkUser($gitUser, $access){
        App::uses('User', 'Model');
        $User = new User();
        $user = $User->find("first",array("conditions" => array("email" => $gitUser->email)));
        if (!$user) {
            $user = array(
                "User" => array(
                    "email" => $gitUser->email,
                    "token" => $access
                )
            );
            $User->create();
            $User->save($user);
            $user["User"]["id"] = $User->getLastInsertID();
        }
        return $user;
    }

    private function curlRequest($data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($data['header'] and is_array($data['header']))
        {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $data['header']);
        }
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if($data['method'] == 'POST' and !empty($data['data']))
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data['data']);
        }
        else
        {
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        }
        curl_setopt($ch, CURLOPT_URL, $data['url']);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);

        $data = curl_exec($ch);
        return $data;
    }
}
