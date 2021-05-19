<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Clasa concreta care implementeaza interfata Chair.
 */
class VictorianChair implements Chair
{
	public function sit()
	{
		echo "Sitting on a Victorian era style Chair!";
	}
}
