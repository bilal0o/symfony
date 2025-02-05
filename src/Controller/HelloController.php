<?php 

namespace App\Controller;

use App\Repositry\StudentRepositry;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController{

    #[Route('/welcome/{name}' , name:'welcomeRoute' , methods:"get")]
    public function welcome($name){
       
        return $this->render("/hello/welcome.html.twig",['name' => $name]);

    }

    #[Route('/about')]
    public function about(StudentRepositry $studentRepositry){
          $studentRepositry->getStudents();
        return new Response("this is about symfony");
    }

    #[Route('/multiplynumber/{a<\d+>}/{b<\d+>}', name:'multiply')]
    public function multiply(int $a,int $b){
        $result = $a * $b;
       return $this->render('/hello/multiply.html.twig',['result'=>$result]);
    }

    #[Route('/getStudents')]
    public function getStudents(StudentRepositry $studentRepositry){
        $students=$studentRepositry->getStudents();
       return $this->render('/hello/getStudents.html.twig',['students'=>$students]);
    }
    

}

?>