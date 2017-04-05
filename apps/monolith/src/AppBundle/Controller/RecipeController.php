<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use AppBundle\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RecipeController extends Controller
{
    /**
     * @Route("/recipes/{recipe}", name="recipe")
     */
    public function detailAction(Request $request, $recipe)
    {
        $recipe = $this->get('repository.recipe')->findById($recipe);
        $comments = $this->get('repository.comment')->findByReference($recipe->getId());

        // replace this example code with whatever you need
        return $this->render(
            'recipe/detail.html.twig',
            [
                'recipe' => $recipe,
                'comments' => $comments,
            ]
        );
    }
}
