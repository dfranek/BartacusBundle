<?php declare(strict_types=1);

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

namespace Bartacus\Bundle\BartacusBundle\DependencyInjection;

use Bartacus\Bundle\BartacusBundle\Exception\DependencyUnsatisfiedException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Handle registration with JMSDiExtraBundle and other stuff.
 */
class BartacusExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // TODO: Nothing to load atm.
    }

    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');
        if (!isset($bundles['JMSDiExtraBundle'])) {
            throw new DependencyUnsatisfiedException('The JMSDiExtraBundle is not loaded!');
        }

        $container->prependExtensionConfig('jms_di_extra', [
            'locations' => [
                'bundles' => [
                    'BartacusBundle',
                ],
            ],
        ]);
    }
}