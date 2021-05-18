<?PHP declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod;

/**
 * This is a Creator.
 * It is supposed to return a Logger class.
 */
interface LoggerFactory
{
	public function	createLogger(): Logger;
}
