<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 */
class TestController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       //Desde acá teni que poner $this->loadModel('Nombre del modelo'); para cargar el modelo
       //Luego, puedes llamar las weas del modelo con $this->NombreDelModelo->funcion(); o cosas asi
    	//Ej:
    	//$this->loadModel('Volunteers');
    	//$this->Volunteers->saveNewVolunteer($this->request->data, $user->id); (la funcion que hice en la wea de voluntarios)
    	//Obviamente tení que hacer la funcion en la clase del modelo correspondiente (Para el caso anterior, era VolunteersTable)
    	//esa cosa está en src/Table, ahi pillas las clases Table para meter todo.

    	//Para ejecutar toda esta mierda, llama a localhost o donde sea/test/index
    	//poi

    	//No rompas nada :^)
        $this->loadModel("Tasks");
        $this->Tasks->getTasks(4);

    } 

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index']);

    }


    
}
