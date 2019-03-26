<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\inventory;

use pocketmine\level\Position;
use pocketmine\level\sound\EnderChestCloseSound;
use pocketmine\level\sound\EnderChestOpenSound;
use pocketmine\level\sound\Sound;
use pocketmine\network\mcpe\protocol\types\WindowTypes;
use pocketmine\tile\EnderChest;

class EnderChestInventory extends ChestInventory{

	/** @var Position */
	protected $holder;

	public function __construct(){
		ContainerInventory::__construct(new Position(), 27);
	}

	public function getNetworkType() : int{
		return WindowTypes::CONTAINER;
	}

	/**
	 * Set the holder's position to that of a tile
	 *
	 * @param EnderChest $enderChest
	 */
	public function setHolderPosition(EnderChest $enderChest) : void{
		$this->holder->setComponents($enderChest->getFloorX(), $enderChest->getFloorY(), $enderChest->getFloorZ());
		$this->holder->setLevel($enderChest->getLevel());
	}

	protected function getOpenSound() : Sound{
		return new EnderChestOpenSound();
	}

	protected function getCloseSound() : Sound{
		return new EnderChestCloseSound();
	}

	/**
	 * This override is here for documentation and code completion purposes only.
	 * @return Position
	 */
	public function getHolder(){
		return $this->holder;
	}
}
