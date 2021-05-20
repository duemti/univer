<?PHP declare(strict_types = 1);

namespace DesignPatterns\Behavioral\Strategy;

/**
 * The strategy interface declares operations common to all
 * supported versions of some algorithm. The context uses this
 * interface to call the algorithm defined by the concrete
 * strategies.
 */
interface Comparator
{
	/**
	 * @param mixed $a
	 * @param mixed $b
	 */
	public function	compare($a, $b): int;
}
