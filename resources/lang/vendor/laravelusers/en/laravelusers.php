<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel Users Blades Language Lines
    |--------------------------------------------------------------------------
    */

    'showing-all-users'     => 'Mostrar todos los Usuarios',
    'users-menu-alt'        => 'Mostrar menú de administración de usuario',
    'create-new-user'       => 'Crear nuevo Usuario',
    'show-deleted-users'    => 'Mostrar Usuario Eliminado',

    'create-new-user'       => 'Crear nuevo Usuario',
    'editing-user'          => 'Editando Usuario :name',
    'showing-user'          => 'Mostrando Usuario :name',
    'showing-user-title'    => 'Información de  :name',

    'users-table' => [
        'id'        => 'ID',
        'name'      => 'Name',
        'email'     => 'Email',
        'role'      => 'Role',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Borrar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Mostrar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Editar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'back-to-users' => '<span class="hidden-sm hidden-xs">Volver a </span><span class="hidden-xs">Usuarios</span>',
        'back-to-user'  => 'Volver  <span class="hidden-xs">a Usuario</span>',
        'delete-user'   => '<i class="far fa-trash-alt" aria-hidden="true"></i>  <span class="hidden-xs">Borrar</span><span class="hidden-xs"> Usuario</span>',
        'edit-user'     => '<i class="fas fa-pencil-alt" aria-hidden="true"></i> <span class="hidden-xs">Editar</span><span class="hidden-xs"> Usuario</span>',
    ],

    'tooltips' => [
        'delete'    => 'Delete',
        'show'      => 'Show',
        'edit'      => 'Edit',
    ],

    'messages' => [
        'userNameTaken'         => 'Nombre de Usuario ya registrado',
        'userNameRequired'      => 'Nombre de Usuario obligatorio',
        'fNameRequired'         => 'Nombre es obligatorio',
        'lNameRequired'         => 'Apellido es obligatorio',
        'emailRequired'         => 'Email es obligatorio',
        'emailInvalid'          => 'Email es incorrecto',
        'passwordRequired'      => 'Contraseña obligatoria',
        'PasswordMin'           => 'La contraseña necesita tener almenos 6 carácteres',
        'PasswordMax'           => 'Máximo 20 carácteres para la contraseña',
        'captchaRequire'        => 'Captcha es obligatorio',
        'CaptchaWrong'          => 'Captcha incorrecto',
        'roleRequired'          => 'Rol de Usuario obligatorio',
        'user-creation-success' => 'Usuario creado correctamente',
        'update-user-success'   => 'Usuario modificado correctamente',
        'delete-success'        => 'Usuario eliminado correctamente',
        'cannot-delete-yourself' => 'No puedes eliminarte a ti mismo, tolai',
    ],

    'show-user' => [
        'id'                => 'User ID',
        'name'              => 'Username',
        'email'             => '<span class="hidden-xs">User </span>Email',
        'role'              => 'User Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'User Role',
        'labelAccessLevel'  => '<span class="hidden-xs">User</span> Access Level|<span class="hidden-xs">User</span> Access Levels',
    ],
];
