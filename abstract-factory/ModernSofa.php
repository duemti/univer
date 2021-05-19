<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Clasa concreta Sofa
 */
class ModernSofa implements Sofa
{
	public function lieDown()
	{
		echo "You lied down a the Modern Sofa.";
	}
}
