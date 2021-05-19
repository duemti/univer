<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Adapter;

use DesignPatterns\Structural\Adapter\EBook;

/**
 * Aceasta clasa este Adapter.
 * Implementez interfata Book, de aceea nu va trebiu
 * de modificat codul clientului care este in Book.
 */
class EBookAdapter implements Book
{
	protected EBook $eBook;

	public function	__construct(EBook $eBook)
	{
		$this->eBook = $eBook;
	}

	public function	open()
	{
		$this->eBook->unlock();
	}

	public function	turnPage()
	{
		$this->eBook->pressNext();
	}

	public function	getPage(): int
	{
		// Intoarcem primul element care
		// reprezinta nr paginii.
		return $this->eBook->getPage()[0];
	}
}
