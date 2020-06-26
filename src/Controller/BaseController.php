<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    class BaseController extends AbstractController
    {
        public function index()
        {
            return $this->render('app.html.twig');
        }
    }
    
?>

