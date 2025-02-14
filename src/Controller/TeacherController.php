<?php 
 namespace App\Controller;

 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Teacher;
use App\Form\TeacherType;
use App\Repository\TeacherRepository;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/teacher')]
 class TeacherController extends AbstractController{
    
   
    
    #[Route('/show/all', name:'teacher_show_all')]
    public function ShowAll(TeacherRepository $teacherRepository){
        $teachers=$teacherRepository->findAll();
        return $this->render('teacher/showall.html.twig',['teachers'=>$teachers]);
    }

    #[Route('/showone/{id}', name:'teacher_show_one')]
    public function ShowOne(TeacherRepository $teacherRepository,$id){
        $teacher=$teacherRepository->find($id);
        return $this->render('teacher/showone.html.twig',['teacher'=>$teacher]);
    }

    #[Route('/new', name:'teacher_new')]
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
     
    #[Route('/update/{id<\d+>}', name:'teacher_update')]
    public function update(TeacherRepository $teacherRepository,$id){
             $teacher=$teacherRepository->find($id);         
             $teacher->setName('shahab is updated after updated controller');
     
            $teacherRepository->add($teacher,true);
        return $this->render('teacher/update.html.twig',['teacher'=>$teacher]);
    }

    #[Route('/delete/{id<\d+>}', name:'teacher_delete')]
    public function delete(TeacherRepository $teacherRepository,$id){
             $teacher=$teacherRepository->find($id);         
            if($teacher){
                $teacherRepository->remove($teacher);
            }else{
                $this->createNotFoundException("this is not exit");
            }
     
        return $this->render('teacher/delete.html.twig',['teacher'=>$teacher]);
    }


    #[Route('/create', name:'teacher_create')]
    public function create(Request $request, TeacherRepository $teacherRepository):Response{
       $teacher = new Teacher();
      $form= $this->createFormBuilder($teacher)
       ->add('name',TextType::class)
       ->add('fathername', TextType::class)
       ->add('email', EmailType::class)
       ->add('address', TextareaType::class)
       ->add('DateOfBirth', DateTimeType::class)
       ->add('save',SubmitType::class,['label'=>"add teacher"])
       ->getForm();
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
        $formdata=$form->getData();
        $teacherRepository->add($formdata,true);
        $this->addFlash('success',"the teacher data {$formdata->getName()} has been added");
        return $this->redirectToRoute('teacher_show_all');
           
       }
         return $this->render('teacher/create.html.twig',['form'=>$form]);
    }


    

    #[Route('/create/class', name:'teacher_create_class')]
    public function createClass(Request $request, TeacherRepository $teacherRepository):Response{
       $teacher = new Teacher();
        $form= $this->createForm(TeacherType::class);
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
        // $formdata=$form->getData();
        $teacherRepository->add($teacher,true);
        $this->addFlash('success',"the teacher data {$teacher->getName()} has been added");
        return $this->redirectToRoute('teacher_show_all');
           
       }
         return $this->render('teacher/createclass.html.twig',['form'=>$form]);
    }
 }
?>