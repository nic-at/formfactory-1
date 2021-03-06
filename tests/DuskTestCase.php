<?php

namespace FormFactoryTests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Gajus\Dindent\Indenter;
use HtmlFactoryTests\Traits\AssertsHtml;
use Laravel\Dusk\Browser;
use Webflorist\FormFactory\FormFactoryFacade;
use Webflorist\FormFactory\FormFactoryServiceProvider;
use Webflorist\HtmlFactory\HtmlFactoryServiceProvider;
use Orchestra\Testbench\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use AssertsHtml, TestCaseTrait;

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        //Cookie Settings
        $app['config']->set('session.expire_on_close', false);

        // Setup new View path
        $app['config']->set('view.paths', [
            __DIR__ . '/Browser/views'
        ]);

        $this->setupConfig($app);
        $this->loadRoutes($app);
    }

    protected function setUp()
    {
        parent::setUp();

    }
    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {

        $options = (new ChromeOptions())->addArguments([
            '--disable-gpu',
            '--headless',
            '--start-maximized',
            '--no-sandbox',
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
            ChromeOptions::CAPABILITY, $options
        )
        );
    }


    /**
     * Nicely prints current page source.
     *
     * @param Browser $browser
     * @throws \Gajus\Dindent\Exception\InvalidArgumentException
     * @throws \Gajus\Dindent\Exception\RuntimeException
     */
    protected function prettyPrintPageSource(Browser $browser)
    {
        dd((new Indenter())->indent($browser->driver->getPageSource()));
    }

    /**
     * Load Routes
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function loadRoutes($app)
    {
        //set routes for the testsystem
        $app['router']->middleware('web')
            ->group($this->resolveBrowserTestsPath() . '/routes.php');

    }

    protected function getPackageProviders($app)
    {
        return [
            HtmlFactoryServiceProvider::class,
            FormFactoryServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Form' => FormFactoryFacade::class,
        ];
    }

    /**
     * Figure out where the test directory is, if we're an included package, or the root one.
     *
     * @param string $path
     *
     * @return string
     */
    protected function resolveBrowserTestsPath($path = __DIR__)
    {
        $root = dirname(__DIR__);

        return $root . '/tests/Browser';
    }

    protected function waitForAndAssertSee(Browser $browser, $text) {
        $browser->waitForText($text);
        $browser->assertSee($text);
    }

}
