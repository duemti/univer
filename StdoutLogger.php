<?PHP
declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod;

/**
 * This is a concrete product.
 */
class StdouLogger implements Logger
{
	public function	log(string $message)
	{
		echo $message;
	}
}
