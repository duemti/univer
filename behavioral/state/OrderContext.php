<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\State;

use DesignPatterns\Behavioral\State\CreatedState;

class OrderContext
{
	private State	$state;

	public static function	create(): OrderContext
	{
		$order = new Self();
		$order->state = new CreatedState();

		return $order;
	}

	public function	setState(State $state)
	{
		$this->state = $state;
	}

	public function	proceedToNext()
	{
		$this->state->proceedToNext($this);
	}

	public function	toString()
	{
		return $this->state->toString();
	}
}
