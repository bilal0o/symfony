<?php 
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Repositry\CategoryRepository;
use App\Repositry\StudentRepositry;
use Doctrine\DBAL\Types\Types;
use ReflectionClass;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id =null;

    #[ORM\Column]
    private ?string $name=null;

    


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;    
    }
}

?>