<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Bridge\Tests;

use DesignPatterns\Structural\Bridge\Radio;
use DesignPatterns\Structural\Bridge\Television;
use DesignPatterns\Structural\Bridge\Remote;
use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{
	public function	testCanTurnOnTheTelevision()
	{
		$remote = new Remote(new Television());
		$remote->togglePower();

		$this->assertTrue($remote->powerState());
	}

	public function	testCanChangeTheTelevisionChannel()
	{
		$remote = new Remote(new Television());
		$remote->nextChannel();
		$remote->nextChannel();
		$remote->nextChannel();

		$this->assertSame(3, $remote->getChannel());
	}


	public function	testCanChangeTheTelevisionVolume()
	{
		$remote = new Remote(new Television());
		for ($i = 0; $i < 50; $i++)
			$remote->volumeUp();

		$this->assertSame(50, $remote->getVolume());
	}

	public function	testCanTurnOnTheRadio()
	{
		$remote = new Remote(new Radio());
		$remote->togglePower();

		$this->assertTrue($remote->powerState());
	}

	public function	testCanChangeTheRadioChannel()
	{
		$remote = new Remote(new Radio());
		$remote->nextChannel();
		$remote->nextChannel();
		$remote->nextChannel();

		$this->assertSame(3, $remote->getChannel());
	}


	public function	testCanChangeTheRadioVolume()
	{
		$remote = new Remote(new Radio());
		for ($i = 0; $i < 50; $i++)
			$remote->volumeUp();

		$this->assertSame(50, $remote->getVolume());
	}
}
