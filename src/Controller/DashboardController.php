<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DashboardController extends BaseController
{
    public function __invoke(): Response
    {
        return $this->render('dashboard.html.twig');
    }

    public function avgPriceAllTime(): Response
    {
        return $this->render('dashboard/average-price-all-time.html.twig');
    }

    public function avgPriceToday(): Response
    {
        return $this->render('dashboard/average-price-today.html.twig');
    }

    public function carsSoldLastYear(): Response
    {
        return $this->render('dashboard/cars-sold-last-year.html.twig');
    }

    public function unsoldCars(): Response
    {
        return $this->render('dashboard/unsold-cars.html.twig');
    }

    public function carsCurrentlyOnSale(): Response
    {
        return $this->render('dashboard/cars-currently-on-sale.html.twig');
    }
}