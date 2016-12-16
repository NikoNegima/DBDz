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
        
        if($this->Auth->user('id') != null) {
            //Query para seleccionar voluntario por user_id
            $managerInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();
            

            $this->loadModel('Missions');
            $manager_missions = $this->Missions->emergenciesWithMissions($managerInfo['id']); 
            $this->set('manager_missions', $manager_missions);

        } 
                   
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
            if($this->Notifications->saveMessage($this->request->data, $this->request->data['voluntario'], $managerInfo->id, 1, "Mensaje")){
                $this->Flash->success('Mensaje enviado correctamente.');
                return $this->redirect(['controller' => 'Managers', 'action' => 'index']);
            }
            else{
                
                $this->Flash->error('No se pudo enviar el mensaje.');
            }

         }
    }

    public function gestionarestados()
    {
        //Se obtiene el ID del usuario actual
        $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();
        $id_manager = $userInfo['id'];

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

        //Consulta a la bd de todas las tareas
        $this->loadModel('Tasks');
        $tsks = $this->Tasks->find('all');
        $this->set(compact('tsks'));

        $tasksTable = TableRegistry::get('Tasks');
        if($this->request->is('post')){
            foreach($tsks as $tareas){
                $id_tarea = $tareas['id'];
                $manager_id_tarea = $tareas['manager_id'];

                if($id_manager == $manager_id_tarea){

                    $status = $this->request->data['tarea' . $id_tarea];
                    
                    $query = $tasksTable->query();
                    $query->update()
                        ->set(['task_status' => $status])
                        ->where(['id' => $id_tarea])
                        ->execute();

                }

            }

             return $this->redirect(['controller' => 'Managers', 'action' => 'gestionarestados']);
        }

    }


   public function gestionarsolicitudes()
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
        $this->set('mission_tasks', $mission_tasks);

        if($this->request->is('post')){
            foreach ($vol as $voluntario) {
                $id_vol = $voluntario['id'];
                //debug($this->request->data['combobox' . $voluntario['id']]);
                if($this->request->data['comboboxvol' . $voluntario['id']] == "ENVIAR"){   
                    $notificationTable    = TableRegistry::get('Notifications');
                    $notification = $notificationTable->newEntity();
                    $fullneim = $voluntario['name'] . " " . $voluntario['last_name_first'];

                    $id_tarea = $this->request->data['comboboxtsk'];
                    $tarea = $query->where(['id' => $id_tarea])->first();

                    $notification->manager_id = $userInfo['id'];
                    $notification->volunteer_id = $voluntario['id'];
                    $notification->detail = "Se solicita a usted, voluntario: " . $fullneim . " asistir a la tarea: " . $tarea['task_name'] . ".";
                    $notification->urgency_level = 1;
                    $notification->subject = "solicitud";
                    $notification->task_related = $id_tarea;
                    $notification->status = 1;

                    if($notificationTable->save($notification))
                    {
                        $this->Flash->success('Solicitud enviada con exito');
                    }
                    else{
                        $this->Flash->error('No se pudo enviar śolicitud');
                    }     
                }
            }

            return $this->redirect(['controller' => 'Managers', 'action' => 'index']);
        }

    }

    public function definirvoluntario()
    {

        //Se obtiene el ID del usuario actual
        $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();

        //Se obtienen todas las regiones
        $query5 = TableRegistry::get('Regions')->find();

        //Se obtienen todas las emergencias
        $query4 = TableRegistry::get('Emergencies')->find();

        //Se obtienen todos los voluntarios
        $query3 = TableRegistry::get('Volunteers')->find();

        //Consulta a la bd con todas las misiones 
        $query2 = TableRegistry::get('Missions')->find();

        //Consulta a la bd con todas las tareas 
        $query = TableRegistry::get('Tasks')->find();

        //Se busca la id de la mision
        $id_mission = $query2->where(['manager_id' => $userInfo['id']])->first();

        //Ahora buscamos las tareas que sean de la mision actual
        $mission_tasks = $query->where(['mission_id' => $id_mission['id']]);

        //Se obtiene el ID de la emergencia
        $id_emer = $id_mission['emergency_id'];

        //Se obtiene la emergencia actual
        $emergency = $query4->where(['id' => $id_emer])->first();

        //Obtenemos el nombre de la region
        $area = $query5->where(['id' => $emergency['region_id']])->first();
        
        //Se buscan los voluntarios disponibles en el area de la 
        $vol = $query3->where(['disponibility' => 1])
                    ->where (['performance_area' => $area['name']]);

        //Ahora le pasamos a las vistas las variables necesarias
        $this->set(compact('vol'));
        $this->set(compact('mission_tasks'));

        if($this->request->is('post'))
        {
            $notificationTable    = TableRegistry::get('Notifications');
            $notification = $notificationTable->newEntity();

            foreach($vol as $voluntario){
                $fullneim = $voluntario['name'] . " " . $voluntario['last_name_first'];

                $id_tarea = $this->request->data[$voluntario['id']];
                $tarea = $query->where(['id' => $id_tarea])->first();

                $notification->manager_id = $userInfo['id'];
                $notification->volunteer_id = $voluntario['id'];
                $notification->detail = "Se solicita a usted, voluntario: " . $fullneim . " asistir a la tarea: " . $tarea[ 'task_name'] . ".";
                $notification->urgency_level = 1;
                $notification->subject = "solicitud";
                $notification->task_related = $id_tarea;
                $notification->status = 1;

                if($notificationTable->save($notification))
                {
                    $this->Flash->success('Solicitud enviada con exito');
                }
                else{
                    $this->Flash->error('No se pudo enviar śolicitud');
                }
            }

            return $this->redirect(['controller' => 'Managers', 'action' => 'index']);

        }


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

    //Funcion que permite ingresar habilidades aa la emergencia
    public function addHab()
    {

        //Se obtiene el ID del usuario actual
        $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();

        //Se obtiene la id de la mision actual
        $query = TableRegistry::get('Missions')->find();
        $eme_id = $query->where(['manager_id' => $userInfo['id']])->first();

        //Consultando por las misiones
        $this->loadModel('Skills');
        $hab = $this->Skills->find('all');

        //Se le pasa a las vistas las variables necesarias
        $this->set(compact('hab'));
        $this->set('id_actual',$eme_id['emergency_id']);

        if($this->request->is('post')){

            $emergencies_skillsTable = TableRegistry::get('EmergenciesneedSkills');
            $emergency_skill = $emergencies_skillsTable->newEntity();

            $emergency_skill->emergency_id = $eme_id['emergency_id'];
            $emergency_skill->skill_id = $this->request->data['habilidad'];


            if($emergencies_skillsTable->save($emergency_skill)){
                $this->Flash->success('Habilidad agregada con exito');
                return $this->redirect(['controller' => 'Managers', 'action' => 'addhab']);
            }
            else{
                $this->Flash->error('No se agrega habilidad');
            }
            
        }

    }

    public function vermensajese() {

        if($this->Auth->user('id') != null) {
            //Query para seleccionar voluntario por user_id
            $userInfo = $this->Managers->findByUserId($this->Auth->user('id'))->first();
            $datos_mensajes = $this->Managers->getMessages($userInfo['id']);

            $this->set('datos_mensajes', $datos_mensajes);
        }
    }


}  
