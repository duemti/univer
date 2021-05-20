<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * All Concrete Handlers either handle a request 
 * or pass it to the next handler in the chain.
 */
class WaterHandler extends AbstractHandler
{
	public function	handle(string $request): ?string
	{
		if ($request === "Water")
		{
			return "Water: Only water? Ok then.\n";
		} else {
			return parent::handle($request);
		}
	}
}
