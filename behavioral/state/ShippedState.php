<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\State;

class ShippedState implements State
{
	public function	proceedToNext(OrderContext $context)
	{
		$context->setState(new DoneState());
	}

	public function	toString(): string
	{
		return 'shipped';
	}
}
