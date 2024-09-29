<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    private $authors;
    public function __construct()
    {
        $this->authors = [

            ['id' => 1, 'picture' => '/images/vh.png', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
      
            ['id' => 2, 'picture' => '/images/ws.png', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
      
            ['id' => 3, 'picture' => '/images/th.png', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
      
          ];
      

    }
    #[Route('/author', name: 'author_index',methods:['GET'])]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }


    #[Route('/author/{name}', name: 'author_show',defaults:['name'=>'victor hugo'],methods:['GET'])]
    public function ShowAuthor($name): Response
    {
        return $this->render('author/ShowAuthor.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/listAuthors', name: 'author_list',methods:['GET'])]
    public function listAuthors(): Response
    {
        return $this->render('author/listAuthors.html.twig', [
            'Authors' => $this -> authors,
            
        ]);
        
    }
   


    #[Route('/authorDetails/{id}', name: 'author_details', methods: ['GET'])]
    public function authorDetails($id): Response
    {
        
        $author = array_filter($this->authors, fn($author) => $author['id'] == $id);
        if (empty($author)) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }
        $author = array_shift($author);

        return $this->render('author/showAuthor.html.twig', [
            'author' => $author,
        ]);
    }

    
}
