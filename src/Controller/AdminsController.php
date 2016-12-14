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

            $session = $this->request->session();
            $session->write('id', $adminid);

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
                $session = $this->request->session();
                $session->write('eme_id', $emergency['id']);
                return $this->redirect(['controller' => 'Admins', 'action' => 'addhab']);
            }
            else{
                $this->Flash->error('No se pudo crear emergencia');
            }

        }       
    }

    public function addmision(){
        //Consulta a la bd de todas las misiones
        $this->loadModel('Missions');
        $missions = $this->Missions->find('all');
        $this->set(compact('missions'));

        //Consulta a la bd con todos los encargados
        $this->loadModel('Managers');
        $managers = $this->Managers->find('all');
        $this->set(compact('managers'));        
    }

    public function defmision(){
        //Consulta a la bd con todos los encargados
        $this->loadModel('Managers');
        $managers = $this->Managers->find('all');
        $this->set(compact('managers'));

        if($this->request->is('post')){
            $userInfo = $this->Admins->findByUserId($this->Auth->user('id'))->first();

            $missionsTable    = TableRegistry::get('Missions');
            $mission = $missionsTable->newEntity();

            $session = $this->request->session();
            $eme_id = $session->read('eme_id');

            $mission->manager_id = $this->request->data['encargado'];
            $mission->emergency_id = $eme_id;
            $mission->admin_id = $userInfo['id'];
            $mission->mission_name = $this->request->data['nombremision'];
            $mission->volunteer_amount = ($this->request->data['cantvoluntarios']) + 0;
            $mission->status = "En Progreso";

            if($missionsTable->save($mission)){
                $this->Flash->success('Misión creada con exito');
                return $this->redirect(['controller' => 'Admins', 'action' => 'addmision']);
            }
            else{
                $this->Flash->error('No se pudo crear misión');
            }
        }
    }

    public function addhab(){

        //Consulta a la bd de todas las habilidades
        $this->loadModel('Skills');
        $skills = $this->Skills->find('all');
        $this->set(compact('skills'));

        //Consulta a la bd de todas las emergencias
        $this->loadModel('Emergencies');
        $emergencies = $this->Emergencies->find('all');
        $this->set(compact('emergencies'));

        if($this->request->is('post')){

            $emergencies_skillsTable = TableRegistry::get('EmergenciesneedSkills');
            $emergency_skill = $emergencies_skillsTable->newEntity();

            $session = $this->request->session();
            $eme_id = $session->read('eme_id');

            $emergency_skill->emergency_id = $eme_id;
            $emergency_skill->skill_id = $this->request->data['habilidad'];

            if($emergencies_skillsTable->save($emergency_skill)){
                $this->Flash->success('Habilidad agregada con exito');
                return $this->redirect(['controller' => 'Admins', 'action' => 'addhab']);
            }
            else{
                $this->Flash->error('No se agregar habilidad');
            }
            
        }
    }

    public function indexemer(){

        //Consulta a la bd de todas las emergencias
        $this->loadModel('Emergencies');
        $emergencies = $this->Emergencies->find('all');
        $this->set(compact('emergencies'));

        $userInfo = $this->Admins->findByUserId($this->Auth->user('id'))->first();
        $admin_id_actual = $userInfo['id'];

        if($this->request->is('post')){

            /*
            $emergenciesTable    = TableRegistry::get('Emergencies');
            $query = $emergenciesTable->query();
            $query->update()
                ->set(['status' => ""])
                ->where(['id' => 1])
                ->execute();
            */

            $emergenciesTable = TableRegistry::get('Emergencies');
            foreach($emergencies as $emergency){
                $id_emergencia = $emergency['id'];

                $id_admin_emergencia = $emergency['admin_id'];
                if($id_admin_emergencia == $admin_id_actual){

                    $status = $this->request->data['combobox' . $id_emergencia];
                    
                    $query = $emergenciesTable->query();
                    $query->update()
                        ->set(['status' => $status])
                        ->where(['id' => $id_emergencia])
                        ->execute();


                }
            }

            return $this->redirect(['controller' => 'Admins', 'action' => 'indexemer']);

        }
    }

}      
