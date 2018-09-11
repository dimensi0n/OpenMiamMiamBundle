<?php

/*
 * This file is part of the OpenMiamMiam project.
 *
 * (c) Isics <contact@isics.fr>
 *
 * This source file is subject to the AGPL v3 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Isics\Bundle\OpenMiamMiamBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateMatchingProductsCommand extends ContainerAwareCommand
{
    /**
     * @see ContainerAwareCommand
     */
    protected function configure()
    {
        $this->setName('openmiammiam:update-matching-products')
            ->setDescription('Fill table with the most sold product in same orders for every given products');
    }

    /**
     * @see ContainerAwareCommand
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            'My Command',
            '==========',
            ''
        ]);

        $repository = $this->getContainer()->get('doctrine')
            ->getEntityManager()
            ->getRepository("IsicsOpenMiamMiamBundle:Product")
            ->MostAssociatedProducts();


        $output->writeln($repository);
    }
}