<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Clasa concreta Sofa
 */
class ClassicSofa implements Sofa
{
	public function lieDown()
	{
		echo "Classic Sofa for the win!";
	}
}
