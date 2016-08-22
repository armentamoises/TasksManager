<?php
	use App\TasksPDF;

	new TasksPDF();
	
	TasksPDF::AliasNbPages();
    
    TasksPDF::AddPage('L','Letter');
    
    TasksPDF::top($task['task_id'], $task['project_id'], $task['project_logo'], $task['status']);
  
    TasksPDF::task($task['project'],$task['task'], $task['description']);

    $types = array();
    
    foreach ($task['task_types'] as $key => $type) {
        $types[$key]['name'] = $type->name;
    }
    
    TasksPDF::tasktype($types, $task['due_date'], $task['end_date']);
    
    TasksPDF::priority($task['priority']);
    
    TasksPDF::observations($task['observations']);
    
    TasksPDF::flow($task['flow']);

    TasksPDF::SetTitle('Task #'.$task['task_id'].' - '.$task['task'], true);

    TasksPDF::Output();

    exit;