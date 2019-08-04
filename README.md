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

You can use every command (raven-cli help) to operate ravend with this php.

== Addressindex ==

getaddressbalance

getaddressdeltas

getaddressmempool

getaddresstxids

getaddressutxos


== Assets ==
getassetdata "asset_name"

getcacheinfo 

issue "asset_name" qty "( to_address )" "( change_address )" ( units ) ( reissuable ) ( has_ipfs ) "( ipfs_hash )"

issueunique "root_name" [asset_tags] ( [ipfs_hashes] ) "( to_address )" "( change_address )"

listassets "( asset )" ( verbose ) ( count ) ( start )

listmyassets "( asset )" ( verbose ) ( count ) ( start ) (confs) 

reissue "asset_name" qty "to_address" "change_address" ( reissuable ) ( new_unit) "( new_ipfs )" 

transfer "asset_name" qty "to_address" "message" expire_time "change_address"

transferfromaddress "asset_name" "from_address" qty "to_address" "message" expire_time

transferfromaddresses "asset_name" ["from_addresses"] qty "to_address" "message" expire_time


== Blockchain ==

getbestblockhash

getblock "blockhash" ( verbosity ) 

getblockchaininfo

getblockcount

getblockhash height

getblockhashes timestamp

getblockheader "hash" ( verbose )

getchaintips

getchaintxstats ( nblocks blockhash )

getdifficulty

getmempoolancestors txid (verbose)

getmempooldescendants txid (verbose)

getmempoolentry txid

getmempoolinfo

getrawmempool ( verbose )

getspentinfo

gettxout "txid" n ( include_mempool )

gettxoutproof ["txid",...] ( blockhash )

gettxoutsetinfo

preciousblock "blockhash"

pruneblockchain

savemempool

verifychain ( checklevel nblocks )

verifytxoutproof "proof"

== Control ==

getinfo

getmemoryinfo ("mode")

help ( "command" )

stop

uptime


== Generating ==

generate nblocks ( maxtries )

generatetoaddress nblocks address (maxtries)

getgenerate

setgenerate generate ( genproclimit )


== Messages ==

clearmessages 

sendmessage "channel_name" "ipfs_hash" (expire_time)

subscribetochannel 

unsubscribefromchannel 

viewallmessagechannels 

viewallmessages 

== Mining ==

getblocktemplate ( TemplateRequest )

getmininginfo

getnetworkhashps ( nblocks height )

prioritisetransaction <txid> <dummy value> <fee delta>
  
submitblock "hexdata"  ( "dummy" )


== Network ==

addnode "node" "add|remove|onetry"

clearbanned

disconnectnode "[address]" [nodeid]

getaddednodeinfo ( "node" )

getconnectioncount

getnettotals

getnetworkinfo

getpeerinfo

listbanned

ping

setban "subnet" "add|remove" (bantime) (absolute)

setnetworkactive true|false


== Rawtransactions ==

combinerawtransaction ["hexstring",...]

createrawtransaction [{"txid":"id","vout":n},...] {"address":(amount or object),"data":"hex",...} ( locktime ) ( replaceable )

decoderawtransaction "hexstring"

decodescript "hexstring"

fundrawtransaction "hexstring" ( options )

getrawtransaction "txid" ( verbose )

sendrawtransaction "hexstring" ( allowhighfees )

signrawtransaction "hexstring" ( [{"txid":"id","vout":n,"scriptPubKey":"hex","redeemScript":"hex"},...] ["privatekey1",...] sighashtype )


== Restricted assets ==

addtagtoaddress tag_name to_address (change_address)

checkaddressrestriction address restricted_name

checkaddresstag address tag_name

checkglobalrestriction restricted_name

freezeaddress asset_name address (change_address)

freezerestrictedasset asset_name (change_address)

getverifierstring restricted_name

issuerestrictedasset "asset_name" qty "verifier" "to_address" "( change_address )" (units) ( reissuable ) ( has_ipfs ) "( ipfs_hash )"

isvalidverifierstring verifier_string

listaddressesfortag tag_name

listaddressrestrictions address

listglobalrestrictions

listtagsforaddress address

reissuerestrictedasset "asset_name" qty to_address ( change_verifier ) ( "new_verifier" ) "( to_address )" "( change_address )" ( new_unit ) ( reissuable ) "( ipfs_hash )"

removetagfromaddress tag_name to_address (change_address)

transferqualifier "qualifier_name" qty "to_address" ("change_address") ("message") (expire_time) 

unfreezeaddress asset_name address (change_address)

unfreezerestrictedasset asset_name (change_address)


== Util ==

createmultisig nrequired ["key",...]

estimatefee nblocks

estimatesmartfee conf_target ("estimate_mode")

signmessagewithprivkey "privkey" "message"

validateaddress "address"

verifymessage "address" "signature" "message"


== Wallet ==

abandontransaction "txid"

abortrescan

addmultisigaddress nrequired ["key",...] ( "account" )

addwitnessaddress "address"

backupwallet "destination"

bumpfee has been deprecated on the RVN Wallet.

dumpprivkey "address"

dumpwallet "filename"

encryptwallet "passphrase"

getaccount "address"

getaccountaddress "account"

getaddressesbyaccount "account"

getbalance ( "account" minconf include_watchonly )

getnewaddress ( "account" )

getrawchangeaddress

getreceivedbyaccount "account" ( minconf )

getreceivedbyaddress "address" ( minconf )

gettransaction "txid" ( include_watchonly )

getunconfirmedbalance

getwalletinfo

importaddress "address" ( "label" rescan p2sh )

importmulti "requests" ( "options" )

importprivkey "privkey" ( "label" ) ( rescan )

importprunedfunds

importpubkey "pubkey" ( "label" rescan )

importwallet "filename"

keypoolrefill ( newsize )

listaccounts ( minconf include_watchonly)

listaddressgroupings

listlockunspent

listreceivedbyaccount ( minconf include_empty include_watchonly)

listreceivedbyaddress ( minconf include_empty include_watchonly)

listsinceblock ( "blockhash" target_confirmations include_watchonly include_removed )

listtransactions ( "account" count skip include_watchonly)

listunspent ( minconf maxconf  ["addresses",...] [include_unsafe] [query_options])

listwallets

lockunspent unlock ([{"txid":"txid","vout":n},...])

move "fromaccount" "toaccount" amount ( minconf "comment" )

removeprunedfunds "txid"

rescanblockchain ("start_height") ("stop_height")

sendfrom "fromaccount" "toaddress" amount ( minconf "comment" "comment_to" )

sendmany "fromaccount" {"address":amount,...} ( minconf "comment" ["address",...] replaceable conf_target "estimate_mode")

sendtoaddress "address" amount ( "comment" "comment_to" subtractfeefromamount replaceable conf_target "estimate_mode")

setaccount "address" "account"

settxfee amount

signmessage "address" "message"
