<?php 
 namespace App\Controller;

use App\Entity\Teacher;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


 class TeacherController extends AbstractController{
    
    
    #[Route('/teacher/show/all', name:'teacher_show_all')]
    public function ShowAll(TeacherRepository $teacherRepository){
        $teachers=$teacherRepository->findAll();
        return $this->render('teacher/showall.html.twig',['teachers'=>$teachers]);
    }

    #[Route('/teacher/showone/{id}', name:'teacher_show_all')]
    public function ShowOne(TeacherRepository $teacherRepository,$id){
        $teacher=$teacherRepository->find($id);
        return $this->render('teacher/showone.html.twig',['teacher'=>$teacher]);
    }

    #[Route('/teacher/new', name:'teacher_new')]
    public function new(TeacherRepository $teacherRepository){
             $teacher=new Teacher;         
        $teacher->setname('shahab khan');
        $teacher->setFatherName('mujeeb');
        $teacher->setDateOfBirth(new \DateTimeImmutable('2001-01-01'));
        $teacher->setAddress("peashawar");
        $teacher->setEmail("shahab@gmail.com");
     
            $teacherRepository->add($teacher,true);
        return $this->render('teacher/new.html.twig',['teacher'=>$teacher]);
    }
     
    #[Route('/teacher/update/{id<\d+>}', name:'teacher_update')]
    public function update(TeacherRepository $teacherRepository,$id){
             $teacher=$teacherRepository->find($id);         
             $teacher->setName('shahab is updated after updated controller');
     
            $teacherRepository->add($teacher,true);
        return $this->render('teacher/update.html.twig',['teacher'=>$teacher]);
    }

    #[Route('/teacher/delete/{id<\d+>}', name:'teacher_delete')]
    public function delete(TeacherRepository $teacherRepository,$id){
             $teacher=$teacherRepository->find($id);         
            if($teacher){
                $teacherRepository->remove($teacher);
            }else{
                $this->createNotFoundException("this is not exit");
            }
     

        return $this->render('teacher/delete.html.twig',['teacher'=>$teacher]);
    }
 }
?>