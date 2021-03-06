<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Nearby;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class NearbyController extends Controller
{
    /**
     * @Route("/nearby", name="nearby_list")
     */
    public function listAction(Request $request)
    {
        $nearby= new Nearby;
        $form = $this->createFormBuilder($nearby)
        ->add('city', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('save', SubmitType::class, array('label' => 'Search Now', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) 
        {
            // get data
            $city = $form['city']->getData();
            die($city);


            $em = $this->getDoctrine()->getManager();
            $nearby = $em->getRepository('AppBundle:Nearby')
                         ->
                         ->find($id);


            $nearby->setName(city);

            return $this->render('nearby/search.html.twig', array(
                'city' => $city,
            ));


        }

        return $this->render('nearby/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/nearby/create", name="todo_create")
     */
    public function createAction(Request $request)
    {
        $todo = new Todo;
        $form = $this->createFormBuilder($todo)
        ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('category', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('priority', ChoiceType::class, array('choices' => array('Low' => 'Low', 'Normal' => 'Normal', 'High' => 'High'), 
                'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('due_date', DateTimeType::class, array('attr' => array('class' => 'formcontrol', 'style' => 'margin-bottom:15px')))
        ->add('save', SubmitType::class, array('label' => 'Create Todo', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) 
        {
            //get data
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $description = $form['description']->getData();
            $priority = $form['priority']->getData();
            $due_date = $form['due_date']->getData();

            $now = new\DateTime('now');

            $todo->setName($name);
            $todo->setCategory($category);
            $todo->setDescription($description);
            $todo->setPriority($priority);
            $todo->setDueDate($due_date);
            $todo->setCreateDate($now);

            $em = $this->getDoctrine()->getManager();

            $em->persist($todo);
            $em->flush();
            
            $this->addFlash(
                'notice', 
                'Todo Added'
            );

            return $this->redirectToRoute('todo_list');

        }
        return $this->render('todo/create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/todo/edit/{id}", name="todo_edit")
     */
    public function editAction($id, Request $request)
    {
        $todo = $this->getDoctrine()
                ->getRepository('AppBundle:Todo')
                ->find($id);

            $now = new\DateTime('now');

            $todo->setName($todo->getName());
            $todo->setCategory($todo->getCategory());
            $todo->setDescription($todo->getDescription());
            $todo->setPriority($todo->getPriority());
            $todo->setDueDate($todo->getdueDate());
            $todo->setCreateDate($now);

        $form = $this->createFormBuilder($todo)
        ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('category', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('priority', ChoiceType::class, array('choices' => array('Low' => 'Low', 'Normal' => 'Normal', 'High' => 'High'), 
                'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('due_date', DateTimeType::class, array('attr' => array('class' => 'formcontrol', 'style' => 'margin-bottom:15px')))
        ->add('save', SubmitType::class, array('label' => 'Update Todo', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) 
        {
            //get data
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $description = $form['description']->getData();
            $priority = $form['priority']->getData();
            $due_date = $form['due_date']->getData();

            $now = new\DateTime('now');

            $em = $this->getDoctrine()->getManager();
            $todo = $em->getRepository('AppBundle:Todo')->find($id);

            $todo->setName($name);
            $todo->setCategory($category);
            $todo->setDescription($description);
            $todo->setPriority($priority);
            $todo->setDueDate($due_date);
            $todo->setCreateDate($now);

            $em->flush();
            
            $this->addFlash(
                'notice', 
                'Todo Updated'
            );

            return $this->redirectToRoute('todo_list');

        }

        return $this->render('todo/edit.html.twig', array(
            'todo' => $todo,
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/todo/details/{id}", name="todo_details")
     */
    public function detailsAction($id)
    {
        $todo = $this->getDoctrine()
        ->getRepository('AppBundle:Todo')
        ->find($id);

        return $this->render('todo/detail.html.twig', array(
            'todo' => $todo
        ));
    }

    /**
     * @Route("/todo/delete/{id}", name="todo_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $todo = $em->getRepository('AppBundle:Todo')->find($id);

        $em->remove($todo);
        $em->flush();

        $this->addFlash(
                'notice', 
                'Todo Remove'
            );
        return $this->redirectToRoute('todo_list');
    }
}
