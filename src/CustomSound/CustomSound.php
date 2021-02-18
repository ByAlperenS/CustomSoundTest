<?php

namespace CustomSound;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class CustomSound extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("Plugin Enable - ByAlperenS");
        $this->getLogger()->info("https://github.com/ByAlperenS");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if ($sender instanceof Player){
            if ($command->getName() == "customsoundtest"){
                $packet = new PlaySoundPacket();
                $packet->soundName = "custom.sound.cave";
                $packet->x = $sender->getX();
                $packet->y = $sender->getY();
                $packet->z = $sender->getZ();
                $packet->volume = 1;
                $packet->pitch = 1;
                $sender->sendDataPacket($packet);
                $sender->sendTip(C::DARK_GREEN . "Sound plays successfully!");
            }
        }else{
            return false;
        }
        return true;
    }
}
