<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link      https://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   https://opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\View\Helper;
/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller
{

  /**
  * Initialization hook method.
  *
  * Use this method to add common initialization code like loading components.
  *
  * e.g. `$this->loadComponent('Security');`
  *
  * @return void
  */
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
      'authorize' => ['Controller'],
      'authenticate' => [
        'Form' => [
          'fields' => [
            'username' => 'email',
            'password' => 'password'
          ]
        ]
      ],
      'loginAction' => [
        'controller' => 'Users',
        'action' => 'login'
      ],
      // If unauthorized, return them to page they were just on
      'unauthorizedRedirect' => $this->referer()
    ]);
    // Prevents acess to any part of application without login //


    // Admin Panel Constants //

      // Store Session Name for Admin User
      $first = $this->Auth->user('First_Name');
      $last = $this->Auth->user('Surname');
      // Concate First and Last Name //
      $uid = $first . ' ' . $last;
      $this->set('uid', $uid);
      /// Count Ongoing Projects ///
      $Projects = TableRegistry::get('Projects');
      $this->set('total', $Projects->find()->where(['Status' => 'Ongoing'])->count());
      /// Tasks to Calendar ///
      $Tasks = TableRegistry::get('Tasks');
      $this->set('array_to_json', $Tasks->find('all'));

  }
  public function beforeRender(Event $event)
  {
    $this->viewBuilder()->setTheme('AdminLTE');


  }
  public function isAuthorized($user)
{
    // Admin can access every action
    if (isset($user['Level']) && $user['Level'] === 'Admin') {
        return true;
    }

    // Default deny
    return false;
}

}
