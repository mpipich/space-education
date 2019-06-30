<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dictationresult;
use AppBundle\Entity\Schoolsocialadapt;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    /**
     * @Route("/user/main", name="user_main")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('user/main.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/user/dictant", name="user_dictant")
     */
    public function dictantAction(Request $request)
    {
        $dictant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->find(1);

        // replace this example code with whatever you need
        return $this->render('user/dictant.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'dictant' => $dictant,
        ]);
    }

    /**
     * @Route("/user/dictant/result", name="user_dictant_result")
     */
    public function saveDictantAction(Request $request)
    {
        $dictant = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->find(1);

        $userDictantText = (str_replace(["\r", "\n", "  "], ' ', $request->request->get('dictanttext')));
        $etalonDictantText = (str_replace(["\r", "\n", "  "], ' ', $dictant->getDictationtext()));
        $fails = '';
        $retUserDictantText = array();
        $retEtalonDictantText = array();
        $lenUd = mb_strlen($userDictantText, "UTF-8");
        $lenEd = mb_strlen($userDictantText, "UTF-8");
        $countError = 0;
        for ($i = 0; $i < $lenUd; $i++) {
            $retUserDictantText[] = mb_substr($userDictantText, $i, 1, "UTF-8");
        }

        for ($i = 0; $i < $lenEd; $i++) {
            $retEtalonDictantText[] = mb_substr($etalonDictantText, $i, 1, "UTF-8");
        }

        foreach ($retUserDictantText as $k => $symb){
            if($retEtalonDictantText[$k] != $retUserDictantText[$k]){

                $fails.="<strong style='font-size: 48px; color: red'>".$retUserDictantText[$k]."<span style='color: green'>(".$retEtalonDictantText[$k].")</span></strong>";
                $countError++;

            } else {
                $fails.= $retEtalonDictantText[$k];
            }
        }

        $result = new Dictationresult();
        $result->setCountfail($countError);
        $result->setIdkid($this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolkid')->find(1));
        $result->setIddictant($this->getDoctrine()->getManager()->getRepository('AppBundle:Dictation')->find(1));
        $result->setUsertext($userDictantText);

        $this->getDoctrine()->getManager()->persist($result);
        $this->getDoctrine()->getManager()->flush();

        return $this->render('user/dictantResult.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'result' => $result,
            'fails' => $fails,
            'countError' => $countError,
            'retUserDictantText' => $retUserDictantText
        ]);
    }

    /**
     * @Route("/user/adaptation/test/{id}/{question}", name="user_adaptation_test")
     */
    public function adaptationAction(Request $request, $id, $question = null)
    {
        $session = new Session();

        $adaptation = $this->getDoctrine()->getManager()->getRepository('AppBundle:Schoolsocialgroup')->find($id);
        if (!$adaptation) {
            throw new NotFoundHttpException();
        }

        /** @var Schoolsocialadapt[] $tests */
        $tests = $adaptation->getTests();
        $indexTest = [];

        foreach ($tests as $test) {
            $indexTest[$test->getId()] = $test;
        }

        if (!$question) {
            /** @var Schoolsocialadapt $thisQuestion */
            $thisQuestion = array_shift($indexTest);
            $nextQueshionOb = array_shift($indexTest);
            $nextQueshionId = $nextQueshionOb->getId();
            $session->set('test_error_' . $id, 0);
        } else if ($question != 'final') {
            $thisQuestion = $indexTest[$question];
            foreach ($indexTest as $k => $ost) {
                if ($k > $thisQuestion->getId()) {
                    $nextQueshionId = $k;
                    break;
                }
            }
        } else {
            $errors = $session->get('test_error_' . $id) ?? 0;
            return $this->render('user/adaptationFinal.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
                'errors' => $errors,
            ]);
        }

        if ($request->getMethod() == Request::METHOD_POST) {
            $r = $request->request->get('result');
            if ($r != $thisQuestion->getVariantOk()->getId()) {
                $errors = $session->get('test_error_' . $id) ?? 0;
                $errors = $errors + 1;
                $session->set('test_error_' . $id, $errors);
            }

            return $this->redirect($this->generateUrl('user_adaptation_test', ['id' => $id, 'question' => $nextQueshionId ?? 'final']));
        }

        // replace this example code with whatever you need
        return $this->render('user/adaptation.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'thisQuestion' => $thisQuestion,
            'nextQueshionId' => $nextQueshionId ?? 'final',
            'idTest' => $id,
            'tests' => $tests,
        ]);
    }

}
