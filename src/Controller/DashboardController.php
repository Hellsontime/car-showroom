<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DashboardController extends BaseController
{
    public function __invoke(): Response
    {
        return $this->render('dashboard.html.twig');
    }

    public function avgToday(): Response
    {
        $avgToday = rand(10000, 99999);
        $orders = round($avgToday / 10000);

        return $this->render(
            'dashboard/card/avg-today.html.twig',
            ['avgToday' => $avgToday, 'orders' => $orders]
        );
    }

    public function avgWeek(): Response
    {
        $avgWeek = rand(10000*7, 99999*7);
        $orders = round($avgWeek / 10000);

        return $this->render(
            'dashboard/card/avg-week.html.twig',
            ['avgWeek' => $avgWeek, 'orders' => $orders]
        );
    }

    public function avgMonth(): Response
    {
        $avgMonth = rand(10000*30, 99999*30);
        $orders = round($avgMonth / 10000);

        return $this->render(
            'dashboard/card/avg-month.html.twig',
            ['avgMonth' => $avgMonth, 'orders' => $orders]
        );
    }

    public function avgQuarter(): Response
    {
        $avgQuarter = rand(10000*90, 99999*90);
        $orders = round($avgQuarter / 10000);

        return $this->render(
            'dashboard/card/avg-quarter.html.twig',
            ['avgQuarter' => $avgQuarter, 'orders' => $orders]
        );
    }

    public function avgYear(): Response
    {
        $avgYear = rand(10000*365, 99999*365);
        $orders = round($avgYear / 10000);

        return $this->render(
            'dashboard/card/avg-year.html.twig',
            ['avgYear' => $avgYear, 'orders' => $orders]
        );
    }

    public function avgAllTime(): Response
    {
        $avgAllTime = rand(10000*365*2, 99999*365*2);
        $orders = round($avgAllTime / 10000);

        return $this->render(
            'dashboard/card/avg-all-time.html.twig',
            ['avgAllTime' => $avgAllTime, 'orders' => $orders]
        );
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