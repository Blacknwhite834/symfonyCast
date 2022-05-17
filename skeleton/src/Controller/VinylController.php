<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #Première page: HomePage

    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'RadioHead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];
        dump($tracks);

        return $this->render('vinyl/homepage.html.twig', [
            #Variable:
            'title' => 'PB and Jams',
            'tracks' => $tracks,
        ]);
    }


    #Deuxième page: localhost/browse/{quelquechose} ou localhost/browse

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse($slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}