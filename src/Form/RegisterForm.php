<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class RegisterForm extends Form {

	protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('username', ['type' => 'string'])
            ->addField('password', ['type' => 'password', 'label' => 'password'])
            ->addField('rut', ['type' => 'string', 'label' => 'Rut'])
            ->addField('name', ['type' => 'string', 'label' => 'Nombre'])
            ->addField('last_name_first', ['type' => 'string', 'label' => 'Apellido Paterno'])
            ->addField('last_name_second', ['type' => 'string', 'label' => 'Apellido Materno'])
            ->addField('age', ['type' => 'integer', 'label' => 'Edad'])
            ->addField('residency', ['type' => 'string', 'label' => 'Residencia'])
            ->addField('region', ['type' => 'string', 'label' => 'Region'])
            ->addField('phone', ['type' => 'string', 'label' => 'Telefono'])
            ->addField('mail', ['type' => 'string', 'label' => 'Mail'])
            ->addField('performance_area', ['type' => 'string', 'label' => 'Area de desempeño'])
            ->addField('actual_ubication', ['type' => 'string', 'label' => 'Ubicación Actual']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('username', 'length', [
                'rule' => ['minLength', 5],
                'message' => 'Min length 5'
            ])->add('mail', 'format', [
                'rule' => 'email',
                'message' => 'A valid email address is required',
            ])->add('rut', 'format', [
                'rule' => ['custom', '/\d{1,8}\-[K|k|0-9]/'],
                'message' => 'Rut invalido (Ej: 18949578-K)',
            ])->add('name', 'format', [
                'rule' => ['custom', '/^[a-zA-ZñÑ]+$/'],
                'message' => 'Nombres solo pueden contener letras',
            ])->add('last_name_first', 'format', [
                'rule' => ['custom', '/^[a-zA-ZñÑ]+$/'],
                'message' => 'Apellidos solo pueden contener letras',
            ])->add('last_name_second', 'format', [
                'rule' => ['custom', '/^[a-zA-ZñÑ]+$/'],
                'message' => 'Apellidos solo pueden contener letras',
            ])->add('age', 'format', [
                'rule' => 'naturalNumber',
                'message' => 'Ingrese una edad valida',
            ])->add('password', 'format', [
                'rule' => 'notBlank',
                'message' => 'Ingrese contraseña',
            ])->add('residency', 'format', [
                'rule' => 'notBlank',
                'message' => 'Ingrese residencia',
            ])->add('phone', 'format', [
                'rule' => ['custom', '/^[0-9+]+$/'],
                'message' => 'Ingrese contraseña',
            ])->add('performance_area', 'format', [
                'rule' => 'notBlank',
                'message' => 'Ingrese el area (lugar) donde se desempeña',
            ])->add('actual_ubication', 'format', [
                'rule' => 'notBlank',
                'message' => 'Ingrese la ubicación actual donde se encuentra',
            ])->add('date', 'format', [
                'rule' => ['custom', '/^[0-9+]+$/'],
                'message' => 'Fecha invalido (Ej: 2014/12/12)',
            ]);

            
    }

    protected function _execute(array $data)
    {
        // Send an email.
        return true;
    }

}