<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

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
    		if(strpos($user['attributes'], 'V') !== false) {
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
    		$userInfo = $this->Volunteers->findByUserId($this->Auth->user('id'))->first();
      		$fullname = $userInfo['name'] . " " . $userInfo['last_name_first'];
            $this->set('fullname', $fullname);
            $this->set('user_id', $userInfo['id']);

    	} else {
    		$this->set('fullname', '');
    	} 
        
    }

    //Método que se encarga de enviar un mensaje desde el voluntario al encargado
    public function enviarmensaje()
    {
         //Consultando por lo ejecutores posibles (deberian ser los de la misma mision encargado)
         $this->loadModel('Managers');
         $managers = $this->Managers->find('all');
         $this->set(compact('managers'));   

         if($this->request->is('post')){

            $volunteerInfo = $this->Volunteers->findByUserId($this->Auth->user('id'))->first();
            $this->loadModel('Notifications');
            if($this->Notifications->saveMessage($this->request->data, $volunteerInfo->id, $this->request->data['encargado'], 0, "Mensaje")){
                $this->Flash->success('Mensaje enviado correctamente.');
                return $this->redirect(['controller' => 'Volunteers', 'action' => 'index']);
            }
            else{

                $this->Flash->error('No se pudo enviar el mensaje.');
            }

         }

    }

    public function asignarhabilidades()
    {
         //Consultando por todas las skills del usuarios!


         $this->loadModel('Skills');
         $skills = $this->Skills->find('all');
         $this->set(compact('skills')); 

         $userInfo = $this->Volunteers->findByUserId($this->Auth->user('id'))->first();
         $id_voluntario = $userInfo['id'];

         if($this->request->is('post')){
            $skillsvolunteersTable = TableRegistry::get('SkillsVolunteers');
            $skillvolunteer = $skillsvolunteersTable->newEntity();

            $dominio = NULL;
            $dominio = $this->request->data['dominio'];

            debug($dominio);

            $skillvolunteer->volunteer_id = $id_voluntario;
            $skillvolunteer->skill_id = $this->request->data['habilidad'];

            $skillvolunteer->domain_degree = $dominio;

            if($skillsvolunteersTable->save($skillvolunteer)){
                $this->Flash->success('Habilidad agregada con exito');
                return $this->redirect(['controller' => 'Volunteers', 'action' => 'asignarhabilidades']);
            }
            else{
                $this->Flash->error('No se agregar habilidad');
            }

         }
    }

    public function aceptartareas()
    {

    }




    
}
