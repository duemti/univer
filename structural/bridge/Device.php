<?PHP declare(strict_types = 1);

namespace DesignPatterns\Structural\Bridge;

/**
 * Aceasta este ierarhia 'Implement'
 * care reprezinta dispozitive, precum tv, radio, ..
 */
interface Device
{
	public function	isEnabled(): bool;

	public function	enable();

	public function	diable();

	public function	getVolume(): int;

	public function setVolume(int $percent);

	public function getChannel(): int;

	public function setChannel(int $channel);
}
