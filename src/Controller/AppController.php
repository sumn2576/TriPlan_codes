<?php
declare(strict_types=1);

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

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
 
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        // ---------------ユーザ用---------------------------------
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'HomeUsers',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'HomeUsers',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                  'userModel' => 'Users',
                  'fields' => [
                    'username' => 'user_name',
                    'password' => 'password_code',
                    'role'     => 'role'
                  ]
                ]
            ],
        ]);
        //------------ ここまでユーザ-------------------------------------
// ↓管理者用
        // $this->loadComponent('Auth', [
        //     'loginRedirect' => [
        //         'controller' => 'HomeMaster',
        //         'action' => 'index'
        //     ],
        //     'logoutRedirect' => [
        //         'controller' => 'HomeMaster',
        //         'action' => 'login'
        //     ],
        //     'authenticate' => [
        //         'Form' => [
        //           'userModel' => 'MasterUsers',
        //           'fields' => [
        //             'username' => 'user_name',
        //             'password' => 'password_code'
        //           ]
        //         ]
        //     ],
        // ]);
 
        $this->Auth->allow(['login','add', 'registration', 'inputpin']);



    }
}
