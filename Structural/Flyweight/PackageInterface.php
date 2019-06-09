<?php

namespace DesignPatterns\Structural\Flyweight;

/**
 * Flyweight.
 * Defines a common interface for all packages.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface PackageInterface
{
    /**
     * Get the name of a package.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the total weight of a package.
     * Extrinistic data (the `$density` parameter) is passed to this method. It
     * gets combined with intrinistic data (the `$volume` field) to produce the
     * result.
     *
     * @param int $density
     *
     * @return int
     */
    public function getTotalWeight($density);
}
