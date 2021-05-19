<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Aceasta este interfata fabricii abstracte
 * care declara un set de metode diferite pentru crearea obiectelor speficice
 * ce vor fi implementate de fabricile concrete.
 */
interface FurnitureFactory
{
	public function	createChair(): Chair;
	public function	createTable(): Table;
	public function	createSofa(): Sofa;
}
