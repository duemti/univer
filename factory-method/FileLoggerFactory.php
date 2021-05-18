<?PHP declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod;

/**
 * This is a Concrete Creator.
 * It is supposed to return a FileLogger class.
 */
class FileLoggerFactory implements LoggerFactory
{
	private $filePath;

	public function	__construct(string $filePath)
	{
		$this->filePath = $filePath;
	}

	public function	createLogger(): Logger
	{
		return new FileLogger($this->filePath);
	}
}
