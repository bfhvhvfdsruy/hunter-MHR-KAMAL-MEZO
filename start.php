<?php
date_default_timezone_set('Africa/Cairo');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'] . $accounts[$screen]['sessionid'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 100;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$aol = 0;
$gmx = 0;
$protonmail = 0;
$MHR = 0;
$true = 0;
$false = 0;
$NotBussines = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"بدأ الفحص 
	فيك تروح وين ما بددك بس يصيد البوت بتجيك رساله ",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'🔍فحص: '.$i,'callback_data'=>'fgf']],
                [['text'=>'☢️يوزرات☢️: '.$user,'callback_data'=>'fgdfg']],
                [['text'=>'📧mail📧: '.$mail,'callback_data'=>'ghj']],
                [['text'=>"📮جيميل📮: $gmail",'callback_data'=>'dfgfd'],['text'=>"📮ياهو📮: $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'📮Ⓜ️ail📮: '.$mailru,'callback_data'=>'fgd'],['text'=>'📮هوتميل📮: '.$hotmail,'callback_data'=>'ghj']],
			    [['text'=>"📮AOL📮 : $aol",'callback_data'=>'fgjjjvf'],['text'=>"📮GⓂ️X📮 : $gmx",'callback_data'=>'gdfgfd']],
				[['text'=>"📮🅿️rotonmail📮 : $protonmail",'callback_data'=>'fgd'],['text'=>"📮Ⓜ️HR📮 : $MHR",'callback_data'=>'fgd']],
                [['text'=>'✅متاح: '.$true,'callback_data'=>'gj'],['text'=>'❌مش متاح: '.$false,'callback_data'=>'dghkf']],
                [['text'=>'❌مش تجاري: '.$NotBussines,'callback_data'=>'dgdge'],['text'=>'✅تجاري: '.$false,'callback_data'=>'dghkf']],
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false ) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(hotmail|outlook|yahoo|Yahoo|yAhoo|aol|aOl|Aol|gmX|gMx|Gmx|protonmail|mail)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(strpos($mail, 'aol')){
                                    $aol += 1;
                                } elseif(strpos($mail, 'gmx')){
                                    $gmx += 1;
								}  elseif(strpos($mail, 'protonmail')){
                                    $protonmail += 1;
								}  elseif(strpos($mail, 'mail')){
                                    $MHR += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => "⚠️🔰 🅰️ 🅱️ⓄⓉ ⒷⓎ Ⓜ️ⒽⓇ 🔰⚠️  \n------------𝑥---------------𝑥-----------\n 
.†.ⓊⓈⒺⓇ 🕸📮 : [$usern](instagram.com/$usern) 
.†.ⒺⓂ️ⒶⒾⓁ 🕸📮 : [$mail] 
.†.ⒻⓄⓁⓁⓄⓌⒺⓇⓈ ♻️✅ : $follow 
.†.ⒻⓄⓁⓁⓄⓌⒾⓃⒼ ♻️✅ : $following 
.†.🅿️🅾️🆂🆃🆂 📛💢 : $media 
\n------------𝑥---------------𝑥-----------\n
  ➺ (BY :[ @MHRX1 ☕︎︎ ] ➺ CH :[ @MR_MHR0 ☕︎︎ ] ",
                                
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>'🔍فحص: '.$i,'callback_data'=>'fgf']],
                                            [['text'=>'☢️يوزرات☢️: '.$user,'callback_data'=>'fgdfg']],
											[['text'=>'📧mail📧: '.$mail,'callback_data'=>'ghj']],
                                            [['text'=>"📮جيميل📮: $gmail",'callback_data'=>'dfgfd'],['text'=>"📮ياهو📮: $yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'📮Ⓜ️ail📮: '.$mailru,'callback_data'=>'fgd'],['text'=>'📮هوتميل📮: '.$hotmail,'callback_data'=>'ghj']],
			                             	[['text'=>"📮AOL📮 : $aol",'callback_data'=>'fgjjjvf'],['text'=>"📮GⓂ️X📮 : $gmx",'callback_data'=>'gdfgfd']],
				                            [['text'=>"📮🅿️rotonmail📮 : $protonmail",'callback_data'=>'fgd'],['text'=>"📮Ⓜ️HR📮 : $MHR",'callback_data'=>'fgd']],
                                            [['text'=>'✅متاح: '.$true,'callback_data'=>'gj'],['text'=>'❌مش متاح: '.$false,'callback_data'=>'dghkf']],
                                            [['text'=>'❌مش تجاري: '.$NotBussines,'callback_data'=>'dgdge'],['text'=>'✅تجاري: '.$false,'callback_data'=>'dghkf']],
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    } else {
         $NotBussines +=1;
        echo "NotBussines - $user\n";
    }
    usleep(400000);
    $i++;
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>'🔍فحص: '.$i,'callback_data'=>'fgf']],
                [['text'=>'☢️يوزرات☢️: '.$user,'callback_data'=>'fgdfg']],
                [['text'=>'📧mail📧: '.$mail,'callback_data'=>'ghj']],
                [['text'=>"📮جيميل📮: $gmail",'callback_data'=>'dfgfd'],['text'=>"📮ياهو📮: $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'📮Ⓜ️ail📮: '.$mailru,'callback_data'=>'fgd'],['text'=>'📮هوتميل📮: '.$hotmail,'callback_data'=>'ghj']],
			    [['text'=>"📮AOL📮 : $aol",'callback_data'=>'fgjjjvf'],['text'=>"📮GⓂ️X📮 : $gmx",'callback_data'=>'gdfgfd']],
				[['text'=>"📮🅿️rotonmail📮 : $protonmail",'callback_data'=>'fgd'],['text'=>"📮Ⓜ️HR📮 : $MHR",'callback_data'=>'fgd']],
                [['text'=>'✅متاح: '.$true,'callback_data'=>'gj'],['text'=>'❌مش متاح: '.$false,'callback_data'=>'dghkf']],
                [['text'=>'❌مش تجاري: '.$NotBussines,'callback_data'=>'dgdge'],['text'=>'✅تجاري: '.$false,'callback_data'=>'dghkf']],
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"Stop Checking : ".explode(':',$screen)[0]]);

