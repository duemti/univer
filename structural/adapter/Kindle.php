<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Adapter;

/**
 * This is the adapted class. In production code,
 * this could be a class from another package,
 * some vendor code.
 * Notice that it uses another naming scheme and
 * the implementation does something similar but in another way.
 */
class Kindle implements EBook
{
	private int $page = 1;
	private int $totalPages = 100;

	public function	unlock()
	{
	}

	public function	pressNext()
	{
		$this->page++;
	}

	/**
	 * returns current page and the total number of pages
	 * like [10, 100] is page 10 of 100.
	 */
	public function	getPage(): array
	{
		return [
			$this->page,
			$this->totalPages
		];
	}
}
