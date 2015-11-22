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
     * Test empty criteria
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.1.0
     */
    public function testEmptyCriteria()
    {
        $rawCollection = [
            [
                'model' => 'Toyota',
                'make' => 'Yaris',
                'color' => 'silver',
            ],
            [
                'model' => 'Toyota',
                'make' => 'Rav 4',
                'color' => 'red',
            ],
        ];

        $refiner = new CollectionRefiner();
        $refinedCollection = $refiner->refine($rawCollection);

        $this->assertEquals($rawCollection, $refinedCollection);
    }
}
