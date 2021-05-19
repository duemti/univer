<?PHP declare(strict_types = 1);

namespace DesignPatterns\AbstractFactory;

/**
 * Interfata Table pentru crearea claselor de Table
 */
interface Table
{
	public function putOn(string $thing);
}
