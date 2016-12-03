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

                debug($this->request->data);

                $user = $this->Users->newEntity();
                $user->username = $this->request->data['username'];
                $user->password = $this->request->data['password'];
                $user->attributes = 'V';
                
                if($this->Users->save($user)) {
                    $this->loadModel('Volunteers');

                    if($this->Volunteers->saveNewVolunteer($this->request->data, $user->id)) {
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

    public function isAuthorized($user) {
        return true;
    } 

}
