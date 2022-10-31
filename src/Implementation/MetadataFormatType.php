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

use Picturae\OaiPmh\Interfaces\MetadataFormatType as MetadataFormatTypeInterface;

class MetadataFormatType implements MetadataFormatTypeInterface
{
    /**
     * @var string
     */
    private string $namespace;

    /**
     * @var string
     */
    private string $schema;

    /**
     * @var string
     */
    private string $prefix;


    /**
     * @param string $prefix
     * @param string $schema
     * @param string $namespace
     */
    public function __construct(string $prefix, string $schema, string $namespace)
    {
        $this->namespace = $namespace;
        $this->prefix = $prefix;
        $this->schema = $schema;
    }


    /**
     * @return string
     * The metadataPrefix - a string to specify the metadata format in OAI-PMH requests issued to the repository.
     * metadataPrefix consists of any valid URI unreserved characters. metadataPrefix arguments are used in ListRecords,
     * ListIdentifiers, and GetRecord requests to retrieve records, or the headers of records that include metadata in
     * the format specified by the metadataPrefix;
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @return string
     * The metadata schema URL - the URL of an XML schema to test validity of metadata expressed according to the format
     */
    public function getSchema(): string
    {
        return $this->schema;
    }

    /**
     * @return string The XML namespace URI that is a global identifier of the metadata format.
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }
}
