<?php

/*
 * This file is part of Picturae\Oai-Pmh.
 *
 * Picturae\Oai-Pmh is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Picturae\Oai-Pmh is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Picturae\Oai-Pmh.  If not, see <http://www.gnu.org/licenses/>.
 */


namespace Picturae\OaiPmh\Exception;

use ArrayIterator;
use IteratorAggregate;
use Picturae\OaiPmh\Exception;
use ReturnTypeWillChange;
use Traversable;

class MultipleExceptions extends Exception implements IteratorAggregate
{
    private array $exceptions = [];

    /**
     * @param array $exceptions
     * @return $this
     */
    public function setExceptions(array $exceptions): static
    {
        $this->exceptions = $exceptions;
        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable|ArrayIterator An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    #[ReturnTypeWillChange] public function getIterator(): Traversable|ArrayIterator
    {
        return new ArrayIterator($this->exceptions);
    }
}
