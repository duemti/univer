<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Clasa concreta care implementeaza interfata Chair.
 */
class ClassicChair implements Chair
{
	public function sit()
	{
		echo "Sitting on a comfy Classic Chair!";
	}
}
