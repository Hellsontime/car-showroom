<?php

namespace App\DataFixtures;

use App\Entity\CarModel;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class F0_CarModelFixtures extends BaseFixture
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
        $this->createMany(CarModel::class, 25, function (CarModel $carModel, int $count) {
            $carModel->setModel($this->carFaker->vehicle());
            $carModel->setYear($this->carFaker->biasedNumberBetween(1980, 2022));
        });

        $manager->flush();
    }
}
