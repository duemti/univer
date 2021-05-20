<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * All Concrete Handlers either handle a request 
 * or pass it to the next handler in the chain.
 */
class TeaHandler extends AbstractHandler
{
	public function	handle(string $request): ?string
	{
		if ($request === "Tea")
		{
			return "Tea: The tea is in the making!\n";
		} else {
			return parent::handle($request);
		}
	}
}
