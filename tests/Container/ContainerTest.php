<?php
/**
 * @author         Pierre-Henry Soria <hi@ph7.me>
 * @copyright      (c) 2018, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; <https://www.gnu.org/licenses/gpl-3.0.en.html>
 */

declare(strict_types=1);

namespace PierreHenry\Tests\Container;

use Phake;
use PHPUnit\Framework\TestCase;
use PierreHenry\Container\Container;
use PierreHenry\Container\Exception\Container as ContainerException;
use PierreHenry\Container\Exception\ContainerNotFound as ContainerNotFoundException;
use PierreHenry\Container\Exception\Provider as ProviderException;
use PierreHenry\Container\Providable;

class ContainerTest extends TestCase
{
    private const PROVIDER_NAME = 'my_container';

    /** @var Container */
    private $container;

    protected function setUp(): void
    {
        $this->container = new Container();
    }

    public function testGetExistentContainer(): void
    {
        $this->container->register(
            'test.anonymous.myclass',
            new class implements Providable
            {
                public function getService()
                {
                    return new self;
                }
            }
        );

        $this->assertInstanceOf(
            Providable::class,
            $this->container->get('test.anonymous.myclass')
        );
    }

    public function testGetNonExistentContainer(): void
    {
        $this->expectException(ContainerNotFoundException::class);

        $this->container->get('idontexist');
    }

    public function testGetContainerThrowsException(): void
    {
        $this->expectException(ContainerException::class);

        $provider = Phake::mock(Providable::class);

        Phake::when($provider)->getService()->thenThrow(new ProviderException());

        $this->container->register(self::PROVIDER_NAME, $provider);
        $this->container->get(self::PROVIDER_NAME);
    }
}
