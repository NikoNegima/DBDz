<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Managers Controller
 *
 * @property \App\Model\Table\ManagersTable $Managers
 */
class ManagersController extends AppController
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
    		if(strpos($user['attributes'], 'M') !== false) {
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
            $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();
            $fullname = $userInfo['name'] . " " . $userInfo['last_name_first'];
            $this->set('fullname', $fullname);

        } else {
            $this->set('fullname', '');
        } 
        
    }

    public function gestionarestados()
    {

    }


   public function gestionarsolicitudes()
    {

    }

    public function definirvoluntario()
    {

    }

    //Método que envia un mensaje desde el encargado a un voluntario
    public function enviarmensaje()
    {
         //Consultando por lo ejecutores posibles (deberian ser los de la misma mision encargado)
         $this->loadModel('Volunteers');
         $volunteers = $this->Volunteers->find('all');
         $this->set(compact('volunteers'));   
         
         if($this->request->is('post')){

            $managerInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();
            $this->loadModel('Notifications');
            if($this->Notifications->saveMessage($this->request->data, $managerInfo->id)){
                $this->Flash->success('Mensaje enviado correctamente.');
                return $this->redirect(['controller' => 'Managers', 'action' => 'index']);
            }
            else{
                
                $this->Flash->error('No se pudo enviar el mensaje.');
            }

         }

    }

}
