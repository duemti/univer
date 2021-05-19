<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Aceasta este o clasa concreta care implementeaza 
 * fabrica abstracta pentru crearea de obiecte concrete.
 */
class VictorianFurnitureFactory implements FurnitureFactory
{
	public function	createChair(): Chair
	{
		return new VictorianChair();
	}

	public function	createTable(): Table
	{
		return new VictorianTable();
	}

	public function	createSofa(): Sofa
	{
		return new VictorianSofa();
	}
}
