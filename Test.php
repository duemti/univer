<?PHP
declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod\Tests;

use DesignPatterns\FactoryMethod\FileLogger;
use DesignPatterns\FactoryMethod\FileLoggerFactory;
use DesignPatterns\FactoryMethod\StdoutLogger;
use DesignPatterns\FactoryMethod\StdoutLoggerFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
	public function TestCanCreateStdoutLogging()
	{
		$loggerFactory = new StdoutLoggerFactory;
		$logger = $loggerFactory->createLogger();

		$this->assertInstanceOf(StdoutLogger::class, $logger);
	}

	public function	testCanCreateFileLogging()
	{
		$loggerFactory = new FileLoggerFactory();
		$logger = $loggerFactory->createLogger();

		$this->assertInstanceOf(FileLogger::class, $logger);
	}
}
