<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * Abstract Handler, the base handler.
 */
abstract class AbstractHandler implements Handler
{
	private Handler	$nextHandler;

	public function	setNext(Handler $handler): Handler
	{
		$this->nextHandler = $handler;
		// Returning a handler from here will let us link handlers in a
        // convenient way like this:
        // $object->setNext($param1)->setNext($param2);
		return $handler;
	}

	public function	handle(string $request): ?string
	{
		if (isset($this->nextHandler))
		{
			return $this->nextHandler->handle($request);
		}

		return null;
	}
}
