<?php

namespace App\Service;

use App\Repository\CarShowroomRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class DashboardService
{
    private CarShowroomRepository $_carsShowroomRepository;

    public function __construct(CarShowroomRepository $carShowroomRepository)
    {
        $this->_carsShowroomRepository = $carShowroomRepository;
    }

    /**
     * @return array
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function avgAllTime(): array
    {
        $result = $this->_carsShowroomRepository->getAveragePriceAllTime();

        $avgPrice = round($result['avgPrice']);
        $orders = $result['orders'];

        return ['avgPrice' => $avgPrice, 'orders' => $orders];
    }

    /**
     * @return array
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function avgToday(): array
    {
        $result = $this->_carsShowroomRepository->getAveragePriceToday();

        $avgPrice = round($result['avgPrice']);
        $orders = $result['orders'];

        return ['avgPrice' => $avgPrice, 'orders' => $orders];
    }

    /**
     * @param int $daysAgo
     * @return array
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function avgInRange(int $daysAgo): array
    {
        $result = $this->_carsShowroomRepository->getAveragePriceInRange($daysAgo);

        $avgPrice = round($result['avgPrice']);
        $orders = $result['orders'];

        return ['avgPrice' => $avgPrice, 'orders' => $orders];
    }

    public function getCarsSoldLastYear(): array
    {
        $result = $this->_carsShowroomRepository->getCarsSoldLastYear();

        for ($i = 0; $i < count($result); $i++) {
            $result[$i]['date'] = date('d.m.Y', $result[$i]['date']->getTimestamp());
        }

        return $result;
    }

    public function getUnsoldCars(): array
    {
        return $this->_carsShowroomRepository->getUnsoldCars();
    }

    public function getModelsOnSale(): array
    {
        return $this->_carsShowroomRepository->getModelsOnSale();
    }
}