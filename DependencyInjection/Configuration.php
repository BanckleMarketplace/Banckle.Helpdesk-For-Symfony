<?php

namespace Banckle\Bundle\HelpdeskBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('banckle_helpdesk');

        $rootNode
            ->children()
            ->scalarNode('apiKey')->end()
            ->scalarNode('banckleAccountUri')->end()
            ->scalarNode('banckleHelpdeskUri')->end()
            ->end();

        return $treeBuilder;
    }
}
