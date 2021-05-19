<?PHP declare(strict_types = 1);

namespace DesignPatterns\Builder;

use DesignPatterns\Builder\Parts\Car;
use DesignPatterns\Builder\Parts\Door;
use DesignPatterns\Builder\Parts\Seats;
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
		$this->setPart('driverSeat', new Seat());
		$this->setPart('passengerSeat', new Seat());
		$this->setPart('backseat1', new Seat());
		$this->setPart('backseat2', new Seat());
		$this->setPart('backseat3', new Seat());
	}

	public function	addWheels()
	{
		$this->setPart('wheel1', new Wheel());
		$this->setPart('wheel2', new Wheel());
		$this->setPart('wheel3', new Wheel());
		$this->setPart('wheel4', new Wheel());
	}

	public function	addEngine()
	{
		$this->setPart('engine', new Engine());
	}

	public function	addDoors()
	{
		$this->setPart('leftFrontDoor', new Door());
		$this->setPart('leftBackDoor', new Door());
		$this->setPart('rightFrontDoor', new Door());
		$this->setPart('rightBackDoor', new Door());
		$this->setPart('trunkLid', new Door());
	}

	public function	getVehicle(): Vehicle
	{
		return $this->car;
	}
}
