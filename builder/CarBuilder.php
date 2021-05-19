<?PHP declare(strict_types = 1);

namespace DesignPatterns\Builder;

use DesignPatterns\Builder\Parts\Vehicle;
use DesignPatterns\Builder\Parts\Car;

use DesignPatterns\Builder\Parts\Door;
use DesignPatterns\Builder\Parts\Seat;
use DesignPatterns\Builder\Parts\Wheel;
use DesignPatterns\Builder\Parts\Engine;

/**
 * Builds a Car object.
 */
class CarBuilder implements Builder
{
	private Car $car;

	public function	createVehicle()
	{
		$this->car = new Car();
	}

	public function	addSeats()
	{
		$this->car->setPart('driverSeat', new Seat());
		$this->car->setPart('passengerSeat', new Seat());
		$this->car->setPart('backseat1', new Seat());
		$this->car->setPart('backseat2', new Seat());
		$this->car->setPart('backseat3', new Seat());
	}

	public function	addWheels()
	{
		$this->car->setPart('wheel1', new Wheel());
		$this->car->setPart('wheel2', new Wheel());
		$this->car->setPart('wheel3', new Wheel());
		$this->car->setPart('wheel4', new Wheel());
	}

	public function	addEngine()
	{
		$this->car->setPart('engine', new Engine());
	}

	public function	addDoors()
	{
		$this->car->setPart('leftFrontDoor', new Door());
		$this->car->setPart('leftBackDoor', new Door());
		$this->car->setPart('rightFrontDoor', new Door());
		$this->car->setPart('rightBackDoor', new Door());
		$this->car->setPart('trunkLid', new Door());
	}

	public function	getVehicle(): Vehicle
	{
		return $this->car;
	}
}
