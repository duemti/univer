<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Facade;

use DesignPatterns\Structural\Facade\Bios;
use DesignPatterns\Structural\Facade\OperatingSystem;
use DesignPatterns\Structural\Facade\Facade;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
	public function	testCanTurnOnTheComputer()
	{
		$os = $this->createMock(OperatingSystem::class);

		$os->method('getName')
			 ->will($this->returnValue('Linux'));

		$bios = $this->createMock(Bios::class);

		$bios->method('launch')
			->with($os);

		$facade = new Facade($bios, $os);
		$facade->turnOn();

		$this->assertSame('Linux', $os->getName());
	}

	public function	testCanTurnOffTheComputer()
	{
		$os = $this->createMock(OperatingSystem::class);

		$os->method('getName')
			 ->will($this->returnValue('MacOS'));

		$bios = $this->createMock(Bios::class);

		$bios->method('launch')
			->with($os);

		$facade = new Facade($bios, $os);
		$facade->turnOff();
		$this->assertSame('MacOS', $os->getName());
	}
}
