<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory\Tests;
require __DIR__ . '/../vendor/autoload.php';

use DesignPatterns\AbstractFactory\FurnitureFactory;

use DesignPatterns\AbstractFactory\VictorianFurnitureFactory;
use DesignPatterns\AbstractFactory\VictorianChair;
use DesignPatterns\AbstractFactory\VictorianTable;
use DesignPatterns\AbstractFactory\VictorianSofa;

use DesignPatterns\AbstractFactory\ModernFurnitureFactory;
use DesignPatterns\AbstractFactory\ModernChair;
use DesignPatterns\AbstractFactory\ModernTable;
use DesignPatterns\AbstractFactory\ModernSofa;

use DesignPatterns\AbstractFactory\ClassicFurnitureFactory;
use DesignPatterns\AbstractFactory\ClassicChair;
use DesignPatterns\AbstractFactory\ClassicTable;
use DesignPatterns\AbstractFactory\ClassicSofa;


$factories = array(
	VictorianFurnitureFactory::class,
	ModernFurnitureFactory::class,
	ClassicFurnitureFactory::class
);

foreach ($factories as $type)
{
	$factory = new $type;
	test($factory);
}
/**
 * We use the abstract interface to get get
 * different concrete objects.
 */
function	test(FurnitureFactory $factory)
{
	echo "Received a new object of type FurnitureFactory.\n\tTesting...\n";
	$chair = $factory->createChair();
	$chair->sit();
	echo PHP_EOL;

	$table = $factory->createTable();
	$table->putOn("Glass");
	echo PHP_EOL;

	$sofa = $factory->createSofa();
	$sofa->lieDown();
	echo PHP_EOL, PHP_EOL;
}
