<?PHP declare(strict_types = 1);

namespace DesignPatterns\Builder;

use DesignPatterns\Builder\Parts\Truck;
use DesignPatterns\Builder\Parts\Door;
use DesignPatterns\Builder\Parts\Seats;
use DesignPatterns\Builder\Parts\Wheel;
use DesignPatterns\Builder\Parts\Engine;

/**
 * Builds a Truck object.
 */
class TruckBuilder implements Builder
{
	private Truck $truck;

	public function	createVehicle()
	{
		$this->truck = new Truck();
	}

	public function	addSeats()
	{
		$this->setPart('driverSeat', new Seat());
		$this->setPart('passengerSeat', new Seat());
	}

	public function	addWheels()
	{
		$this->setPart('wheel1', new Wheel());
		$this->setPart('wheel2', new Wheel());
		$this->setPart('wheel3', new Wheel());
		$this->setPart('wheel4', new Wheel());
		$this->setPart('wheel5', new Wheel());
		$this->setPart('wheel6', new Wheel());
	}

	public function	addEngine()
	{
		$this->setPart('engine', new Engine());
	}

	public function	addDoors()
	{
		$this->setPart('leftDoor', new Door());
		$this->setPart('rightDoor', new Door());
	}

	public function	getVehicle(): Vehicle
	{
		return $this->truck;
	}
}
