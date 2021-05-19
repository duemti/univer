<?PHP declare(strict_types = 1);

namespace DesignPatterns\Builder\Tests;
require __DIR__ . '/../vendor/autoload.php';

use DesignPatterns\Builder\Director;
use DesignPatterns\Builder\CarBuilder;
use DesignPatterns\Builder\TruckBuilder;
use DesignPatterns\Builder\Parts\Car;
use DesignPatterns\Builder\Parts\Truck;

$director = new Director();
$carBuilder = new CarBuilder();
$truckBuilder = new TruckBuilder();

$car = $director->build($carBuilder);
$truck = $director->build($truckBuilder);

if ($car instanceof Car)
	echo "Success! Created a new complex object Car using CarBuilder with Director.\n";
else
	echo "error.\n";

if ($truck instanceof Truck)
	echo "Success! Created a new complex object Truck using TruckBuilder with Director.\n";
else
	echo "error.\n";
