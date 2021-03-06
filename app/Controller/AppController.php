<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('GitHubAuthenticate', 'Controller/Component/Auth');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'authenticate' => array('GitHub'),
            'loginRedirect' => array(
                'controller' => 'tickets',
                'action' => 'index'
            ),
            'authorize' => array('Controller')
        )
    );

    public function beforeFilter() {
        $this->set('userID', $this->Auth->user('User.id'));
        if($this->Auth->user('Type.edit_permissions') == 1) {
            $this->set('can_update', 1);
        }
        if($this->Auth->user('Type.open_tickets') == 1) {
            $this->set('can_open', 1);
        }
        if($this->Auth->user('Type.close_tickets') == 1) {
            $this->set('can_close', 1);
        }
    }

    public function isAuthorized($user) {
        if($this->action == 'index' || $this->action == 'login') {
            return true;
        }
        return false;
    }
}