<?PHP declare(strict_types = 1);

namespace DesignPatterns\Builder;

use DesignPatterns\Builder\Parts\Truck;
use DesignPatterns\Builder\Parts\Vehicle;

use DesignPatterns\Builder\Parts\Door;
use DesignPatterns\Builder\Parts\Seat;
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
		$this->truck->setPart('driverSeat', new Seat());
		$this->truck->setPart('passengerSeat', new Seat());
	}

	public function	addWheels()
	{
		$this->truck->setPart('wheel1', new Wheel());
		$this->truck->setPart('wheel2', new Wheel());
		$this->truck->setPart('wheel3', new Wheel());
		$this->truck->setPart('wheel4', new Wheel());
		$this->truck->setPart('wheel5', new Wheel());
		$this->truck->setPart('wheel6', new Wheel());
	}

	public function	addEngine()
	{
		$this->truck->setPart('engine', new Engine());
	}

	public function	addDoors()
	{
		$this->truck->setPart('leftDoor', new Door());
		$this->truck->setPart('rightDoor', new Door());
	}

	public function	getVehicle(): Vehicle
	{
		return $this->truck;
	}
}
