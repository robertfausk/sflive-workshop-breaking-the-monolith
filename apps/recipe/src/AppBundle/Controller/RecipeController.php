<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use AppBundle\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{
    /**
     * @Route("/api/recipes/{recipe}", name="recipe")
     * @ParamConverter("recipe", class="AppBundle:Recipe")
     */
    public function detailAction(Request $request, Recipe $recipe)
    {
        return new Response(
            $this->get('serializer')->serialize($recipe, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * @Route("/api/recipes", name="recipes")
     */
    public function indexAction(Request $request)
    {
        $recipes = $this->get('repository.recipe')->findLatest();

        return new Response(
            $this->get('serializer')->serialize($recipes, 'json'),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}
