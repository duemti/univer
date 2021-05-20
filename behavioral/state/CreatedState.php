<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\State;

class CreatedState implements State
{
	public function	proceedToNext(OrderContext $context)
	{
		$context->setState(new ShippedState());
	}

	public function	toString(): string
	{
		return 'created';
	}
}
