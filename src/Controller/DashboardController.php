<?php

namespace App\Controller;

use App\Service\DashboardService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends BaseController
{
    private DashboardService $_dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->_dashboardService = $dashboardService;
    }

    public function __invoke(): Response
    {
        return $this->render('pages/home/cars-showroom-dashboard.html.twig');
    }

    public function renderSoldLastYear(): Response
    {
        return $this->render('pages/data/sold-last-year.html.twig');
    }

    public function renderUnsoldCars(): Response
    {
        return $this->render('pages/data/unsold-cars.html.twig');
    }

    public function renderCurrentlyOnSale(): Response
    {
        return $this->render('pages/data/currently-on-sale.html.twig');
    }

    public function avgToday(): Response
    {
        $res = $this->_dashboardService->avgToday();

        $avgToday = $res['avgPrice'];
        $orders = $res['orders'];

        return $this->render(
            'dashboard/card/avg-today.html.twig',
            ['avgToday' => $avgToday, 'orders' => $orders]
        );
    }

    public function avgWeek(): Response
    {
        $res = $this->_dashboardService->avgInRange(7);

        $avgWeek = $res['avgPrice'];
        $orders = $res['orders'];

        return $this->render(
            'dashboard/card/avg-week.html.twig',
            ['avgWeek' => $avgWeek, 'orders' => $orders]
        );
    }

    public function avgMonth(): Response
    {
        $res = $this->_dashboardService->avgInRange(30);

        $avgMonth = $res['avgPrice'];
        $orders = $res['orders'];

        return $this->render(
            'dashboard/card/avg-month.html.twig',
            ['avgMonth' => $avgMonth, 'orders' => $orders]
        );
    }

    public function avgQuarter(): Response
    {
        $res = $this->_dashboardService->avgInRange(90);

        $avgQuarter = $res['avgPrice'];
        $orders = $res['orders'];

        return $this->render(
            'dashboard/card/avg-quarter.html.twig',
            ['avgQuarter' => $avgQuarter, 'orders' => $orders]
        );
    }

    public function avgYear(): Response
    {
        $res = $this->_dashboardService->avgInRange(365);

        $avgYear = $res['avgPrice'];
        $orders = $res['orders'];

        return $this->render(
            'dashboard/card/avg-year.html.twig',
            ['avgYear' => $avgYear, 'orders' => $orders]
        );
    }

    public function avgAllTime(): Response
    {
        $res = $this->_dashboardService->avgAllTime();

        $avgAllTime = $res['avgPrice'];
        $orders = $res['orders'];

        return $this->render(
            'dashboard/card/avg-all-time.html.twig',
            ['avgAllTime' => $avgAllTime, 'orders' => $orders]
        );
    }

    public function test(): Response
    {
        $res = $this->_dashboardService->getCarsSoldLastYear();

        return new JsonResponse($res);
    }

    public function carsSoldLastYear(bool $sliced = false, bool $button = false): Response
    {
        $carsSoldLastYear = $this->_dashboardService->getCarsSoldLastYear();

        if ($sliced) {
            $carsSoldLastYear = array_slice($carsSoldLastYear, 0, 5);
        }

        return $this->render(
            'dashboard/table/cars-sold-last-year.html.twig',
            [
                'carsSoldLastYear' => $carsSoldLastYear,
                'button' => $button,
            ]
        );
    }

    public function unsoldCars(bool $sliced = false, bool $button = false): Response
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
            [
                'unsoldCars' => $unsoldCars,
                'button' => $button,
            ]
        );
    }

    public function carsCurrentlyOnSale(bool $sliced = false, bool $button = false): Response
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
            [
                'carsCurrentlyOnSale' => $carsCurrentlyOnSale,
                'button' => $button,
            ]
        );
    }
}