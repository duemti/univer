<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

use DesignPatterns\Behavioral\ChainOfResponsibility\Handler;
use DesignPatterns\Behavioral\ChainOfResponsibility\AbstractHandler;
use DesignPatterns\Behavioral\ChainOfResponsibility\CoffeeHandler;
use DesignPatterns\Behavioral\ChainOfResponsibility\TeaHandler;
use DesignPatterns\Behavioral\ChainOfResponsibility\WaterHandler;
use PHPUnit\Framework\TestCase;

class ChainOfResponsibilityTest extends TestCase
{
	private Handler	$chain;

	public function	setUp(): void
	{
		$coffee = new CoffeeHandler();
		$tea = new TeaHandler();
		$water = new WaterHandler();

		$coffee->setNext($tea)->setNext($water);
		$this->chain = $coffee;
	}

	public function	testCanBrewCoffee()
	{
		$result = $this->chain->handle("Coffee");

		$this->assertIsString($result);
		$this->assertStringContainsString("Coffee:", $result);
	}

	public function	testCanMakeSomeTea()
	{
		$result = $this->chain->handle("Tea");

		$this->assertIsString($result);
		$this->assertStringContainsString("Tea:", $result);
	}

	public function	testCanGetSomeWater()
	{
		$result = $this->chain->handle("Water");

		$this->assertIsString($result);
		$this->assertStringContainsString("Water:", $result);
	}
}
