<?php namespace Ddup\Wechat\Kernel;


use Ddup\Wechat\Providers\ConfigProvider;
use Ddup\Wechat\Providers\LogProvider;
use Ddup\Wechat\Providers\SessionProvider;
use Ddup\Wechat\Config\MiniAccount;
use Ddup\Wechat\Config\OfficialAccount;
use Ddup\Wechat\Contracts\SessionInterface;
use Pimple\Container;
use Psr\Log\LoggerInterface;

/**
 * Class Application
 * @property LoggerInterface logger
 * @property SessionInterface session
 * @property OfficialAccount official_config
 * @property MiniAccount mini_config
 * @property \EasyWeChat\OfficialAccount\Application official_app
 * @property \EasyWeChat\MiniProgram\Application mini_app
 * @package Ddup\Wechat
 */
class Application extends Container
{

    private $providers = [
        ConfigProvider::class,
        SessionProvider::class
    ];

    public function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->registerProviders();
    }

    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            parent::register(new $provider);
        }
    }
}