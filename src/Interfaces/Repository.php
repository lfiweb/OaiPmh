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


namespace Picturae\OaiPmh\Interfaces;

use DateTime;
use Picturae\OaiPmh\Interfaces\Repository\Identity;

interface Repository
{
    /**
     * @return string the base URL of the repository
     */
    public function getBaseUrl(): string;
    
    /**
     * @return string
     * the finest harvesting granularity supported by the repository. The legitimate values are
     * YYYY-MM-DD and YYYY-MM-DDThh:mm:ssZ with meanings as defined in ISO8601.
     */
    public function getGranularity(): string;

    /**
     * @return Identity
     */
    public function identify(): Identity;

    /**
     * @return SetList
     */
    public function listSets(): SetList;

    /**
     * @param string $token
     * @return SetList
     */
    public function listSetsByToken(string $token): SetList;

    /**
     * @param string|null $metadataFormat
     * @param string $identifier
     * @return Record
     */
    public function getRecord(?string $metadataFormat, string $identifier): Record;

    /**
     * @param string|null $metadataFormat metadata format of the records to be fetch or null if only headers are fetched (listIdentifiers)
     * @param DateTime|null $from
     * @param DateTime|null $until
     * @param string|null $set name of the set containing this record
     * @return RecordList
     */
    public function listRecords(string $metadataFormat = null, DateTime $from = null, DateTime $until = null, string $set = null): RecordList;

    /**
     * @param string $token
     * @return RecordList
     */
    public function listRecordsByToken(string $token): RecordList;

    /**
     * @param string|null $identifier
     * @return MetadataFormatType[]
     */
    public function listMetadataFormats(string $identifier = null): array;
}
