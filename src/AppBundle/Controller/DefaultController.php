<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Schoolsocialgroup;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/teacher", name="teacher")
     */
    public function teacherAction(Request $request)
    {
        $dictants = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'dictant' => $dictants,
        ]);
    }

    /**
     * @Route("/medialibrary", name="medialibrary")
     */
    public function medialibraryAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/medialibrary.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    public function addDictantAction(Request $request)
    {

    }

    /**
     * @Route("/dictant/{id}", name="dictant_item")
     */
    public function dictantAction(Request $request, $id)
    {
        $dictant_item = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->find($id);
        $dictants = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->findAll();
        $class = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolclass')->findAll();
        $groupAdapt = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolsocialgroup')->findAll();
        $gruopKid = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolclass')->findAll();

        // replace this example code with whatever you need
        return $this->render('default/dictantItem.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'dictant' => $dictants,
            'dictant_item' => $dictant_item,
            'schoolclass' => $class,
            'groupAdapt' => $groupAdapt,
            'gruopKid' => $gruopKid,
        ]);

    }

    /**
     * @Route("/adaptation/{id}", name="adaptation_item")
     */
    public function adaptationAction(Request $request, $id)
    {
        $dictants = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->findAll();
        $class = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolclass')->findAll();
        $groupAdapt = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolsocialgroup')->findAll();
        /** @var Schoolsocialgroup $adaptation_item */
        $adaptation_item = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolsocialgroup')->find($id);
        $gruopKid = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolclass')->findAll();

        // replace this example code with whatever you need
        return $this->render('default/adaptationgroupItem.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'dictant' => $dictants,
            'adaptation_item' => $adaptation_item,
            'schoolclass' => $class,
            'groupAdapt' => $groupAdapt,
            'gruopKid' => $gruopKid,
        ]);
    }

    /**
     * @Route("/group/{id}", name="group_item")
     */
    public function groupKidsAction(Request $request, $id)
    {
        $dictants = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->findAll();
        $class = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolclass')->findAll();
        $groupAdapt = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolsocialgroup')->findAll();
        /** @var Schoolsocialgroup $adaptation_item */
        $group_item = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolclass')->find($id);
        $gruopKid = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolclass')->findAll();

        // replace this example code with whatever you need
        return $this->render('default/schoolclassItem.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'dictant' => $dictants,
            'group_item' => $group_item,
            'schoolclass' => $class,
            'groupAdapt' => $groupAdapt,
            'gruopKid' => $gruopKid,
        ]);
    }
}
