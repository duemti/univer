<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\Strategy;

use DateTime;

/**
 * Concrete Strategies implement the algorithm while following the base Strategy
 * interface. The interface makes them interchangeable in the Context.
 */
class IdComparator implements Comparator
{
	/**
	 * @param mixed $a
	 * @param mixed $b
	 */
	public function	compare($a, $b): int
	{
		return $a['id'] <=> $b['id'];
	}
}
