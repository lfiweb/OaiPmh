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


namespace Picturae\OaiPmh\Implementation;

use Picturae\OaiPmh\Interfaces\Set as SetInterface;

/**
 * Class SetList
 * Basic implementation of Picturae\OaiPmh\Interfaces\SetList
 *
 * @package Picturae\OaiPmh
 */
class SetList implements \Picturae\OaiPmh\Interfaces\SetList
{
    /**
     * @var string|null
     */
    private ?string $resumptionToken;

    /**
     * @var Set[]
     */
    private array $items;

    /**
     * @var int|null
     */
    private ?int $completeListSize;
    
    /**
     * @var int|null
     */
    private ?int $cursor;
    
    /**
     * @param Set[] $items
     * @param string|null $resumptionToken
     * @param int|null $completeListSize
     * @param int|null $cursor
     */
    public function __construct(array $items, string $resumptionToken = null, int $completeListSize = null, int $cursor = null)
    {
        $this->items = $items;
        $this->resumptionToken = $resumptionToken;
        $this->completeListSize = $completeListSize;
        $this->cursor = $cursor;
    }


    /**
     * @return string|null
     */
    public function getResumptionToken(): ?string
    {
        return $this->resumptionToken;
    }

    /**
     * @return SetInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    
    /**
     * @return int|null
     */
    public function getCompleteListSize(): ?int
    {
        return $this->completeListSize;
    }
    
    /**
     * @return int|null
     */
    public function getCursor(): ?int
    {
        return $this->cursor;
    }
}
