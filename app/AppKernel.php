<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new FOS\RestBundle\FOSRestBundle(), //rest service bundle
            new FOS\UserBundle\FOSUserBundle(), //Doctrine User management bundle
            new AppBundle\AppBundle(), //Our main application bundle
            new SalexUserBundle\SalexUserBundle(), //Salex user management bundle
            new Symfony\Bundle\AsseticBundle\AsseticBundle(), //Symfony Assets management bundle
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(), //doctrine migration bundle
            new Liip\ImagineBundle\LiipImagineBundle(), //image manipulation bundle
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(), //KNP menu bundle
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(), //Doctrine extension bundle
            new Vich\UploaderBundle\VichUploaderBundle(), //file uploader bundle
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(), //CK Editor
            new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(), //breadcrumbs
            new Avanzu\AdminThemeBundle\AvanzuAdminThemeBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(); //doctrine loading data bundle
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
