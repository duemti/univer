<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\State;

class DoneState implements State
{
	public function	proceedToNext(OrderContext $context)
	{
		// nothing more to do.
	}

	public function	toString(): string
	{
		return 'done';
	}
}

