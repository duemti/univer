<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\State;

use DesignPatterns\Behavioral\State\OrderContext;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
	public function	testIsCreatedWithStateCreated()
	{
		$orderContext = OrderContext::create();

		$this->assertSame('created', $orderContext->toString());
	}

	public function	testCanProceedToStateShipped()
	{
		$orderContext = OrderContext::create();
		$orderContext->proceedToNext();

		$this->assertSame('shipped', $orderContext->toString());
	}

	public function	testCanProceedToStateDone()
	{
		$orderContext = OrderContext::create();
		$orderContext->proceedToNext();
		$orderContext->proceedToNext();

		$this->assertSame('done', $orderContext->toString());
	}

	public function	testTheStateDoneIsTheLastState()
	{
		$orderContext = OrderContext::create();
		$orderContext->proceedToNext();
		$orderContext->proceedToNext();
		$orderContext->proceedToNext();

		$this->assertSame('done', $orderContext->toString());
	}
}
