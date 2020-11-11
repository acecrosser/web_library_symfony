<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Route("/hello/{name}", name="homepage")
     */
    public function index(string $name = '')
    {
        $greet = '';
        if ($name) {
            $greet = sprintf('<h1>Hello %s!</h1>', htmlspecialchars($name));
        }
        
        return New Response(<<<EOF
        
        <html>
            <body>
                $greet
                <b> Тут любой текст </b>
            </body>
        </html>
        
        EOF
        );
    }
}
