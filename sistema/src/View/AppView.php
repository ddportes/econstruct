<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
use Cake\ORM\TableRegistry;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        if(isset(($this->Session->read())['Auth']) && ($this->Session->read())['Auth'] ) {

            if($this->request->params['action'] <> 'loginAdmin') {
                $articles = TableRegistry::get('Empresas');

                $empresa = $articles->get(($this->Session->read())['Auth']['User']['empresa_id']);

                $this->set('empresa', $empresa);
            }
        }
        
        $this->loadHelper('Html');
        $this->loadHelper('Url');
        $this->loadHelper('Form');
        $this->loadHelper('Paginator');
    }
}
