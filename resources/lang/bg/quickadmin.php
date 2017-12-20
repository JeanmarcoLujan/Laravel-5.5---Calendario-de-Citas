<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'clients' => [		'title' => 'Clients',		'fields' => [			'first-name' => 'First name',			'last-name' => 'Last name',			'phone' => 'Phone',			'email' => 'Email',		],	],
		'employees' => [		'title' => 'Employees',		'fields' => [			'first-name' => 'First name',			'last-name' => 'Last name',			'phone' => 'Phone',			'email' => 'Email',		],	],
		'working-hours' => [		'title' => 'Working hours',		'fields' => [			'employee' => 'Employee',			'date' => 'Date',			'start-time' => 'Start time',			'finish-time' => 'Finish time',		],	],
		'appointments' => [		'title' => 'Appointments',		'fields' => [			'client' => 'Client',			'employee' => 'Employee',			'start-time' => 'Start time',			'finish-time' => 'Finish time',			'comments' => 'Comments',		],	],
	'qa_create' => 'Създай',
	'qa_save' => 'Запази',
	'qa_edit' => 'Промени',
	'qa_view' => 'Покажи',
	'qa_update' => 'Обнови',
	'qa_list' => 'Списък',
	'qa_no_entries_in_table' => 'Няма записи в таблицата',
	'qa_custom_controller_index' => 'Персонализиран контролер.',
	'qa_logout' => 'Изход',
	'qa_add_new' => 'Добави нов',
	'qa_are_you_sure' => 'Сигурни ли сте?',
	'qa_back_to_list' => 'Обратно към списъка',
	'qa_dashboard' => 'Табло',
	'qa_delete' => 'Изтрий',
	'quickadmin_title' => 'Appointment ',
];