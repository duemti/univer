<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Clasa concreta Sofa
 */
class VictorianSofa implements Sofa
{
	public function lieDown()
	{
		echo "You lied down a the Victorian era Sofa.";
	}
}
