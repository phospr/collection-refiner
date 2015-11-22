<?php

/*
 * This file is part of the Phospr CollectionRefiner package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phospr;

/**
 * CollectionRefiner
 *
 * Filter a collection of arrays based on some criteria
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.1.0
 */
class CollectionRefiner
{
    /**
     * Refine the collection
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.1.0
     *
     * @param array $rawCollection
     * @param array $criteria
     */
    public function refine(array $rawCollection, array $criteria)
    {
        $refinedCollection = [];

        foreach ($rawCollection as $element) {
            $criteriaMatches = 0;

            foreach ($criteria as $key => $value) {
                if ($element[$key] == $value) {
                    $criteriaMatches++;
                }
            }

            if (count($criteria) == $criteriaMatches) {
                $refinedCollection[] = $element;
            }
        }

        return $refinedCollection;
    }
}
