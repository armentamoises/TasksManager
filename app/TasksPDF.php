<?php

namespace App;

use Fpdf;
use Lang;

class TasksPDF extends Fpdf{
	
    public static function top($task_id, $project_id, $project_logo, $status){
            
            $logo = public_path() . '/img/projects/'.$project_logo;
            
            if(file_exists($logo)){
                self::Image($logo,10,15,50,null);   
            }
            
            self::SetDrawColor(50,50,50);
            self::SetFillColor(50,50,50);
            self::SetFont('Arial','',13);
            self::Ln(6); 
            self::Cell(75,5,"",0,0,'C',false);
            self::Cell(120,5,strtoupper(utf8_decode(Lang::get('tasks.pdf-it'))),0,1,'C',false);
            
            self::Ln(12);
            self::SetFont('Arial','',9);
            self::SetTextColor(255,255,255); 
            self::Cell(175,6,"",0,0,'C',false);
            $today = date('D  Y-M-d');
            self::SetTextColor(255,255,255);
            self::Cell(80,6,$today,1,1,'C',true);

            self::SetY(45);     
            self::Cell(30,6,"ID",1,0,'C',true);
            self::SetTextColor(50,50,50); 
            self::Cell(135,6,$task_id,1,0,'C',false);
            self::Cell(10,6,"",0,0,'C',false);
              
            self::SetTextColor(255,255,255);
            self::Cell(40,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-status'))),1,0,'C',true);
            self::SetTextColor(50,50,50); 
            self::Cell(40,6,$status,1,1,'C',false);

            self::SetAuthor('Moises Armenta', true);
    
            self::SetCreator(env('APP_NAME'), true);
    }

    public static function task($project, $task,$description){
            self::Ln(5);   
            self::SetFont('Arial','',9);
            self::SetTextColor(255,255,255);     
            self::Cell(30,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-project'))),1,0,'C',true);
            self::SetTextColor(50,50,50); 
            self::Cell(135,6, strtoupper(utf8_decode($project)),1,1,'C',false);
            self::SetTextColor(255,255,255);  
            self::Ln(5); 
            self::Cell(30,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-task'))),1,0,'C',true);
            self::SetTextColor(50,50,50); 
            self::Cell(135,6, strtoupper(utf8_decode($task)),1,1,'C',false);
            self::Ln(5);    
            self::SetTextColor(255,255,255);  
            self::Cell(30,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-description'))),1,1,'C',true);
            self::Cell(165,20,'',1,1,'J',false);
            $y = self::GetY();
            self::SetY($y - 20);
            self::SetTextColor(50,50,50);
            self::MultiCell(165,5,"\n".utf8_decode($description),0,'J',false);   
    }

    public static function tasktype($tasktypes, $due_date, $end_date){
            if ($due_date != NULL) {
                self::SetY(56);
                $y = self::GetY();
                self::SetX(185);
                self::SetTextColor(255,255,255); 
                self::Cell(40,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-due-date'))),1,0,'C',true);
                self::SetTextColor(50,50,50);
                self::SetX(225);
                self::Cell(40,6,$due_date,1,1,'C',false); 
                if ($end_date != NULL) {
                    self::SetY(67);
                    $y = self::GetY();
                    self::SetX(185);
                    self::SetTextColor(255,255,255); 
                    self::Cell(40,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-completed'))),1,0,'C',true);
                    self::SetTextColor(50,50,50);
                    self::SetX(225);
                    self::Cell(40,6,$end_date,1,1,'C',false);      
                }    
            }else{
                self::SetY(73);    
            }
            
            self::Ln(11);

            $y = self::GetY();
            self::SetX(185);
            self::SetTextColor(255,255,255); 
            self::Cell(80,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-types'))),1,1,'C',true);
            self::SetTextColor(50,50,50);
            foreach ($tasktypes as $key => $task) {
                
                self::SetFont('Arial','',9);
                self::SetX(185);
                self::Cell(70,6,utf8_decode($task['name']),1,0,'L',false);
                self::Cell(10,6,"",1,1,'C',false);
                if ($key == 0) {
                    $y = $y + 7.5;
                }
                else{
                    $y = $y + 6;   
                }
                self::Image(public_path() . '/img/tasks/checked.jpg',258,$y,3.5,null);
            }
    }

    public static function observations($observations){
        self::SetY(107);
        self::SetTextColor(255,255,255); 
        self::Cell(30,6,strtoupper(utf8_decode(Lang::get('tasks.pdf-observations'))),1,1,'C',true);
        self::Cell(165,20,"",1,1,'L',false);
        $y = self::GetY();
        self::SetY($y - 20);
        self::SetTextColor(50,50,50);
        self::MultiCell(165,5,"\n".utf8_decode($observations),0,'J',false);
    }

    public static function priority($priority){
            self::SetY(135);
            self::SetFont('Arial','',9);
            self::Cell(50,5,strtoupper(utf8_decode(Lang::get('tasks.pdf-priority'))),0,1,'L',false);
            self::SetTextColor(255,255,255);  
            self::Cell(41.25,6,strtoupper(utf8_decode(Lang::get('tasks.low'))),'LT',0,'C',true);
            self::Cell(41.25,6,strtoupper(utf8_decode(Lang::get('tasks.medium'))),1,0,'C',true);
            self::Cell(41.25,6,strtoupper(utf8_decode(Lang::get('tasks.high'))),1,0,'C',true);
            self::Cell(41.25,6,strtoupper(utf8_decode(Lang::get('tasks.urgent'))),1,1,'C',true);

            self::Cell(41.25,6,"",1,0,'C',false);
            self::Cell(41.25,6,"",1,0,'C',false);
            self::Cell(41.25,6,"",1,0,'C',false);
            self::Cell(41.25,6,"",1,1,'C',false);

            $y = self::SetY(147);

            
            
            switch ($priority) {
                case 1:
                    $x = self::SetX(30);
                break;
                case 2:
                    $x = self::SetX(70);
                break;
                case 3:
                    $x = self::SetX(110);
                break;
                case 4:
                    $x = self::SetX(155);
                break;
                
                default:
                    $x = self::SetX(30);
                break;
            }
            self::Image(public_path() . '/img/tasks/checked.jpg',$x,$y,3.5,null);
            self::SetTextColor(255,255,255);    
    }

    public static function flow($flow){
            self::SetY(160);
            self::SetFont('Arial','',9);
            //self::Cell(50,5,utf8_decode("nada de nada"),0,1,'L',false);
            self::SetTextColor(255,255,255);  
            self::Cell(30,7,utf8_decode(""),0,0,'C',false);
            self::Cell(45,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-requestor'))),1,0,'C',true);
            self::Cell(45,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-leadp'))),1,0,'C',true);
            self::Cell(45,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-chief'))),1,0,'C',true);
            self::Cell(45,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-supervisor'))),1,0,'C',true);
            self::Cell(45,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-developer'))),1,1,'C',true);

            self::Cell(30,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-name'))),1,0,'C',true);
            self::SetTextColor(50,50,50);  
            self::Cell(45,7, strtoupper(utf8_decode($flow['requestor']['name'])),1,0,'C',false);
            self::Cell(45,7, strtoupper(utf8_decode($flow['lead_project']['name'])),1,0,'C',false);
            self::Cell(45,7, strtoupper(utf8_decode($flow['chief']['name'])),1,0,'C',false);
            self::Cell(45,7, strtoupper(utf8_decode($flow['supervisor']['name'])),1,0,'C',false);
            self::Cell(45,7, strtoupper(utf8_decode($flow['developer']['name'])),1,1,'C',false);
            
            self::SetTextColor(255,255,255);             
            self::Cell(30,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-signature'))),1,0,'C',true);
            self::SetTextColor(50,50,50); 
            if ($flow['requestor']['id'] != "") {
                if(file_exists(public_path() . '/img/tasks/'.$flow['requestor']['id'].'_signature.jpg')){
                    $requestor_avatar = asset('/img/tasks/'.$flow['requestor']['id'].'_signature.jpg');  
                    self::Image($requestor_avatar,53,175,20,null); 
                }
            }
            self::Cell(45,7,"",1,0,'C',false);

            if ($flow['lead_project']['id'] != "") {
                if(file_exists(public_path() . '/img/tasks/'.$flow['lead_project']['id'].'_signature.jpg')){
                    $requestor_avatar = asset('/img/tasks/'.$flow['lead_project']['id'].'_signature.jpg');  
                    self::Image($requestor_avatar,98,175,20,null); 
                }
            }
            self::Cell(45,7,"",1,0,'C',false);

            if ($flow['chief']['id'] != "") {
                if(file_exists(public_path() . '/img/tasks/'.$flow['chief']['id'].'_signature.jpg')){
                    $requestor_avatar = asset('/img/tasks/'.$flow['chief']['id'].'_signature.jpg');  
                    self::Image($requestor_avatar,143,175,20,null); 
                }
            }
            self::Cell(45,7,"",1,0,'C',false);

            if ($flow['supervisor']['id'] != "") {
                if(file_exists(public_path() . '/img/tasks/'.$flow['supervisor']['id'].'_signature.jpg')){
                    $requestor_avatar = asset('/img/tasks/'.$flow['supervisor']['id'].'_signature.jpg');  
                    self::Image($requestor_avatar,187,175,20,null); 
                }
            }
            self::Cell(45,7,"",1,0,'C',false);

            if ($flow['developer']['id'] != "") {
                if(file_exists(public_path() . '/img/tasks/'.$flow['developer']['id'].'_signature.jpg')){
                    $requestor_avatar = asset('/img/tasks/'.$flow['developer']['id'].'_signature.jpg');  
                    self::Image($requestor_avatar,232,175,20,null); 
                }
            }
            self::Cell(45,7,"",1,1,'C',false);
            
            self::SetTextColor(255,255,255); 
            self::Cell(30,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-position'))),1,0,'C',true);
            self::SetTextColor(50,50,50);  
            self::SetFont('Arial','',9);
            self::Cell(45,7,utf8_decode($flow['requestor']['position']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['lead_project']['position']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['chief']['position']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['supervisor']['position']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['developer']['position']),1,1,'C',false);
            
            self::SetTextColor(255,255,255); 
            self::SetFont('Arial','',9);
            self::Cell(30,7,strtoupper(utf8_decode(Lang::get('tasks.pdf-date'))),1,0,'C',true);
            self::SetTextColor(50,50,50);  
            self::Cell(45,7,utf8_decode($flow['requestor']['request_date']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['lead_project']['request_date']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['chief']['request_date']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['supervisor']['request_date']),1,0,'C',false);
            self::Cell(45,7,utf8_decode($flow['developer']['request_date']),1,1,'C',false);
    }

    


}