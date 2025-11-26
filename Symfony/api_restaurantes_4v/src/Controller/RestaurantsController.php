<?php

namespace App\Controller;

use App\Model\RespuestaErrorDTO;
use App\Model\RestauranteDTO;
use App\Model\RestaurantTypeDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;

final class RestaurantsController extends AbstractController
{

    private $restaurantes = [];
    private $restaurantesItalianos = [];

    public function __construct(){
        $restauranteItaliano = new RestaurantTypeDTO(1,"Italiano");
        $restaurante1 = new RestauranteDTO(1, "La tagliatella", $restauranteItaliano);
        $restaurante2 = new RestauranteDTO(2, "La mamma", $restauranteItaliano);
        $this->restaurantes = [$restaurante1, $restaurante2];

        $this->restaurantesItalianos = [$restaurante1];


    }

    #[Route('/restaurants', name: 'app_restaurants')]
    public function getRestaurantes(#[MapQueryParameter()] ?string $tipo  = null): JsonResponse
    {

        try {

            // Valido el tipo
            if ($tipo != null && $tipo != "Italiano" && $tipo != "Oriental" && $tipo != "Latino"){
                $errorMensaje = new RespuestaErrorDTO(1, "Validación tipo restaurante invalido");
                return new JsonResponse($errorMensaje, 400);
            }

            // Recupero la onformación segun el tipo
            if ($tipo == "Italiano"){
                return $this->json($this->restaurantesItalianos);
            }
            else{
                return $this->json($this->restaurantes);  
            }

        } catch (\Throwable $th) {
            $errorMensaje = new RespuestaErrorDTO(1000, "Error General");
            return new JsonResponse($errorMensaje, 500);
        }

    }
}
