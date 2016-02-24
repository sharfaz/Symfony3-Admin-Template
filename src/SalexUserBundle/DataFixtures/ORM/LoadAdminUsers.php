<?php
/**
 * This is the class for load data into database
 * using Object Manager like Doctrine or Mongo DB.
 * 
 * We are using Doctrine to persist data into database
 * 
 * Symfony uses DoctrineFixturesBundle to load data.
 * 
 * Plese see http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html
 * for more details about the bundle and how to configure it. 
 */

namespace SalexUserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SalexUserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadAdminUsers implements FixtureInterface, ContainerAwareInterface
{
    /**
     * 
     * @var ContainerAwareInterface
     */
    private $container;
    
    /**
     * Set the ContainerAwareInteface method to load any services for data fixture classes
     * 
     * {@inheritDoc}
     * @see \Symfony\Component\DependencyInjection\ContainerAwareInterface::setContainer()
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * Main method to load data into database
     * {@inheritDoc}
     * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
     */
    public function load(ObjectManager $manager)
    {
        //Add admin user
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        
        $encoder  = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($userAdmin, 'test');
        
        $userAdmin->setPassword($password);
        $userAdmin->setEmail('admin@example.com');
        $userAdmin->setFirstName('Standard');
        $userAdmin->setLastName('Administrator');
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $userAdmin->setEnabled(true);

        $manager->persist($userAdmin);
        $manager->flush();
    }
}