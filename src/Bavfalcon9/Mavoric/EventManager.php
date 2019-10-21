<?php
/***
 *      __  __                       _      
 *     |  \/  |                     (_)     
 *     | \  / | __ ___   _____  _ __ _  ___ 
 *     | |\/| |/ _` \ \ / / _ \| '__| |/ __|
 *     | |  | | (_| |\ V / (_) | |  | | (__ 
 *     |_|  |_|\__,_| \_/ \___/|_|  |_|\___|
 *                                          
 *   THIS CODE IS TO NOT BE REDISTRUBUTED
 *   @author MavoricAC
 *   @copyright Everything is copyrighted to their respective owners.
 *   @link https://github.com/Olybear9/Mavoric                                  
 */

namespace Bavfalcon9\Mavoric;

use Bavfalcon9\Mavoric\Main;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\HandlerList;
use pocketmine\event\player\{
    PlayerCommandPreprocessEvent,
    PlayerQuitEvent,
    PlayerJoinEvent,
    PlayerPreLoginEvent
};
use pocketmine\{
    Player,
    Server
};

/* Npc Detection */
use Bavfalcon9\entity\SpecterPlayer;
use pocketmine\event\player\cheat\PlayerIllegalMoveEvent;

class EventManager implements Listener {
    private $plugin;
    private $already = false;
    
    public function __construct(Main $pl) {
        $this->plugin = $pl;
    }

    /* NPC */
    public function onIllegalMove(PlayerIllegalMoveEvent $event){
        if($event->getPlayer() instanceof SpecterPlayer){
            $event->setCancelled();
        }
    }

    public function onQuit(PlayerQuitEvent $event) {
        if($event->getPlayer() instanceof SpecterPlayer){
            $event->setMessage(' ');
            $event->getPlayer()->setOp(false);
        }
    }
    public function onJoin(PlayerJoinEvent $event) {
        if($event->getPlayer() instanceof SpecterPlayer){
            $event->setMessage(' ');
            $event->getPlayer()->setOp(true);
        }
    }

    public function onBan(Player $p, String $reason) {
        
    }
/*
    public function onJoin(PlayerPreLoginEvent $event) {
        $player = $event->getPlayer();
        $bans = $this->plugin->getServer()->getNameBans();
        if ($bans->isBanned($player->getName())) {
            $entry = $bans->getEntry($player->getName());
            if ($entry->getSource() !== 'Mavoric') {
                $player->close('', '§f§l> §r§cModerator: §b'.$entry->getSource()."\n§r§f§l> §r§cReason: §b".$entry->getReason()."\n §f§l>§r§cAppeal: §blink here");
                $event->setCancelled(true);
                return;
            } else {
                
                $reason = str_replace('§4§lMavoric§r §f§l> §r§b', '', $entry->getReason());
                $player->close('', "§c Mavoric - Cheat Violation\n"."§f§l> §r§cViolation(s): §b".$reason);
                $event->setCancelled(true);
            }
        }
        return;
    }*/
}