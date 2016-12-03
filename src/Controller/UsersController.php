<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\RegisterForm;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function login()
    {   
        $session = $this->request->session();
        $session->destroy();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            
            if ($user) {
                if(strpos($user['attributes'], $this->request->data['attribute']) !== false) {
                    $this->Auth->setUser($user);
                    if($this->request->data['attribute'] == 'V') {
                        return $this->redirect(['controller' => 'Volunteers', 'action' => 'index']);
                    } else if ($this->request->data['attribute'] == 'M') {
                        return $this->redirect(['controller' => 'Managers', 'action' => 'index']);
                        
                    } else if ($this->request->data['attribute'] == 'A') {
                        return $this->redirect(['controller' => 'Admins', 'action' => 'index']);
                        
                    }
                    
                } else {
                    $this->Flash->error('No se tiene la autorización necesaria');
                    
                }

            } else {
                $this->Flash->error(__('Nombre de usuario o contraseña incorrectos'));
            }
            
        }
    }

    public function register()
    {
        $register = new RegisterForm();

        $this->set('register', $register);

        if($this->request->is('post')) {
            if ($register->execute($this->request->data)) {


                $user = $this->Users->newEntity();
                $user->username = $this->request->data['username'];
                $user->password = $this->request->data['password'];
                $user->attributes = 'V';
                
                if($this->Users->save($user)) {
                    $this->loadModel('Volunteers');
                    $volunteer = $this->Volunteers->newEntity();
                    $volunteer->rut_volunteer = $this->request->data['rut'];
                    $volunteer->user_id = $user->id;
                    $volunteer->task_id = null;
                    $volunteer->name = $this->request->data['name'];
                    $volunteer->last_name_first = $this->request->data['last_name_first'];
                    $volunteer->last_name_second = $this->request->data['last_name_second'];
                    $volunteer->age = $this->request->data['age'];
                    $volunteer->residency = $this->request->data['residency'];
                    $volunteer->mail = $this->request->data['mail'];
                    $volunteer->disponibility = true;
                    $volunteer->performance_area = $this->request->data['performance_area'];
                    $volunteer->actual_ubication = $this->request->data['actual_ubication'];
                    $volunteer->phone = $this->request->data['phone'];

                    if($this->Volunteers->save($volunteer)) {
                        $this->Flash->success('Registrado con exito');
                        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                    }

                    

                }


                
            } else {
                $this->Flash->error('No se pudo ingresar el formulario');
            }
        }

        

    }

    public function logout()
    {
        //return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        return $this->redirect($this->Auth->logout());
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'register']);
    }

}
