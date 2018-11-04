<?php

namespace console;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;
use console\Main;




class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getServer()->getLogger()->info("§7==========================");
		$this->getServer()->getLogger()->info("§9> §aConsole Command §8[§aLoading§8]");
		$this->getServer()->getLogger()->info("§7==========================");
	}
	
	public function onDisable(){
		$this->getServer()->getLogger()->info("§7==========================");
		$this->getServer()->getLogger()->info("§9> §cConsole Command §8[§cDisabled§8]");
		$this->getServer()->getLogger()->info("§7==========================");
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) : bool{
		if($command->getName() == "console"){
			if($sender->hasPermission("console.command")){
				if(isset($args[0])){
					$comm = implode(" ",$args);
					$this->getServer()->dispatchCommand(new ConsoleCommandSender,$comm);
					$sender->sendMessage("§aYou use command: §6$comm");
					return true;
				}else{
					$sender->sendMessage("§cUse: /console <message>");
					return true;
				}
			}else{
				$sender->sendMessage("§cYou don't have permission :P !");
				return true;
			}
		}
	}
	
	
	
}

