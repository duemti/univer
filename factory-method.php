<?PHP
/**
 * Design Patterns: Factory Method
 *
 * by: Petrov Dumitru
 */
declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod;

/**
 * The product interface.
 * Must declare all operations done by concrete products.
 */
interface Logger
{
	public function	log(string $message);
}
