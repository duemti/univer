<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Bridge;

/**
 * Aceasta este ierarhia 'Abstract'
 * care reprezinta telecomanda pentru a interactiona cu dispozitive.
 */
class Remote
{
	protected Device	$device;

	public function	__construct(Device $device)
	{
		$this->device = $device;
	}

	public function	togglePower()
	{
		if ($this->device->isEnabled())
		{
			$this->device->disable();
		} else {
			$this->device->enable();
		}
	}

	public function	powerState(): bool
	{
		return $this->device->isEnabled();
	}

	public function	volumeDown()
	{
		$vol = $this->device->getVolume() - 1;

		$this->device->setVolume($vol);
	}

	public function	volumeUp()
	{
		$vol = $this->device->getVolume() + 1;

		$this->device->setVolume($vol);
	}

	public function	getVolume(): int
	{
		return $this->device->getVolume();
	}

	public function	getChannel(): int
	{
		return $this->device->getChannel();
	}

	public function	nextChannel()
	{
		$ch = $this->device->getChannel() + 1;

		$this->device->setChannel($ch);
	}

	public function	prevChannel()
	{
		$ch = $this->device->getChannel() - 1;

		$this->device->setChannel($ch);
	}
}
