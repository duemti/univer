<?PHP declare(strict_types = 1);

namespace DesignPatterns\Builder;

use DesignPatterns\Builder\Parts\Vehicle;

/**
 * Builder interface.
 * declares instruction steps.
 */
interface Builder
{
	public function	createVehicle();

	public function	addSeats();

	public function	addWheels();

	public function	addEngine();

	public function	addDoors();

	public function	getVehicle(): Vehicle;
}
