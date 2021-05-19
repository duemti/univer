<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Clasa concreta care implementeaza interfata Chair.
 */
class ModernChair implements Chair
{
	public function sit()
	{
		echo "Sitting on a Modern Chair!";
	}
}
