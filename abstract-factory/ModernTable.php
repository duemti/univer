<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Clasa concreta de crearea a meselor
 */
class ModernTable implements Table
{
	public function putOn(string $thing)
	{
		echo "You have put $thing on the Modern Table!";
	}
}
