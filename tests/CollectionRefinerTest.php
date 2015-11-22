<?php

/*
 * This file is part of the Phospr CollectionRefiner package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phospr\Tests;

use Phospr\CollectionRefiner;

/**
 * CollectionRefinerTest
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.1.0
 */
class CollectionRefinerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test refine
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.1.0
     *
     * @dataProvider refineProvider
     */
    public function testRefine($collection, $criteria, $count, $first)
    {
        $refiner = new CollectionRefiner();
        $refinedCollection = $refiner->refine($collection, $criteria);

        $this->assertEquals($count, count($refinedCollection));
        $this->assertEquals($first, $refinedCollection[0]);
    }

    /**
     * Provide data for testRefine()
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.1.0
     *
     * @return array
     */
    public static function refineProvider()
    {
        // collection
        // criteria
        // count
        // first
        return [
            // red cars
            [
                self::getCars(),
                ['color' => 'red'],
                4,
                ['make' => 'Toyota', 'model' => 'Rav 4', 'color' => 'red'],
            ],
            // fords
            [
                self::getCars(),
                ['make' => 'Ford'],
                3,
                ['make' => 'Ford', 'model' => 'Mustang', 'color' => 'red'],
            ],
            // white fords
            [
                self::getCars(),
                ['make' => 'Ford', 'color' => 'white'],
                1,
                ['make' => 'Ford', 'model' => 'Focus', 'color' => 'white'],
            ],
        ];
    }

    /**
     * Get a collection of cars
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.1.0
     *
     * @return array
     */
    private static function getCars()
    {
        return [
            ['make' => 'Toyota', 'model' => 'Yaris', 'color' => 'silver'],
            ['make' => 'Toyota', 'model' => 'Rav 4', 'color' => 'red'],
            ['make' => 'Toyota', 'model' => 'Camry', 'color' => 'white'],
            ['make' => 'Toyota', 'model' => 'Camry', 'color' => 'black'],
            ['make' => 'Ford', 'model' => 'Mustang', 'color' => 'red'],
            ['make' => 'Ford', 'model' => 'Focus', 'color' => 'red'],
            ['make' => 'Ford', 'model' => 'Focus', 'color' => 'white'],
            ['make' => 'Jaguar', 'model' => 'E Type', 'color' => 'black'],
            ['make' => 'Jaguar', 'model' => 'E Type', 'color' => 'blue'],
            ['make' => 'VW', 'model' => 'Golf', 'color' => 'silver'],
            ['make' => 'VW', 'model' => 'Golf', 'color' => 'red'],
            ['make' => 'VW', 'model' => 'Passat', 'color' => 'white'],
            ['make' => 'Subaru', 'model' => 'Imprezza', 'color' => 'white'],
        ];
    }
}
