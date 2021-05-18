<?PHP
declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod;

/**
 * This is a Concrete Creator.
 * It is supposed to return a StdoutLogger class.
 */
class StdoutLoggerFactory implements LoggerFactory
{
	public function	createLogger()
	{
		return new StdoutLogger();
	}
}
