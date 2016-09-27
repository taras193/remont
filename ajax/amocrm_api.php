<?php

        $responsible_user_id=809010;

$user=array(
	'USER_LOGIN'=>'grand-euro@mail.ru', #Ваш логин (электронная почта)
	'USER_HASH'=>'4a57ca9953d0be8f9f5c44b3067f9731' #Хэш для доступа к API (смотрите в профиле пользователя)
);

$subdomain='new5720dc54a7881'; #Наш аккаунт - поддомен
$link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
$curl=curl_init(); #Сохраняем дескриптор сеанса cURL


curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($user));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
curl_close($curl); #Заверашем сеанс cURL

if ($code==200){

    $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/list?query='.substr($phone, 1);
    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
    #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL,$link);
    curl_setopt($curl,CURLOPT_HEADER,false);
    curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
     
    $out2=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    //CheckCurlResponse($code);





    if($out2){

        $summ=0;

        $date=date("d.m.Y");

        $sdelka=array(
            'name'=>'Заявка с сайта grand-euro.ru',
            'status_id'=>140,
            'responsible_user_id'=>$responsible_user_id
          );

        $leads['request']['leads']['add'][]=$sdelka;



        $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$link);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);



        $Response=json_decode($out,true);
        $Response=$Response['response']['leads']['add'];
        $idsdelka=$Response[0]['id'];





        $out_cont =json_decode($out2, true);

        //$out_cont = var_dump(get_object_vars($out_cont2));

        //print_r($out2);


        $finded_contact = $out_cont['response']['contacts'][0];

        $newid = $out_cont['response']['contacts'][0]['linked_leads_id'][0];

        //print_r($finded_contact['linked_leads_id']); 

        $updated_contact = array_push($finded_contact['linked_leads_id'],$idsdelka);    
 
        //print_r($finded_contact); 


        $contacts['request']['contacts']['update'][] = $finded_contact;

        $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';

        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
        #Устанавливаем необходимые опции для сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$link);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($contacts));
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
         
        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);


        
        //$Response=json_decode($out,true);
        $contacts_id = $finded_contact['id'];

        //print_r($out);

    }else{



        $summ=0;

        $date=date("d.m.Y");

        $sdelka=array(
            'name'=>'Заявка с сайта grand-euro.ru',
            'status_id'=>140,
            'responsible_user_id'=>$responsible_user_id
          );

        $leads['request']['leads']['add'][]=$sdelka;



        $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$link);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);



        $Response=json_decode($out,true);
        $Response=$Response['response']['leads']['add'];
        $idsdelka=$Response[0]['id'];



        
        if ($name==''){$name=$phone;}


        $contact=array(
          'name'=>$name,
          'linked_leads_id'=>array($idsdelka)
        );


        if ($phone){
            $contact['custom_fields'][]=array(
                'id'=>301608,
                'values'=>array(
                    array(
                        'value'=>$phone,
                         'enum'=>'MOB'
                    )
                )
            );
        }



        //106802


                
        $set['request']['contacts']['add'][]=$contact;

        #Формируем ссылку для запроса
        $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
        #Устанавливаем необходимые опции для сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
        curl_setopt($curl,CURLOPT_URL,$link);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($set));
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);


                $Response=json_decode($out,true);
                $contacts_id = $Response['response']['contacts']['add'][0]['id'];


    }

  //Создаем задачу                
                $tasks['request']['tasks']['add']=array(
                 array(
                       'element_id'=>$contacts_id,
                        'element_type'=>1,
                        'task_type'=>3,
                        'text'=>'Заявка с сайта grand-euro.ru',
                        'responsible_user_id'=>$responsible_user_id, //ответсвенный
                        'complete_till'=>time()//дата
                      )
                );                
                
                $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/tasks/set';
                
                $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
                #Устанавливаем необходимые опции для сеанса cURL
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
                curl_setopt($curl,CURLOPT_URL,$link);
                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($tasks));
                curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
                curl_setopt($curl,CURLOPT_HEADER,false);
                curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
                curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
                 
                $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
                $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    


	
}


?>
