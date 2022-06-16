<?php

namespace App\Service;

use App\Repository\CarShowroomRepository;

class DashboardService
{
    private CarShowroomRepository $_carsShowroomRepository;

    public function __construct(CarShowroomRepository $carShowroomRepository)
    {
        $this->_carsShowroomRepository = $carShowroomRepository;
    }

    public function avgAllTime(): array
    {
        $result = $this->_carsShowroomRepository->getAveragePriceAllTime();

        $avgPrice = round($result[0][1]);
        $orders = $result[0][2];

        return ['avgPrice' => $avgPrice, 'orders' => $orders];
    }

    public function avgToday(): array
    {
        $result = $this->_carsShowroomRepository->getAveragePriceToday();

        $avgPrice = round($result[0][1]);
        $orders = $result[0][2];

        return ['avgPrice' => $avgPrice, 'orders' => $orders];
    }

    public function avgInRange(int $daysAgo): array
    {
        $result = $this->_carsShowroomRepository->getAveragePriceInRange($daysAgo);

        $avgPrice = round($result[0][1]);
        $orders = $result[0][2];

        return ['avgPrice' => $avgPrice, 'orders' => $orders];
    }

    public function getCarsSoldLastYear(): array
    {
        $res = $this->_carsShowroomRepository->getCarsSoldLastYear();

        for ($i = 0; $i < count($res); $i++) {
            $res[$i]['date'] = date('d.m.Y', $res[$i]['date']->getTimestamp());
        }

        return $res;
    }
}