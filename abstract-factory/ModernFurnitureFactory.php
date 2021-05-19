<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Aceasta este o clasa concreta care implementeaza 
 * fabrica abstracta pentru crearea de obiecte concrete.
 */
class ModernFurnitureFactory implements FurnitureFactory
{
	public function	createChair(): Chair
	{
		return new ModernChair();
	}

	public function	createTable(): Table
	{
		return new ModernTable();
	}

	public function	createSofa(): Sofa
	{
		return new ModernSofa();
	}
}