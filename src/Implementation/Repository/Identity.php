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


namespace Picturae\OaiPmh\Implementation\Repository;

use DateTime;
use DOMDocument;
use Picturae\OaiPmh\Interfaces\Repository\Identity as IdentityInterface;

/**
 * Class Identity
 * Basic implementation of \Picturae\OaiPmh\Interfaces\Repository\Identity
 *
 * @package Picturae\OaiPmh\Repository
 */
class Identity implements IdentityInterface
{
    /**
     * @var string
     */
    private string $repositoryName;

    /**
     * @var DateTime
     */
    private DateTime $earliestDatestamp;

    /**
     * @var string
     */
    private string $deletedRecord;

    /**
     * @var string
     */
    private string $granularity;

    /**
     * @var string[]
     */
    private array $adminEmails;

    /**
     * @var string|null
     */
    private ?string $compression;

    /**
     * @var DOMDocument|null
     */
    private ?DOMDocument $description;

    /**
     * @param string $repositoryName
     * @param DateTime $earliestDatestamp
     * @param string $deletedRecord
     * @param array $adminEmails
     * @param string $granularity
     * @param string|null $compression
     * @param DOMDocument|null $description
     */
    public function __construct(
        string $repositoryName,
        DateTime $earliestDatestamp,
        string $deletedRecord,
        array $adminEmails,
        string $granularity,
        string $compression = null,
        DOMDocument $description = null
    ) {
        $this->repositoryName = $repositoryName;
        $this->earliestDatestamp = $earliestDatestamp;
        $this->deletedRecord = $deletedRecord;
        $this->granularity = $granularity;
        $this->adminEmails = $adminEmails;
        $this->compression = $compression;
        $this->description = $description;
    }

    /**
     * @return string
     * a human readable name for the repository
     */
    public function getRepositoryName(): string
    {
        return $this->repositoryName;
    }

    /**
     * @return DateTime
     * a datetime that is the guaranteed lower limit of all datestamps recording changes,modifications, or deletions
     * in the repository. A repository must not use datestamps lower than the one specified
     * by the content of the earliestDatestamp element. earliestDatestamp must be expressed at the finest granularity
     * supported by the repository.
     */
    public function getEarliestDatestamp(): DateTime
    {
        return $this->earliestDatestamp;
    }

    /**
     * @return string
     * the manner in which the repository supports the notion of deleted records. Legitimate values are:
     * no
     * transient
     * persistent
     * with meanings defined in the section on deletion.
     */
    public function getDeletedRecord(): string
    {
        return $this->deletedRecord;
    }

    /**
     * @return string
     * the finest harvesting granularity supported by the repository. The legitimate values are
     * YYYY-MM-DD and YYYY-MM-DDThh:mm:ssZ with meanings as defined in ISO8601.
     */
    public function getGranularity(): string
    {
        return $this->granularity;
    }

    /**
     * @return string[] the e-mail address(es) of the administrator(s) of the repository.
     */
    public function getAdminEmails(): array
    {
        return $this->adminEmails;
    }

    /**
     * @return string|null
     * optional a compression encoding supported by the repository. The recommended values are those
     * defined for the Content-Encoding header in Section 14.11 of RFC 2616 describing HTTP 1.1
     */
    public function getCompression(): ?string
    {
        return $this->compression;
    }

    /**
     * @return DOMDocument|null
     * optional an extensible mechanism for communities to describe their repositories. For
     * example, the description container could be used to include collection-level metadata in the response to the
     * Identify request. Implementation Guidelines are available to give directions with this respect. Each description
     * container must be accompanied by the URL of an XML schema describing the structure of the description container.
     */
    public function getDescription(): ?DOMDocument
    {
        return $this->description;
    }
}
