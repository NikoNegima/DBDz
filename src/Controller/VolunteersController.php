<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Volunteers Controller
 *
 * @property \App\Model\Table\VolunteersTable $Volunteers
 */
class VolunteersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	
        
    }

    
    //Para que solo aquellos que tengan la autorizacion requerida puedan acceder a este controlador, creo.
    public function isAuthorized($user) {
    	if ($user != null) {
    		if(strpos($user['attribute'], 'V') !== false) {
    			return true;
    		} 
    	}

    	return false;
    } 

    public function beforeFilter(Event $event)
    {



    	//Todo este trozo de codigo funciona para pasar la variable $fullname al layout
    	//Usa esto para mostrar el nombre y apellido en la barra de arriba
    	if($this->Auth->user('id') != null) {
    		$userInfo = $this->Volunteers->get($this->Auth->user('id'));
      		$fullname = $userInfo['name'] . " " . $userInfo['last_name_first'];
            $this->set('fullname', $fullname);

    	} else {
    		$this->set('fullname', '');
    	} 
        
    }

	

    
}
