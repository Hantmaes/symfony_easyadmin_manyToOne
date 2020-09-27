<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Make;
use App\Entity\Model;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $data = json_decode( file_get_contents(__DIR__ . '/make-model.json'), true);

        // \DB::statement('TRUNCATE TABLE `vehicles`');

        foreach ($data as $vehicle) {    
            // $product = new Product();
            // $manager->persist($product);
            $make1 = new Make();
            $make1->setName($vehicle['make']);
            // $make1->setName($vehicle['make']);
            $manager->persist($make1);

            $manager->flush();

            foreach ($vehicle['models'] as $k) { 
                $model1 = new Model();
                $model1->setName($k);
                $model1->setMake($make1);
                $manager->persist($model1);

                $manager->flush();
            }
        }
    }
}
