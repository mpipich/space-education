<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dictationresult;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

                $fails.="<strong style='font-size: 20px; color: red'>".$retUserDictantText[$k]."<span style='color: green'>(".$retEtalonDictantText[$k].")</span></strong>";
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

        return new Response($fails);
    }
}
