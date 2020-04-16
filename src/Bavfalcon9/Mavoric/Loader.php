<?php
/***
 *      __  __                       _      
 *     |  \/  |                     (_)     
 *     | \  / | __ ___   _____  _ __ _  ___ 
 *     | |\/| |/ _` \ \ / / _ \| '__| |/ __|
 *     | |  | | (_| |\ V / (_) | |  | | (__ 
 *     |_|  |_|\__,_| \_/ \___/|_|  |_|\___|
 *                                          
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Lesser General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 * 
 *  @author Bavfalcon9
 *  @link https://github.com/Olybear9/Mavoric                                  
 */

namespace Bavfalcon9\Mavoric;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Living;

class Loader extends PluginBase {
    /** @var Mavoric */
    private $mavoric;

    public function onEnable(): void {
        $this->mavoric = new Mavoric($this);
    }

    public function onDisable(): void {
        $this->mavoric->disable();
    }

    public function getMavoric(): Mavoric {
        return $this->mavoric;
    }
}