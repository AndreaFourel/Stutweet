<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Post::class);
        $post = $repository->findAll(); // select * from `post`
        dump($post);
        return $this->render('post/index.html.twig', [
            'title' => 'Mes posts',
            'posts' => $post,
        ]);
    }

    #[Route('/post/new')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('post/form.html.twig', [
            "title" => 'New post',
            "post_form" => $form->createView(),
            // enable/disable CSRF protection for this form
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'app_post_create',
        ]);
    }
    #[Route('/post/edit/{id<\d+>}', name: 'edit-post')]
    public function update(Post $post, ManagerRegistry $doctrine, Request $request): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('post/form.html.twig', [
            "title" => 'Modifier Pos',
            "post_form" => $form->createView(),
        ]);
    }

    #[Route('/post/delete/{id<\d+>}', name: 'delete-post')] // le param converter va s'occuper de recup l'instace Post correspondant ?? l'id de la route
    public function delete(Post $post, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('home');
    }

    #[Route('/post/copy/{id<\d+>}', name: 'copy-post')]
    public function duplicate(Post $post, ManagerRegistry $doctrine,): Response
    {
        $copyPost = clone $post;
        $em = $doctrine->getManager();
        $em->persist($copyPost);
        $em->flush();
        return $this->redirectToRoute('home');


    }
}
