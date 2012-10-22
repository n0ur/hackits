<?php
    $msg = !$loggedin ? $notloggedintext : '';
    return array(
        'nav' => array(
            'default' => array(
                'chapter1' => 'DHCP',
				'chapter2' => 'Firewalling',
            ),
            'exercises' => array(
                'exercise1' => 'Exercise 1',
            ),
            'exam' => array(
                'exam1' => 'Exam',
            )
        ),
        'content' => array(
            'default' => array(
                'index' => <<<°
                    <h1>Welcome to Practical Networks!</h1>
                    <p>This course's objective is to help you managing your home network with the standard unix tools.</p>
                    <p>While I will skip the technical details and strip these guides to the essential, some understanding of the underlying protocols will greatly help you though.</p><br />
                    <p>In this course, we will be considering working on the following example network</p>
                    <img alt="example network 1" src="images/example_network.png" />
                    <p>It is connected to the internet through a Modem. Most nowadays ADSL and cable modems have a dhcp server configured trough a limited "clicky friendly" web interface (I don't like this).  The box we will be configuring is the Router/Firewall (in the middle), it has 4 network interfaces:</p>
                    <p>eth0 - 192.168.1.2 - This interface receives it's IP by dhcp.</p>
                    <p>eth1 - 172.25.3.1 (statically declared) - Is our internal network.</p>
                    <p>eth2 - 10.192.168.1 (statically declared) - Is our wifi.</p>
                    <p>eth3 - 10.20.30.1 (statically declared) - Is a DMZ with a server accessible from the internet.</p><br />
                    <p>The first chapter will explain you how to set a DHCP server, shaping your networks in zones.</p>
                    <p>The second chapter will guide you trough the setup of the routing and filtering</p>
                    <p>The third and fourth chapters will help you setup NTP and DNS on your network</p>
                    <p class="center"><a href="#"> to chapter 1</a></p>
°
        ,
                'chapter1' => <<<°
                    <h1>Dynamic Host Configuration Protocol</h1>
                    <h2>Theory</h2><br />
                    <p>DHCP stands for Dynamic Host Configuration Protocol and is used for automated/centralized configuration of IP addresses.</p>
                    <p>This tutorial's objective is to cover the 1% of dhcp capabilities that is sufficient in 99% of it's uses, and to get your dhcp server running.</p>
                    <p>If you want a deeper understanding of DHCP, please consult <a href=http://tools.ietf.org/html/rfc2131>RFC2131</a></p><br />
                    <p>Basically, when you connect your computer to a network cable or a wifi network and things just work, it is thanks to DHCP, it gives your computer a free IP address in the right range, the submask, default gateway, DNS server it's supposed to use (and some other things too).</p>
                        <ul>
                            <li> You plug the cable in the computer </li>
                            <li> The DHCP client sends out a DHCPDISCOVER</li>
                            <li> The DHCP server receives it and sends a DHCPOFFER</li>
                            <li> The DHCP client confirms responding with a DHCPREQUEST</li>
                            <li> The DHCP server confirms with a DHCPACK to confirm the settings</li>
                            <li> Your computer now has an IP address, knows it's network submask and default gateway, as well as the DNS server it's supposed to use (and maybe some other things too).</li>
                            <li> When leaving the network, the DHCP client sends a DHCPRELEASE.</li>
                        </ul><br />
                    <h2>Practice</h2><br />
                    <h3>Client setup</h3>
                    <p>To configure the client in windows, set your interface on automatic configuration.</p>
                    <p>To configure the interface un *nix, use "dhclient [interface]" as root in a console.</p><br />
                    <p><strong>Now the interesting part: let's configure the server on a *nix.</strong></p><br />
                    <p>First install the dhcpd package - it's name varies according to distributions ("net-misc/dhcp" in gentoo, "dhcp" in redhat, "dhcp3-server" in debian, installed by default on OpenBSD, ...)</p>
                    <p>Then configure it : everything happens in the /etc/dhcpd.conf file</p><br />
                    <p class="code">#dhcpd.conf file - lines starting with # are comments.<br />
                    #enter your domain here - if you don't have one, you can use quite anything unreal, like "thisis.local"<br />
                    &nbsp;&nbsp;option  domain-name "hackits.be";<br />
                    #DNS server your clients should use by default (here google's)<br />
                    &nbsp;&nbsp;option  domain-name-servers 8.8.8.8;<br />
                    #options on the lease time<br />
                    &nbsp;&nbsp;default-lease-time 86000;<br />
                    &nbsp;&nbsp;max-lease-time 100000;<br />
                    #authoritative should be used on your networks primary dhcp.<br />
                    &nbsp;&nbsp;authoritative;<br /><br />
                    #now we go to subnet declarations - thes override global settings<br />
                    # dhcpd automaticaly uses the subnet on the appropriate interface: <br />
                    # eth1 has 172.25.3.1, thus dhcpd will automaticaly use this subnet on this interface<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;	subnet 172.25.3.0 netmask 255.255.255.0 {<br />
                    #the range defines a pool of random adresses, the computers defined lower should NOT be in the range!<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;		range 172.25.3.50 172.25.3.229;<br />
                    #custom domain for this zone, the computers will then be PC1.lan.hackits.be and so on.<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option domain-name "lan.hackits.be";<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option broadcast-address 172.25.3.255;<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option routers 172.25.3.1;<br />
                    #use a different name server for this zones.<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option  domain-name-servers 172.25.3.1;<br />

                    #now we bind some mac addresses to IP's, so that those computers always receive the same address.<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host PC1 {<br />
                    #to get the hardware ethernet, use "ifconfig" with *nix or "ipconfig /all" with windows (cmd).<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:11:22:33:44:55;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 172.25.3.2;<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />
            <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host PC2 {<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:22:33:44:55:66;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 172.25.3.3;<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />
            <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host Printer {<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:33:44:55:66:77;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 172.25.3.4;<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />
            <br />
            #and we close the subnet<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
            <br />
                    #our wifi and dmz networks are similar, but with less comments<br />
                    <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;subnet 10.192.168.0 netmask 255.255.255.0 {<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;range 10.192.168.50 10.192.168.254;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option domain-name "wifi.hackits.be";<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option broadcast-address 10.192.168.255;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option routers 10.192.168.1;<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
            <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;subnet 10.20.30.0 netmask 255.255.255.0 {<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;range 10.20.30.100 10.20.30.254;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option domain-name "dmz.hackits.be";<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option broadcast-address 10.20.30.255;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option routers 10.20.30.1;<br />
                    #Here you could also declare a tftp server.<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;option tftp-server-name "10.20.30.1";<br />
            <br />
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;host web1 {<br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware ethernet 00:11:55:77:99:BB;<br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fixed-address 10.20.30.40;<br />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                    </p><br />

                    <p>Once your configuration is done, save it as /etc/dhcpd.conf, restart dhcpd and things should be working :)</p>
                    <p>Carefull with the "{ }" and ";" If you miss one, dhcpd will not run!</p><br />
                    <p>It's nice to have zones... my next tutorial will explain how to enable networking between those zones.</p><br />
                    <p class="center"><a href="#">>> Next Chapter >></a></p>
°
            ,
                'chapter2' => <<<°
                    <h1>Firewalling</h1>
                    <h2>With Linux</h2>
                    <p>This course hasn't been written yet.</p>
                    <h2>With OpenBSD</h2>
                    <p>This course hasn't been written yet.</p>

°
                    ,
                ),
            'exercises' => array(
                'exercise1' => <<<°
                    <h3>Exercise 1:</h3>
                    <p>Nothingyet</p>
                    <div class="revealbutton" onClick="$('#answer1').show(); $('.revealbutton').hide(); ">Reveal Answer</div>
                    <div class="answer" id="answer1">
                        <p>Well done, you revealed the answer but there's no question yet :)</p>
                        <p>no exam yet... <a href="#">Click here</a> to check out the void!</p>
                    </div>

°
                ,
            ),
            'exam' => array(
                'exam1' => <<<°
                <h2>No Exam Time yet!</h2><br />
                <? if(!$loggedin) echo $notloggedintext; ?>
                <form id="examnform" name="examnform" method="post" action="">
                    <div class="question">
                        <h3>Question 1</h3><br />
                        <p>Nothing yet</p>
                        <input type="radio" value="A" id="radio1" name="1" /><label for="radio1">bla</label><br />
                        <input type="radio" value="B" id="radio2" name="1" /><label for="radio2">bla</label><br />
                        <input type="radio" value="C" id="radio3" name="1" /><label for="radio3">bla</label><br />
                    </div>
                </form>
°
            ),
        )
    );
