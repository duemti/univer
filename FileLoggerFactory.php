<?PHP
declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod;

/**
 * This is a Concrete Creator.
 * It is supposed to return a FileLogger class.
 */
class FileLoggerFactory implements LoggerFactory
{
	public function	__construct(private string $filePath)
	{
	}

	public function	createLogger()
	{
		return new FileLogger($this->filePath);
	}
}
