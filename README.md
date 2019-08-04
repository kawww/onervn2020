# onervn
Run a rvn node, you will have an asset faucet, a search engine, a qr generater and more things...

1.Run a rvn node.

https://github.com/RavenProject/Ravencoin/releases

2.Create raven.conf, set up rpc user, password and port.

cd /root/.raven

raven.conf

rpcuser=yourusername
rpcpassword=yourpassword
rpcport=8765

server=1
assetindex=1
addressindex=1
rpcallowip=127.0.0.1
whitelist=127.0.0.1

3.Install a webpanel like virtualmin.

https://www.virtualmin.com/download.html

4.Set Scheduled Cron Jobs, start ravend on boot.

webmin->system->Scheduled Cron Jobs

/root/raven-2.4.0.0/bin/ravend -daemon

5.Change rpc user, password and port in rpc.php.

6.Upload these php and html to public_html.

7.have fun!
