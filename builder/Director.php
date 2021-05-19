<?PHP declare(strict_types = 1);

namespace DesignPatterns\Builder;

/**
 * Director is part of the builder pattern. It knows the interface of the builder
 * and builds a complex object with the help of the builder
 *
 * You can also inject many builders instead of one to build more complex objects
 */
class Director
{
	public function	build(Builder $builder): Vehicle
	{
		$builder->createVehicle();
		$builder->addSeats();
		$builder->addWheels();
		$builder->addEngine();
		$builder->addDoors();

		return $builder->getVehicle();
	}
}
