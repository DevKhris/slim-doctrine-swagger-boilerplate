<?php



namespace App;

use Dotenv\Dotenv;
use DI\ContainerBuilder;
use DI\Bridge\Slim\Bridge;
use Doctrine\ORM\EntityManager;
use App\Providers\DoctrineProvider;
use App\Providers\ViewProvider;
use Odan\Session\PhpSession;
use Slim\App;

/**
 * @OA\Info(
 *   title="Boilerplate API",
 *   version="1.0.0",
 * )
 */
class Application
{
    protected $container;

    protected $session;

    public App $application;

    public function __construct()
    {
        $config = Dotenv::createImmutable(
            APP_ROOT . DIRECTORY_SEPARATOR . '..'
        );

        $config->load();

        $builder = new ContainerBuilder();

        $this->container = $builder->build();

        $this->container->set('settings', $this->includeSettings());

        $this->container->set('view', ViewProvider::provide(null));

        $this->container->set(
            EntityManager::class,
            DoctrineProvider::provide($this->container)
        );

        $this->session = new PhpSession();

        $this->session->setOptions(['name' => 'App']);

        $this->session->start();

        $this->container->set('session', $this->session);

        $this->application = Bridge::create($this->container);
    }

    public function includeSettings(): array
    {
        $settings = include_once __DIR__ . '/app/settings.php';

        return $settings;
    }
}
