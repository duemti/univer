<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\Strategy;

/**
 * The context defines the interface of interest to clients.
 */
class Context
{
	private Comparator	$comparator;

	public function	__construct(Comparator $comparator)
	{
		$this->comparator = $comparator;
	}

	public function	executeStrategy(array $elements): array
	{
		uasort($elements, [$this->comparator, 'compare']);

		return $elements;
	}
}
