<?php

return array(
	
	/**
	|------------------------------------------------------------------------------
	| Spanish
	|------------------------------------------------------------------------------
	*/

	//tasks-table.blade.php
	'module'               	=> 'Tabla de Tareas',
	'add'                 	=> 'Añadir',
	'task'                 	=> 'Tarea',
	'tasks'                 => 'Tareas',
	'requestor'      		=> 'Solicitante',
	'project'               => 'Proyecto',
	'type'               	=> 'Tipo',
	'status'               	=> 'Estado',
	'actions'               => 'Acciones',
	'iam-developer'         => "Soy el desarrollador",
	'iam-supervisor'        => "Soy el supervisor",

	//new-task.blade.php, edit-task.blade.php, delete-task.blade.php & scale-up-task.blade.php
	'm-new-task'            => 'Nueva Tarea',
	'm-edit-task'           => 'Editar Tarea',
	'm-delete-task'         => 'Eliminar Tarea',
	'm-name'                => 'Nombre',
	'm-description'         => 'Descripcion',
	'm-project'             => 'Proyecto',
	'm-priority'      		=> 'Prioridad',
	'm-type'      			=> 'Tipo',
	'm-supervisor'      	=> 'Supervisor',
	'm-developer'      		=> 'Desarrollador',
	'm-due-date'      		=> 'Fecha de entrega',
	'm-choose-proj'         => 'Elige un proyecto',
	'm-choose-value'        => 'Elige un valor',
	'm-choose-sup'        	=> 'Elige un supervisor',
	'm-choose-dev'        	=> 'Elige un desarrollador',
	'delete-question'       => '¿Estás seguro que deseas eliminar esta tarea?',

	'save'               	=> 'Guardar',
	'close'               	=> 'Cerrar',
	'update'               	=> 'Actualizar',
	'delete'               	=> 'Eliminar',
	'edit'               	=> 'Editar',
	'open-pdf'              => 'Ver Reporte de Tarea PDF',
	'pdf'              		=> 'Ver PDF',
	'low'                	=> 'Baja',
	'medium'                => 'Media',
	'high'                	=> 'Alta',
	'urgent'                => 'Urgente',

	// Controllers/TasksController.php
	'send-title'            => 'Enviar Tarea',
	'send-question'         => '¿Estás seguro que deseas enviar esta tarea para que sea aprobada?',
	'send'               	=> 'Enviar',
	'approve-title'         => 'Aprobar Tarea',
	'approve-question'      => '¿Estás seguro que deseas aprobar esta tarea para que sea autorizada?',
	'approve'               => 'Aprobar',
	'reject-title'          => 'Rechazar Tarea',
	'reject-question'       => '¿Estás seguro que deseas rechazar esta tarea?',
	'reject'               	=> 'Rechazar',
	'authorize-title'       => 'Autorizar Tarea',
	'authorize-question'    => '¿Estás seguro que deseas autorizar esta tarea?',
	'authorize'             => 'Autorizar',
	'assign-title'          => 'Asignar Tarea',
	'assign-question'       => '¿Estás seguro que deseas asignar esta tarea?',
	'assign'               	=> 'Asignar',
	'complete-title'        => 'Completar Tarea',
	'complete-question'     => '¿Estás seguro que deseas completar esta tarea?',
	'complete'              => 'Completar',

	'error-content-1'       => 'Elige una acción para la tarea.',

	'send-ok-msg'       	=> 'La tarea fue enviada con éxito para ser aprobada.',
	'approve-ok-msg'       	=> 'La tarea fue aprobada con éxito para ser autorizada.',
	'reject-ok-msg'       	=> 'La tarea fue rechazada con éxito.',
	'authorize-ok-msg'      => 'La tarea fue autorizada con éxito para ser asignada.',
	'assign-ok-msg'       	=> 'La tarea fue asignada con éxito para ser desarrollada.',
	'complete-ok-msg'       => 'La tarea fue completada con éxito.',

	// Models/Tasks.php
	'insert-msg'       		=> '¡La nueva tarea fue guardada con éxito!',
	'update-msg'       		=> '¡La tarea fue actualizada con éxito!',
	
	//TasksPDF.php
	'pdf-it'               	=> 'Departamento de Tecnologías de la Información',
	'pdf-status'            => 'Estado',
	'pdf-project'           => 'Proyecto',
	'pdf-task'              => 'Tarea',
	'pdf-description'       => 'Descripción',
	'pdf-due-date'          => 'Fecha de entrega',
	'pdf-completed'         => 'Completado en',
	'pdf-types'             => 'Tipo de Tarea',
	'pdf-observations'      => 'Observaciones',
	'pdf-priority'          => 'Prioridad',
	'pdf-requestor'         => 'Solicitante',
	'pdf-leadp'             => 'Líder de Proyecto',
	'pdf-chief'             => 'Jefe Depto IT',
	'pdf-supervisor'        => 'Supervisor',
	'pdf-developer'         => 'Desarrollador',
	'pdf-name'              => 'Nombre',
	'pdf-signature'         => 'Firma',
	'pdf-position'          => 'Puesto',
	'pdf-date'              => 'Fecha',
	
	'JS'=>array(
		'a' 	=> '',
	),
);