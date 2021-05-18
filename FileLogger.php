<?PHP declare(strict_types = 1);

namespace DesignPatterns\FactoryMethod;

/**
 * This is a concrete product.
 */
class FileLogger implements Logger
{
	private $filePath;

	public function	__constructor(string $filePath)
	{
		$this->filePath = $filePath;
	}

	public function	log(string $message)
	{
		file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
	}
}
