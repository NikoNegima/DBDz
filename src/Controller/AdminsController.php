<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 */
class AdminsController extends AppController
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
    		if(strpos($user['attributes'], 'A') !== false) {
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
            //Query para seleccionar voluntario por user_id
            $userInfo = $this->Admins->findByUserId($this->Auth->user('id'))->first();
            $fullname = $userInfo['name'] . " " . $userInfo['last_name_first'];
            $this->set('fullname', $fullname);

        } else {
            $this->set('fullname', '');
        } 
        
    }

    public function crearemergencia()
    {
       
    }

    
}
