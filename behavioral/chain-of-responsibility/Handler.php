<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * Handler
 */
interface Handler
{
	public function	setNext(Handler $handler): Handler;

	public function	handle(string $request): ?string;
}
