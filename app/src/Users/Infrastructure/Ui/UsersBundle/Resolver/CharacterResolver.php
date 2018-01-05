<?php
namespace Misa\Users\Infrastructure\Ui\UsersBundle\Resolver;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * CharacterResolver Class
 *
 * @package Misa\Users\Infrastructure\Ui\UsersBundle\Resolver
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Orbis
 */
class CharacterResolver implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function resolveType($data)
    {
        $typeResolver = $this->container->get('overblog_graphql.type_resolver');

        $humanType = $typeResolver->resolve('Human');
        $droidType = $typeResolver->resolve('Droid');

        $humans = StarWarsData::humans();
        $droids = StarWarsData::droids();
        if (isset($humans[$data['id']])) {
            return $humanType;
        }
        if (isset($droids[$data['id']])) {
            return $droidType;
        }
        return null;
    }

    public function resolveFriends($character)
    {
        return StarWarsData::getFriends($character);
    }

    public function resolveHero($args)
    {
        return StarWarsData::getHero(isset($args['episode']) ? $args['episode'] : null);
    }

    public function resolveHuman($args)
    {
        $humans = StarWarsData::humans();
        return isset($humans[$args['id']]) ? $humans[$args['id']] : null;
    }

    public function resolveDroid($args)
    {
        $droids = StarWarsData::droids();
        return isset($droids[$args['id']]) ? $droids[$args['id']] : null;
    }
}