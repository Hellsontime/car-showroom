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

    public function carsSoldLastYear(bool $sliced): Response
    {
        $carsSoldLastYear = [
            ['date' => '01.05.2022', 'sold' => 15],
            ['date' => '02.05.2022', 'sold' => 19],
            ['date' => '03.05.2022', 'sold' => 21],
            ['date' => '04.05.2022', 'sold' => 11],
            ['date' => '05.05.2022', 'sold' => 14],
            ['date' => '06.05.2022', 'sold' => 17],
            ['date' => '07.05.2022', 'sold' => 13],
            ['date' => '08.05.2022', 'sold' => 26],
        ];

        if ($sliced) {
            $carsSoldLastYear = array_slice($carsSoldLastYear, 0, 5);
        }

        return $this->render(
            'dashboard/table/cars-sold-last-year.html.twig',
            ['carsSoldLastYear' => $carsSoldLastYear]
        );
    }

    public function unsoldCars(bool $sliced): Response
    {
        $unsoldCars = [
            ['model' => 'civic', 'year' => 2005, 'price' => 1234, 'color' => 'color'],
            ['model' => 'lamborghini', 'year' => 2003, 'price' => 41234, 'color' => 'color'],
            ['model' => 'skoda', 'year' => 1994, 'price' => 12345, 'color' => 'color'],
            ['model' => 'volkswagen', 'year' => 2017, 'price' => 1234, 'color' => 'color'],
            ['model' => 'audi', 'year' => 2018, 'price' => 1234, 'color' => 'color'],
            ['model' => 'bmw', 'year' => 2022, 'price' => 1234, 'color' => 'color'],
            ['model' => 'mercedes', 'year' => 1999, 'price' => 12325, 'color' => 'color'],
            ['model' => 'porsche', 'year' => 2001, 'price' => 123442, 'color' => 'color'],
        ];

        if ($sliced) {
            $unsoldCars = array_slice($unsoldCars, 0, 5);
        }

        return $this->render(
            'dashboard/table/unsold-cars.html.twig',
            ['unsoldCars' => $unsoldCars]
        );
    }

    public function carsCurrentlyOnSale(bool $sliced): Response
    {
        $carsCurrentlyOnSale = [
            ['model' => 'mercedes', 'year' => 2016, 'price' => 12325, 'color' => 'color'],
            ['model' => 'lamborghini', 'year' => 2003, 'price' => 41234, 'color' => 'color'],
            ['model' => 'skoda', 'year' => 1994, 'price' => 12345, 'color' => 'color'],
            ['model' => 'volkswagen', 'year' => 2017, 'price' => 1234, 'color' => 'color'],
            ['model' => 'porsche', 'year' => 2001, 'price' => 123442, 'color' => 'color'],
            ['model' => 'audi', 'year' => 2018, 'price' => 1234, 'color' => 'color'],
            ['model' => 'bmw', 'year' => 2022, 'price' => 1234, 'color' => 'color'],
            ['model' => 'civic', 'year' => 2005, 'price' => 1234, 'color' => 'color'],
        ];

        if ($sliced) {
            $carsCurrentlyOnSale = array_slice($carsCurrentlyOnSale, 0, 5);
        }

        return $this->render(
            'dashboard/table/cars-currently-on-sale.html.twig',
            ['carsCurrentlyOnSale' => $carsCurrentlyOnSale]
        );
    }
}