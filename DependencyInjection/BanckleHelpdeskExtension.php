<?php

namespace Banckle\Bundle\HelpdeskBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class BanckleHelpdeskExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
		
        if (!isset($config['apiKey'])) {
            throw new \InvalidArgumentException('The API Key must be set');
        }

        $container->setParameter('apiKey', $config['apiKey']);
        $container->setParameter('banckleAccountUri', $config['banckleAccountUri']);
        $container->setParameter('banckleHelpdeskUri', $config['banckleHelpdeskUri']);
    }
}
