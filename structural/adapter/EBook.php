<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Adapter;

interface EBook
{
	public function	unlock();

	public function	pressNext();

	/**
	 * returns current page and the total number of pages
	 * like [10, 100] is page 10 of 100.
	 */
	public function	getPage(): array;
}
