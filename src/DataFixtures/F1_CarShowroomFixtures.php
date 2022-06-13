<?php

namespace App\DataFixtures;

use App\Entity\CarModel;
use App\Entity\CarShowroom;
use App\Helper\DateTimeHelper;
use App\Helper\RandomHelper;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class F1_CarShowroomFixtures extends BaseFixture
{
    private Generator $faker;
    private Generator $carFaker;

    public function __construct()
    {
        $this->faker = Factory::create();
        $this->carFaker = Factory::create();
        $this->carFaker->addProvider(new \Faker\Provider\Fakecar($this->carFaker));
    }

    public function loadData(ObjectManager $manager): void
    {
        $price_range = range(9999, 99999, 1000);
        $saleChanceArray = RandomHelper::getRandomBoolArray(80);

        $this->createMany(CarShowroom::class, 100, function (CarShowroom $carShowroom, int $count) use ($price_range, $saleChanceArray) {
            $price = $price_range[array_rand($price_range)];
            $isSold = $saleChanceArray[rand(0, 99)];
            $car_year = $this->getReference(CarModel::class.'_'.rand(0,24))->getYear();

            $carShowroom->setColor($this->faker->colorName());
            $carShowroom->setModel($this->getReference(CarModel::class.'_'.rand(0,24)));
            $carShowroom->setPrice($price);
            $carShowroom->setSign($isSold);
            if ($isSold) {
                $dateOfSale =  DateTimeHelper::randomDateTillNow($car_year.'-01-01');

                $carShowroom->setDateOfSale(
                    \DateTimeImmutable::createFromFormat('Y-m-d', $dateOfSale));
            }
        });

        $manager->flush();
    }
}
