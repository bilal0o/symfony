<?php 

namespace App\Repositry;

use Psr\Log\LoggerInterface;

class StudentRepositry{

    public function __construct(private LoggerInterface $logger){

    }
    private array $students = [
        1=>'bilal',
        2=>'shahab',
        3=> 'uzaee',
        4=>'amir'
    
    ];

    public function getStudents(){
        $this->logger->info("we have accessed from student class repositry");
        return $this->students;
    }

    public function getStudentById($id){
        
        return $this->students[$id];
    }
}


?>