<?
function getXLS($xls){
include_once 'track/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load($xls);
$objPHPExcel->setActiveSheetIndex(0);
$aSheet = $objPHPExcel->getActiveSheet();

//этот массив будет содержать массивы содержащие в себе значения ячеек каждой строки
$array = array();
//получим итератор строки и пройдемся по нему циклом
foreach($aSheet->getRowIterator() as $row){
//получим итератор ячеек текущей строки
$cellIterator = $row->getCellIterator();
//пройдемся циклом по ячейкам строки
//этот массив будет содержать значения каждой отдельной строки
$item = array();
foreach($cellIterator as $cell){
//заносим значения ячеек одной строки в отдельный массив
array_push($item, iconv('utf-8', 'utf-8', $cell->getCalculatedValue()));
}
//заносим массив со значениями ячеек отдельной строки в «общий массв строк»
array_push($array, $item);
}
return $array;
}

$xlsData = getXLS('track/multi.xls'); //извлеаем данные из XLS

$type = 'kvart';
$din_title = 'Ремонт под ключ от 8000';

$p = $_GET['din_zag'];

if(!empty($p)){

$p = '&din_zag='.$_GET['din_zag'];

for ($i=1; $i <=21 ; $i++) { 
$xlsData_colls = $xlsData[$i];
if($p == $xlsData_colls[1]){
$din_title = substr($xlsData_colls[2], 0, -11);
$type = $xlsData_colls[4];
}
}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Grand - строительная компания</title>
    <script>if (screen.width <= 750) {document.location = "mobile/"+document.location.search;}</script>
    <style><? include('css/head.css'); ?></style>
    <script>
    !function(e,t,n){function r(){for(;u[0]&&"loaded"==u[0][l];)o=u.shift(),o[f]=!a.parentNode.insertBefore(o,a)}for(var i,s,o,u=[],a=e.scripts[0],f="onreadystatechange",l="readyState";i=n.shift();)s=e.createElement(t),"async"in a?(s.async=!1,e.head.appendChild(s)):a[l]?(u.push(s),s[f]=r):e.write("<"+t+' src="'+i+'"></'+t+">"),s.src=i}(document,"script",
    ["js/libs.min.js",
    "js/main.js",
    "https://maps.googleapis.com/maps/api/js?sensor=false",
    "js/map.js"]);
    </script>
    <meta id="viewport" name="viewport" content="width=980">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body class="<? echo $type; ?>">
    <div id="loader"><div class="cssload-cube"><div class="cssload-plane-1"><div class="cssload-top-left"></div><div class="cssload-top-middle"></div><div class="cssload-top-right"></div><div class="cssload-middle-left"></div><div class="cssload-middle-middle"></div><div class="cssload-middle-right"></div><div class="cssload-bottom-left"></div><div class="cssload-bottom-middle"></div><div class="cssload-bottom-right"></div></div><div class="cssload-plane-2"><div class="cssload-top-left"></div><div class="cssload-top-middle"></div><div class="cssload-top-right"></div><div class="cssload-middle-left"></div><div class="cssload-middle-middle"></div><div class="cssload-middle-right"></div><div class="cssload-bottom-left"></div><div class="cssload-bottom-middle"></div><div class="cssload-bottom-right"></div></div><div class="cssload-plane-3"><div class="cssload-top-left"></div><div class="cssload-top-middle"></div><div class="cssload-top-right"></div><div class="cssload-middle-left"></div><div class="cssload-middle-middle"></div><div class="cssload-middle-right"></div><div class="cssload-bottom-left"></div><div class="cssload-bottom-middle"></div><div class="cssload-bottom-right"></div></div></div></div>
    <section class="header" id="sec1">
        <div class="site-nav down"><span>нажмите<br>чтобы перейти</span><p>ДАЛЕЕ</p></div>
        <div>
            <div class="head">
                <div class="logo"></div>
                <div class="call">
                    <span class="phone">8 495 602 91 18</span>
                    <a href="#zz" class="callback" data-event="zak_zvon">Заказать звонок</a>
                </div>
                <p class="desc"><? echo $din_title; ?> руб./м<sup>2</sup></p>
            </div>
            <div>
                <h2 class="">Почему в половине случаев ремонт длится в 3 раза дольше, а смета в процессе становится в 2 раза больше?</h2>
                <div class="prich">
                    <div class="smeta"></div>
                    <p>Наша смета не расширяется в процессе ремонта</p>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery" id="sec4">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Примеры наших работ «до» и «после»</h2>
                <div class="nav">
                    <a href="" data-slider="0">Ванные</a>
                    <a href="" data-slider="1">Гостиные</a>
                    <a class="active" href="" data-slider="2">Кухни</a>
                    <a href="" data-slider="3">Лоджии</a>
                    <a href="" data-slider="4">Спальни</a>
                </div>
                <div class="all-sliders">
                    <div class="slidew" data-slider="0">
                        <div class="slider-wrap">
                            <div class="slider" id="gall-sld1">
                                <div class="slide active" data-sld="0">
                                    <a class="fancy" href="img/gallery/g_1_1_1.jpg" data-fancybox-group="g1_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_1_1_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_1_1_2.jpg" data-fancybox-group="g1_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_1_1_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="1">
                                    <a class="fancy" href="img/gallery/g_1_2_1.jpg" data-fancybox-group="g1_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_1_2_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_1_2_2.jpg" data-fancybox-group="g1_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_1_2_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="2">
                                    <a class="fancy" href="img/gallery/g_1_3_1.jpg" data-fancybox-group="g1_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_1_3_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_1_3_2.jpg" data-fancybox-group="g1_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_1_3_2_s.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="sld-nav left" id="g-sld1l"></div>
                        <div class="sld-nav right" id="g-sld1r"></div>
                    </div>
                    <div class="slidew" data-slider="1">
                        <div class="slider-wrap">
                            <div class="slider" id="gall-sld2">
                                <div class="slide active" data-sld="0">
                                    <a class="fancy" href="img/gallery/g_2_1_1.jpg" data-fancybox-group="g2_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_2_1_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_2_1_2.jpg" data-fancybox-group="g2_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_2_1_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="1">
                                    <a class="fancy" href="img/gallery/g_2_2_1.jpg" data-fancybox-group="g2_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_2_2_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_2_2_2.jpg" data-fancybox-group="g2_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_2_2_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="2">
                                    <a class="fancy" href="img/gallery/g_2_3_1.jpg" data-fancybox-group="g2_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_2_3_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_2_3_2.jpg" data-fancybox-group="g2_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_2_3_2_s.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="sld-nav left" id="g-sld2l"></div>
                        <div class="sld-nav right" id="g-sld2r"></div>
                    </div>
                    <div class="slidew active" data-slider="2">
                        <div class="slider-wrap">
                            <div class="slider" id="gall-sld3">
                                <div class="slide active" data-sld="0">
                                    <a class="fancy" href="img/gallery/g_3_1_1.jpg" data-fancybox-group="g3_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_3_1_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_3_1_2.jpg" data-fancybox-group="g3_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_3_1_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="1">
                                    <a class="fancy" href="img/gallery/g_3_2_1.jpg" data-fancybox-group="g3_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_3_2_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_3_2_2.jpg" data-fancybox-group="g3_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_3_2_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="2">
                                    <a class="fancy" href="img/gallery/g_3_3_1.jpg" data-fancybox-group="g3_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_3_3_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_3_3_2.jpg" data-fancybox-group="g3_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_3_3_2_s.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="sld-nav left" id="g-sld3l"></div>
                        <div class="sld-nav right" id="g-sld3r"></div>
                    </div>
                    <div class="slidew" data-slider="3">
                        <div class="slider-wrap">
                            <div class="slider" id="gall-sld4">
                                <div class="slide active" data-sld="0">
                                    <a class="fancy" href="img/gallery/g_4_1_1.jpg" data-fancybox-group="g4_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_4_1_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_4_1_2.jpg" data-fancybox-group="g4_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_4_1_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="1">
                                    <a class="fancy" href="img/gallery/g_4_2_1.jpg" data-fancybox-group="g4_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_4_2_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_4_2_2.jpg" data-fancybox-group="g4_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_4_2_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="2">
                                    <a class="fancy" href="img/gallery/g_4_3_1.jpg" data-fancybox-group="g4_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_4_3_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_4_3_2.jpg" data-fancybox-group="g4_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_4_3_2_s.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="sld-nav left" id="g-sld4l"></div>
                        <div class="sld-nav right" id="g-sld4r"></div>
                    </div>
                    <div class="slidew" data-slider="4">
                        <div class="slider-wrap">
                            <div class="slider" id="gall-sld5">
                                <div class="slide active" data-sld="0">
                                    <a class="fancy" href="img/gallery/g_5_1_1.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_1_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_5_1_2.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_1_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="1">
                                    <a class="fancy" href="img/gallery/g_5_2_1.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_2_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_5_2_2.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_2_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="2">
                                    <a class="fancy" href="img/gallery/g_5_3_1.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_3_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_5_3_2.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_3_2_s.jpg" alt=""></a>
                                </div>
                                <div class="slide" data-sld="3">
                                    <a class="fancy" href="img/gallery/g_5_4_1.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_4_1_s.jpg" alt=""></a>
                                    <a class="fancy" href="img/gallery/g_5_4_2.jpg" data-fancybox-group="g5_1"><img src="img/blank.png" class="lazy" data-original="img/gallery/g_5_4_2_s.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="sld-nav left" id="g-sld5l"></div>
                        <div class="sld-nav right" id="g-sld5r"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="new-calc">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Заполните форму и подберем <br>для вас лучшее решение!</h2>
                <div class="calc-n-wrap">
                    <div class="squere">
                        <div class="left">
                            <p class="slider-h">Выберите площадь <span class="kv-id dom">вашего дома</span><span class="kv-id kvart">вашей квартиры</span>:</p>
                            <div class="slider" id="slider-range-min">
                                <!--div class="slider-range"></div-->
                                <!--div class="slider-handle"></div-->
                            </div>
                        </div>
                        <p class="rignt" id="squere-val"><span class="sq" id="squere">300</span> <span class="grey">м<sup>2</sup></span></p>
                    </div>
                    <div class="price">
                        <div class="left">
                            <p class="slider-h">Определите приемлемую цену за м<sup>2</sup>:</p>
                            <div class="slider" id="slider-range">
                                <!--div class="slider-range"></div>
                                <div class="slider-handle"></div>
                                <div class="slider-handle"></div-->
                            </div>
                        </div>                        
                        <p class="rignt" id="price-val"><span class="l-price" id="l-price">7000</span> <span class="grey">-</span> <span class="h-price" id="h-price">17000</span> <span class="grey">руб/м<sup>2</sup></span></p>
                    </div>
                    <form action="ajax/mail.php" method="post">
                       <p class="form-h">Заполните вашы контактные данные:</p>
                        <input type="text" name="name" placeholder="Введите имя">
                        <input type="text" name="phone" placeholder="Введите телефон">
                        <input type="hidden" name="event" value="calc-new">
                        <input type="hidden" name="frm" value="Калькулятор новый">
                        <input type="hidden" name="squere" id="n-squere">
                        <input type="hidden" name="price" id="n-price">
                        <button>Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="why" id="sec2">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Причины, почему с нами выгодно работать</h2>
                <div class="trigw">
                    <div class="trig">
                        <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig1_1.jpg" alt=""></div>
                        <p>Первоначальная смета<br>не увеличивается</p>
                    </div> 
                    <div class="trig">
                        <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig1_2.jpg" alt=""></div>
                        <p>Гарантия на ремонтные работы<br>от 2х лет</p>
                    </div> 
                    <div class="trig">
                        <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig1_3.jpg" alt=""></div>
                        <p>Бесплатный вынос мусора и<br>очистка помещений</p>
                    </div> 
                    <div class="trig">
                        <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig1_4.jpg" alt=""></div>
                        <p>Скидка 10% на оригинальные<br>материалы</p>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <section class="calculate" id="sec3">
        <div class="backgrounds">
            <div class="step-lint active" data-step="0" data-choise="" data-choosen="">
                <div class="step-bg" data-choise="0"></div>
                <div class="step-bg" data-choise="1"></div>
            </div>
            <div class="step-lint" data-step="1" data-choise="" data-choosen="">
                <div class="step-bg" data-choise="0" data-choosen=""></div>
                <div class="step-bg" data-choise="1" data-choosen=""></div>
            </div>
            <div class="step-lint" data-step="2" data-choosen=""></div>
            <div class="step-lint" data-step="3" data-choosen=""></div>
        </div>
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Сделайте ориентировочный<br> просчет стоимости</h2>
                <div class="step">
                    <div class="stepw active" data-step="0">
                        <p>Что Вы хотите<br>отремонтировать?</p>
                        <a class="g-btn step-btn" data-nextstep="1" data-choise="0" href="">Дом</a>
                        <a class="g-btn step-btn" data-nextstep="1" data-choise="1" href="">Квартиру</a>                      
                    </div>
                    <div class="stepw" data-step="1">
                        <p>Где находится<br>объект?</p>
                        <a class="g-btn step-btn" data-nextstep="2" data-choise="0" href="">За МКАД</a>
                        <a class="g-btn step-btn" data-nextstep="2" data-choise="1" href="">В черте МКАД</a>
                        <a class="back" data-prevstep="0" href="">назад</a>                        
                    </div>
                    <div class="stepw" data-step="2">
                        <p>Площадь вашего<br>объекта, м<sup>2</sup></p>
                        <div class="plot" data-choosen="0">
                            <a class="g-btn step-btn" data-nextstep="3" href="">до 300</a>
                            <a class="g-btn step-btn" data-nextstep="3" href="">300 - 500</a>
                            <a class="g-btn step-btn" data-nextstep="3" href="">500 - 1000</a>
                            <a class="g-btn step-btn" data-nextstep="3" href="">от 1000</a>
                        </div>
                        <div class="plot" data-choosen="1">
                            <a class="g-btn step-btn" data-nextstep="3" href="">до 70</a>
                            <a class="g-btn step-btn" data-nextstep="3" href="">70 - 110</a>
                            <a class="g-btn step-btn" data-nextstep="3" href="">110 - 200</a>
                            <a class="g-btn step-btn" data-nextstep="3" href="">200 - 500</a>
                        </div>
                        <a class="back" data-prevstep="1" href="">назад</a>                 
                    </div>
                    <div class="stepw" data-step="3">
                        <p>Оставьте заявку и мы сориентируем Вас по стоимости ремонта за м<sup>2</sup> <span class="calc-type-text" data-choosen="1">вашей квартиры</span> <span class="calc-type-text" data-choosen="0">вашего дома</span> в течение 15 минут.</p>
                        <form action="ajax/mail.php" method="post">
                            <input type="text" name="name" placeholder="Введите имя">
                            <input type="text" name="phone" placeholder="Введите телефон">
                            <button>Отправить</button>
                            <input type="hidden" name="event" value="calc">
                            <input type="hidden" name="frm" value="Калькулятор">
                            <input type="hidden" name="step1" data-step="1">
                            <input type="hidden" name="step2" data-step="2">
                            <input type="hidden" name="step3" data-step="3">
                        </form>
                        <a class="back" data-prevstep="2" href="">назад</a>                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="we-can" id="sec5">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div class="big-slides" data-sld="0">
            <div class="slide active" data-sld="0"></div>
            <div class="slide" data-sld="1"></div>
            <div class="slide" data-sld="2"></div>
            <div class="slide" data-sld="3"></div>
            <div class="slide" data-sld="4"></div>
        </div>
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Мы всегда находим наилучшее решение</h2>
                <p>Только индивидуальный подход!</p>
                <div class="nav" data-sld="0">
                    <a href="" data-sld="0">Кухня</a>
                    <a href="" data-sld="1">Детская</a>
                    <a href="" data-sld="2">Спальня</a>
                    <a href="" data-sld="3">Гостинная</a>
                    <a href="" data-sld="4">Ванная</a>
                </div>
                <div class="slides" data-sld="0">
                    <div class="slides-lint">
                        <div class="trigw active" data-sld="0">
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_1_1.jpg" alt=""></div>
                                <span>Сердце вашего<br>дома</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_1_2.jpg" alt=""></div>
                                <span>Учитываем распространение запахов</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_1_3.jpg" alt=""></div>
                                <span>Использование пространства на<br>максимум</span>
                            </div>
                        </div>
                        <div class="trigw" data-sld="1">
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_2_1.jpg" alt=""></div>
                                <span>Ощущение сказки<br>для ребенка</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_2_2.jpg" alt=""></div>
                                <span>Безопасность</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_2_3.jpg" alt=""></div>
                                <span>Крепкий сон<br>ребенка</span>
                            </div>
                        </div>
                        <div class="trigw" data-sld="2">
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_2_1.jpg" alt=""></div>
                                <span>Атмосфера<br>спокойствия</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_3_2.jpg" alt=""></div>
                                <span>Грамотная<br>звукоизоляция</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_1_3.jpg" alt=""></div>
                                <span>Правильное<br>расположение<br>кровати</span>
                            </div>
                        </div>
                        <div class="trigw" data-sld="3">
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_2_1.jpg" alt=""></div>
                                <span>Визитная карточка<br>вашего дома</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_4_2.jpg" alt=""></div>
                                <span>Друзья оценят<br>гостеприимство</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_4_3.jpg" alt=""></div>
                                <span>Атмосфера уюта</span>
                            </div>
                        </div>
                        <div class="trigw" data-sld="4">
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_5_1.jpg" alt=""></div>
                                <span>Ничего лишнего</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_5_2.jpg" alt=""></div>
                                <span>Все под рукой</span>
                            </div>
                            <div class="trig">
                                <div class="ico"><img src="img/blank.png" class="lazy" data-original="img/trig2_5_3.jpg" alt=""></div>
                                <span>Изящный интерьер</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="attention" id="sec6">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>В процессе ремонта обязательно надо учитывать</h2>
                <div class="trigw">
                    <div class="trig">
                        <img src="img/blank.png" class="lazy" data-original="img/trig3_1.png" alt="">
                        <p>Износ несущих<br>конструкций</p>
                    </div>
                    <div class="trig">
                        <img src="img/blank.png" class="lazy" data-original="img/trig3_2.png" alt="">
                        <p>Сохранность систем<br>коммуникации</p>
                    </div>
                    <div class="trig">
                        <img src="img/blank.png" class="lazy" data-original="img/trig3_3.png" alt="">
                        <p>Неровности стен,<br>пола и потолка</p>
                    </div>
                    <div class="trig">
                        <img src="img/blank.png" class="lazy" data-original="img/trig3_4.png" alt="">
                        <p>Разрешения на<br>перепланировку</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="economy" id="sec7">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Сэкономьте на ремонте, заказав дизайн-проект!</h2>
                <h4>100% гарантия сохранности изначальной сметы при заказе дизайн-проекта.</h4>
                <p>Дизайн-проект стоит 1100 руб./м<sup>2</sup> включает в себя:</p>
                <a href="#pop1"><img src="img/blank.png" class="lazy" data-original="img/s6-a.jpg" alt=""><span>3D визуализацию,<br>идентичную конечному<br>результату</span></a>
                <a href="#pop2"><img src="img/blank.png" class="lazy" data-original="img/s6-a2.jpg" alt=""><span>Полностью<br>разработанный план<br>коммуникаций</span></a>
                <form action="ajax/mail.php" method="post">
                    <span>Получите подробную консультацию о необходимости дизайн проекта прямо сейчас</span>
                    <input type="text" name="name" placeholder="Введите имя">
                    <input type="text" name="phone" placeholder="Введите телефон">
                    <input type="hidden" name="event" value="diz_proj">      
                    <input type="hidden" name="frm" value="Дизайн-проект">
                    <button>Отправить</button>
                </form>
            </div>
        </div>
    </section>
    <section class="problems" id="sec8">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Проблемы, с которыми сталкиваются, работая<br>с частными бригадами</h2>
                <div class="slidew">
                    <div id="wrap">
                        <div class="slide active" data-sld="0">
                            <div>
                                <h4>1 этап</h4>
                                <div class="imgw"><img src="img/blank.png" class="lazy" data-original="img/s7-i1.png" alt=""></div>
                                <p>Планирование ремонта</p>
                                <span>Цена дизайна-проекта 1000 - 3000 руб./м<sup>2</sup>. Дизайн-проект делает друг частного мастера и затягивает сроки до трех месяцев, потому что не кому с него спросить. Дизайн на картинке выглядит круто, но в 95% не вписывается в бюджет и очень далек от конечного результата ремонта.</span>
                            </div>
                        </div>
                        <div class="slide" data-sld="1">
                            <div>
                                <h4>2 этап</h4>
                                <div class="imgw"><img src="img/blank.png" class="lazy" data-original="img/s7-i2.png" alt=""></div>
                                <p>Составление сметы</p>
                                <span>Как правило частные мастера сознательно занижают смету, чтобы привлечь клиента, но в процессе работы появляются все новые и новые расходы.</span>
                            </div>
                        </div>
                        <div class="slide" data-sld="2">
                            <div>
                                <h4>3 этап</h4>
                                <div class="imgw"><img src="img/blank.png" class="lazy" data-original="img/s7-i3.png" alt=""></div>
                                <p>Договора и оплата</p>
                                <span>В лучшем случае подписывается договор между физическими лицами на оказание услуг, но в 90% случаев договоренность устная и частный мастер не несет юридической ответственности, оплата производится на честном слове.</span>                                
                            </div>
                        </div>
                        <div class="slide" data-sld="3">
                            <div>
                                <h4>4 этап</h4>
                                <div class="imgw"><img src="img/blank.png" class="lazy" data-original="img/s7-i4.png" alt=""></div>
                                <p>Ремонтные работы</p>
                                <span>Вы выступаете в роли: дизайнера, прораба, сметчика, снабженца, технадзора, отвечаете за смену бригад, за их ночлег и питание.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav left" id="sld1l"></div>
                <div class="nav right" id="sld1r"></div>
            </div>
        </div>
    </section>
    <section class="about-us" id="sec9">
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Информация о нашей компании</h2>
                <div class="trigw">
                    <div class="trig">
                        <p>600</p>
                        <span class="green">крупных проектов</span>
                    </div>
                    <div class="trig">
                        <p>1<span>день</span></p>
                        <span class="green">просчет сметы</span>
                    </div>
                    <div class="trig">
                        <p>50</p>
                        <span class="green">монтажников<br>в штате</span>
                    </div>
                    <div class="trig">
                        <p>15 <span>лет</span></p>
                        <span class="green">опыта у компании</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="deadline" id="sec10">
        <div class="backgrounds" data-choise="" data-choosen="">
            <div class="choise-bg" data-choise="0"></div>
            <div class="choise-bg" data-choise="1"></div>
        </div>
        <div class="site-nav lines down"></div>
        <div class="site-nav lines up"></div>
        <div>
            <div>
                <h2>Горят сроки?</h2>
                <div class="formw" data-choise="" data-choosen="">
                    <h4>Закажите бесплатный выезд эксперта сметчика<br> на ваш объект прямо сейчас!</h4>
                    <p>Где находится Объект?</p>
                    <a href="" class="g-btn" data-choise="0">За МКАД</a>
                    <a href="" class="g-btn" data-choise="1">В черте Мкад</a>
                    <form action="ajax/mail.php" method="post">
                        <input type="text" name="name" placeholder="Введите имя">
                        <input type="text" name="phone" placeholder="Введите телефон">
                        <input type="hidden" name="frm" value="Горят сроки?">
                        <input type="hidden" name="event" value="gor_srok">   
                        <button>Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="contacts" id="sec12">
        <div class="site-nav lines up"></div>
        <div id="map"></div>
        <h2>Контактная информация</h2>
        <form action="ajax/mail.php" method="post">
            <p>Остались вопросы? Пишите</p>
            <input type="text" name="name" placeholder="Введите имя">
            <input type="text" name="phone" placeholder="Введите телефон">
            <textarea name="mess" placeholder="Введите вопрос"></textarea>
            <input type="hidden" name="frm" value="Контактная информация">
            <input type="hidden" name="event" value="kont_info">   
            <button>Отправить</button>
            <div class="callback">
                <span class="phone">8 495 602 91 18</span>
                <a href="#zz" class="callback" data-event="zak_zvon_f">заказать звонок</a>
            </div>
        </form>
        <footer>
            <div class="f-wrap">
                <div class="logo-f"></div>
                <a href="javascript:void(0)" class="gulf">Разработка сайта:</a>
                <a class="conf-btn">Политика конфиденциальности</a>
                <span class="copyright">Все права защищены</span>
            </div>
        </footer>
    </section>
    <div id="hidden-box">
        <div class="pop" id="zz">
            <div class="close"></div>
            <p>Оставьте свои<br>контактные данные</p>
            <span>и мы Вам перезвоним</span>
            <form action="ajax/mail.php" method="post">
                <input name="name" placeholder="Введите имя" type="text">
                <input name="phone" placeholder="Введите телефон" type="text">
                <input type="hidden" name="frm" value="Заказать звонок">
                <input type="hidden" name="event" id="zz_event" value="zak_zvon"> 
                <button>Отправить</button>
            </form>
        </div>
        <div class="pop" id="smet">
            <div class="close"></div>
            <p>Выбирая подрядчика по принципу минимальной цены, знайте, что, скорее всего, вы переплатите в 2 , а то и в 3 раза.</p>
            <h5>4 самых популярных трюка на рынке ремонта для увеличения сметы.</h5>
            <ul>
                <li><span>1.  Электрика </span>В первоначальную смету закладывается минимальное количество электрооборудования, а именно количество розеток и метров кабеля. В процессе ремонта в смете появляются дополнительные параметры: увеличивается длина кабеля и количество метров штробления.</li>
                <li><span>2.  Поклейка обоев </span>Зачастую строительные компании закладывают в смету стоимость поклейки самых простых – бумажных обоев, и, если клиент купил виниловые (моющиеся) обои, цена на поклейку может вырасти в 1,5 – 2 раза.</li>
                <li><span>3.  Выравнивание полов </span>При заливке армированной стяжки пола в смету могут занести минимальную толщину стяжки – 5 см. По факту стяжка может быть 10 и даже 12 см, вот еще одна статья расходов, которая вырастает в 2 раза.</li>
                <li><span>4.  Выравнивание стен </span>Стоимость шпаклевки и штукатурки зависит от количества слоев. В смете может быть заложена толщина одного слоя, хотя по факту для качественного выравнивания поверхности нужно как минимум 2 а то и 3 слоя. </li>
            </ul>
            <h5>Нарываясь на подобного исполнителя, будьте готовы и к увеличению сроков работ. <br><br>Существуют еще десятки вариантов, как недобросовестные подрядчики завышают смету в процессе ремонта, будьте внимательны.</h5>
        </div>
        <div class="pop" id="pop1">
            <div class="close"></div>
            <p>3D визуализация.</p>
            <span>С помощью визуализации, Вы сможете практически на 100% увидеть тот результат, который Вы получите. Именно благодаря 3D макету, Вы сможете грамотно контролировать ход ремонта. Да, это трата, но трата, которая, в конечном счете, приведет к экономии ваших средств, поверьте нашему опыту.</span>
            <a href="" class="new-btn fancy_pop" data-gal="0">Посмотреть примеры</a>
        </div>
        <div class="pop" id="pop2">
            <div class="close"></div>
            <p>План коммуникаций.</p>
            <span>Без полностью подготовленного плана коммуникаций, строительная бригада действует вслепую. План включает в себя полные геометрические расчеты помещения, учитывает проводку. Зачастую, на этапе составления плана коммуникаций всплывают подводные камни, без учета которых ремонт бы здорово затянулся.</span>
            <a href="" class="new-btn fancy_pop" data-gal="1">Посмотреть примеры</a>
        </div>
        <div class="pop" id="conf_pop">
            <div class="close"></div>
                <h2>Политика конфиденциальности</h2>
                <p>Наша компания уважительно относится к правам клиента. Соблюдается строгая конфиденциальность при оформлении заказа. Сведения надёжно сохраняются и защищены от передачи.</p>
                <p>Согласием на обработку данных клиента исключительно с целью оказания услуг является размещение заказа на сайте.</p>
                <p>К персональным данным относится личная информация о клиенте: домашний адрес; имя, фамилия, отчество; сведения о рождении; имущественное, семейное положение; личные контакты (телефон, электронная почта) и прочие сведения, которые перечислены в Законе РФ № 152-ФЗ «О персональных данных» от 27 июля 2006 г.</p>
                <p>Клиент вправе отказаться от обработки персональных данных. Нами в данном случае гарантируется удаление с сайта всех персональных данных в трёхдневный срок в рабочее время. Подобный отказ клиент может оформить простым электронным письмом на адрес, указанный на странице нашего сайта.</p>
        </div>
        <div class="pop" id="okgo">
            <div class="close"></div>
                <p>Спасибо за заявку, наш менеджер свяжется с Вами в ближайшее время</p>
        </div>
        <div class="pop" id="error-pop">
            <p>Пожалуйста, <br>введите правильное имя и телефон!</p>
            <div class="close">закрыть окно и ввести правильно</div>
        </div>
    </div>
    <div class="menu-btn">Навигация по сайту</div>
    <div class="menu">
        <div class="close-menu"></div>
        <a href="#sec1" class="menu-a">Главная</a>
        <a href="#sec4" class="menu-a">Примеры работ</a>
        <a href="#sec2" class="menu-a">Почему мы?</a>
        <a href="#sec3" class="menu-a">Узнать стоимость</a>
        <a href="#sec7" class="menu-a">Дизайн-проект</a>
        <a href="#sec9" class="menu-a">О нас</a>
        <a href="#sec12" class="menu-a">Контакты</a>
    </div>
    <!--div id="new-smet-overlay"></div>
    <div class="right-pop" id="new-smet">
        <div class="right-pop-close"></div>
        <h4 class="right-pop-h4">Наша смета не расширяется в процессе ремонта</h4>
        <p class="right-pop-img">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde</p>
    </div-->
    <?php include_once("track/body.php") ?>
</body>
</html>