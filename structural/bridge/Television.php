<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Bridge;

/**
 * Aceasta este un element concret din ierarhia 'Implement'
 * care reprezinta un televizor.
 */
class Television implements Device
{
	protected string	$state = "off";
	protected int	$volume = 0;
	protected int	$totalChannels = 327;
	protected int	$channel = 0;

	public function	isEnabled(): bool
	{
		return ($this->state === "on") ? true : false;
	}

	public function	enable()
	{
		$this->state = "on";
	}

	public function	diable()
	{
		$this->state = "off";
	}

	public function	getVolume(): int
	{
		return $this->volume;
	}

	public function setVolume(int $percent)
	{
		if ($percent >= 0 && $percent <= 100)
			$this->volume = $percent;
	}

	public function getChannel(): int
	{
		return $this->channel;
	}

	public function setChannel(int $channel)
	{
		if ($channel >= 1 && $channel <= $this->totalChannels)
			$this->channel = $channel;
	}
}
