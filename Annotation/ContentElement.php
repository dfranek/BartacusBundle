<?php

/*
 * This file is part of the BartacusBundle.
 *
 * The BartacusBundle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The BartacusBundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with the BartacusBundle. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Bartacus\Bundle\BartacusBundle\Annotation;

/**
 * Define a Symfony controller actions as TYPO3 content element handler.
 *
 * @Annotation
 * @Target({"METHOD"})
 */
final class ContentElement
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $cached = true;

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (isset($options['value'])) {
            $this->name = (string) $options['value'];
        }

        if (isset($options['cached'])) {
            $this->cached = filter_var($options['cached'], FILTER_VALIDATE_BOOLEAN);
        }
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isCached(): bool
    {
        return $this->cached;
    }
}
