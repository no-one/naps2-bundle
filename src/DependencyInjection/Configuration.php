<?php
namespace noone\NAPS2Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('naps2');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
                ->scalarNode('executable_path')->defaultValue('C:\Program Files (x86)\NAPS2\NAPS2.Console.exe')->info('Path to the NAPS2 executable')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
