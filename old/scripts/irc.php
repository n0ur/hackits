<?
///////////////////////////////////////////////////////////////////////////////////
// 888    888        d8888  .d8888b.  888    d8P  8888888 88888888888 .d8888b.   //
// 888    888       d88888 d88P  Y88b 888   d8P     888       888    d88P  Y88b  //
// 888    888      d88P888 888    888 888  d8P      888       888    Y88b.       //
// 8888888888     d88P 888 888        888d88K       888       888     "Y888b.    //
// 888    888    d88P  888 888        8888888b      888       888        "Y88b.  //
// 888    888   d88P   888 888    888 888  Y88b     888       888          "888  //
// 888    888  d8888888888 Y88b  d88P 888   Y88b    888       888    Y88b  d88P  //
// 888    888 d88P     888  "Y8888P"  888    Y88b 8888888     888     "Y8888P"   //
///////////////////////////////////////////////////////////////////////////////////
//                                                                               //
// File:        scripts/irc.php                                                  //
// Version:     0.1                                                              //
// Date:        13-10-2012                                                       //
// Author(s):   Sling                                                            //
//                                                                               //
// Description: IRC bot for in #hackits.be                                       //
//              For now, only logs to a logfile thats used on the frontpage      //
//                                                                               //
///////////////////////////////////////////////////////////////////////////////////

require_once 'settings.php';

set_time_limit(0);

$server_host 	= "irc.quakenet.org";
$server_port 	= "6667";
$server_channel = "#hackits.de";
$nickname 		= "hackitsbot";
$logfile 		= DOC_ROOT."/frontpage/logfile";
$controlchar	= "!";

$server['SOCKET'] = fsockopen($server_host, $server_port, $errno, $errstr, 2);
echo "Socket opened...\n";

if($server['SOCKET'])
{
	sendCommand("PASS NOPASS\n\r");
	sendCommand("NICK $nickname\n\r");
	sendCommand("USER $nickname USING PHP IRC\n\r");

	while(!feof($server['SOCKET']))
	{
		$server['READ_BUFFER'] = fgets($server['SOCKET'], 1024);

		if(strpos($server['READ_BUFFER'], "376") && !strpos($server['READ_BUFFER'],"PRIVMSG"))
		{
			sendCommand("JOIN $server_channel\n\r");
		}
		elseif(substr($server['READ_BUFFER'], 0, 6) == "PING :")
		{
			sendCommand("PONG :".substr($server['READ_BUFFER'], 6)."\n\r");
		}
		else
		{
			echo $server['READ_BUFFER'];
			if(strpos($server['READ_BUFFER'], "PRIVMSG $server_channel"))
				{
					file_put_contents($logfile,date("H:i:s").$server['READ_BUFFER'],FILE_APPEND);
					$nick = substr($server['READ_BUFFER'],1,strpos($server['READ_BUFFER'],"!")-1);
					$message = substr($server['READ_BUFFER'],strpos($server['READ_BUFFER'],"PRIVMSG $server_channel")+strlen($server_channel)+10,strlen($server['READ_BUFFER']));
					if(substr($message,0,1)==$controlchar) handleCommand($nick,$message,$server_channel);
				}
		}
		flush();
	}
	echo "Socket closed\n";
}
else
{
	echo $errno." : ".$errstr;
}

function sendCommand($cmd)
{
	global $server;
	fwrite($server['SOCKET'], $cmd, strlen($cmd));
}

function handleCommand($nick,$message,$channel)
{
	$messageparts = explode(' ', $message);
	$command = trim(substr($messageparts['0'],1,strlen($messageparts['0'])));
	echo "Command received: $command\n";
	switch($command)
	{
	case "test":
		echo "Sending test response!\n";
		sendCommand("PRIVMSG $channel :Your connection is working, $nick!\n\r");
		break;
	default:
		echo "I don't know this command...\n";
		sendCommand("PRIVMSG $channel :Unknown command!\n\r");
		break;
	}
}
?>
