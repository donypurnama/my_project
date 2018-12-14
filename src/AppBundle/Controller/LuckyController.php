<?php 

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = rand(0, 100);
        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
        // return new Response(
        //     '<html><body>Lucky Number : '.$number.'</body></html>'
        // );
    }
}


