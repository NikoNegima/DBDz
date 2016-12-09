<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Form\RegisterForm;
use Cake\ORM\TableRegistry;

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
            $adminid = $userInfo['id'];
            $this->set('fullname', $fullname);

        } else {
            $this->set('fullname', '');
        } 
        
    }

    //Funcion de la vista para crear emergencias
    public function crearemergencia()
    {  
        //Consulta a la bd de todas las comunas
        $this->loadModel('Communes');
        $communes = $this->Communes->find('all');
        $this->set(compact('communes'));

        if($this->request->is('post')) {

            $userInfo = $this->Admins->findByUserId($this->Auth->user('id'))->first();

            $emergenciesTable    = TableRegistry::get('Emergencies');

            $emergency = $emergenciesTable->newEntity();
            $emergency->admin_id = $userInfo['id'];
            $emergency->commune_id = $this->request->data['comuna'];
            $emergency->date = $this->request->data['fechaemergencia'];
            $emergency->place = $this->request->data['lugaremergencia'];
            $emergency->severity = $this->request->data['gravedad'];
            $emergency->description = $this->request->data['descemergencia'];
            $emergency->status = "En Progreso";
                
            if($emergenciesTable->save($emergency))
            {
                $this->Flash->success('Emergencia creada con exito');
                return $this->redirect(['controller' => 'Admins', 'action' => 'index']);
            }
            else{
                $this->Flash->error('No se pudo crear emergencia');
            }

        }       
    }    
}      
