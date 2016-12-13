<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

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
        //Se obtiene el ID del usuario actual
        $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();

        //Consulta a la bd con todas las misiones 
        $query2 = TableRegistry::get('Missions')->find();

        //Consulta a la bd con todas las tareas 
        $query = TableRegistry::get('Tasks')->find();

        //Se busca la id de la mision
        $id_mission = $query2->where(['manager_id' => $userInfo['id']])->first();

        //Se obtienen todas las tareas de la mision actual
        $tasks = $query->where(['mission_id' => $id_mission['id']]);

        //Le pasamos los elementos rescatados a la vista
        $this->set(compact('tasks'));

    }


   public function gestionarsolicitudes()
    {

    }

    public function definirvoluntario()
    {

        //Se obtiene el ID del usuario actual
        $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();

        //Se obtienen todos los voluntarios
        $query3 = TableRegistry::get('Volunteers')->find();

        //Consulta a la bd con todas las misiones 
        $query2 = TableRegistry::get('Missions')->find();

        //Consulta a la bd con todas las tareas 
        $query = TableRegistry::get('Tasks')->find();

        //Se buscan los voluntarios disponibles
        $vol = $query3->where(['disponibility' => 1]);

        //Se busca la id de la mision
        $id_mission = $query2->where(['manager_id' => $userInfo['id']])->first();

        //Ahora buscamos las tareas que sean de la mision actual
        $mission_tasks = $query->where(['mission_id' => $id_mission['id']]);

        //Ahora le pasamos a las vistas las variables necesarias
        $this->set(compact('vol'));
        $this->set(compact('mission_tasks'));


    }

    //Funcion encargada de obtener datos y pasarlos a la BD
    public function defTask()
    {

        $session = $this->request->session();
        


        if($this->request->is('post'))
        {
            //Se obtiene el ID del usuario actual
            $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();

            //Se carga la tabla de tareas desde la BD y se instancia
            $taskTable    = TableRegistry::get('Tasks');
            $task = $taskTable->newEntity();

            //Se procede a almacenar la informacion obtenida en las tuplas de la BD
            $task->manager_id = $userInfo['id'];

            $query = TableRegistry::get('Missions')->find();
            $id_mission = $query->where(['manager_id' => $userInfo['id']])->first();

            
            $task->mission_id = $id_mission['id'];

            $task->task_name = $this->request->data['nombretarea'];
            $cant = intval($this->request->data['cantarea']);
            
            $task->volunteer_amount = $cant;
            $task->task_status = "Progreso";
            $task->guide_doc = $this->request->data['desctarea'];
            debug($task);
            
            //Finalmente, se traspasan estos datos a la base de datos
            if($taskTable->save($task))
            {
                $this->Flash->success('Tarea creada con exito');
                $session = $this->request->session();
                $session->write('task_id', $task['id']);
                return $this->redirect(['controller' => 'Managers', 'action' => 'index']);
            }
            else{
                $this->Flash->error('No se pudo crear emergencia');
            }
            
        }
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
