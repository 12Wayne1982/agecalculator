<?php
    include('calc.php');

    $geburtstag = (isset($_POST['GEBURTSTAG'])) ? $_POST['GEBURTSTAG'] : '';
    $geburtsmonat = (isset($_POST['GEBURTSMONAT'])) ? $_POST['GEBURTSMONAT'] : '';
    $geburtsjahr = (isset($_POST['GEBURTSJAHR'])) ? $_POST['GEBURTSJAHR'] : '';
    $SUBMIT_GEBURTSDATEN = (isset($_POST['SUBMIT_GEBURTSDATEN'])) ? $_POST['SUBMIT_GEBURTSDATEN'] : '';
       
    $eingabeNichtVollstaendig = '';

    if( $geburtsmonat && $geburtstag ){
        $displayStarSignDescription = getStarSignDescription( $geburtsmonat, $geburtstag );
        $displayStarSignTitel= getStarSignTitel( $geburtsmonat, $geburtstag );
    }

    if( $geburtstag && $geburtsmonat && $geburtsjahr ){
        $getCalculatedData = array();
        $getCalculatedData = sendBirthData($geburtstag, $geburtsmonat , $geburtsjahr);
        
       
    }
    else if( ( !$geburtstag || !$geburtsmonat || !$geburtsjahr )  && $SUBMIT_GEBURTSDATEN == "Berechne mein Alter!" ){
        $eingabeNichtVollstaendig = true;
    }
    
    $years = (isset($getCalculatedData[ "YEARS" ])) ? $getCalculatedData[ "YEARS" ] : '';
    $months = (isset($getCalculatedData[ "MONTHS" ])) ? $getCalculatedData[ "MONTHS" ] : '';
    $weeks = (isset($getCalculatedData[ "WEEKS" ])) ? $getCalculatedData[ "WEEKS" ] : '';
    $days = (isset($getCalculatedData[ "DAYS" ])) ? $getCalculatedData[ "DAYS" ] : '';
    $hours = (isset($getCalculatedData[ "HOURS" ])) ? $getCalculatedData[ "HOURS" ] : '';
    $minutes = (isset($getCalculatedData[ "MINUTES" ])) ? $getCalculatedData[ "MINUTES" ] : '';
    $seconds = (isset($getCalculatedData[ "SECONDS" ])) ? $getCalculatedData[ "SECONDS" ] : ''; 
?>

<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Quicksand&display=swap" rel="stylesheet">
        
</head>
<body>
<div id="wrapper">
        <div id="dateneingabe">
        
                <table id="dateneingabe-tabelle">
                        <colgroup>
                                <col style="width: 50%;" />                 
                                <col style="width: 50%;" />   
                        </colgroup>
                        
                        <tr>
                                <td class="linkeSpalte"> 
                                        <span id="ueberschrift-1" class="hideElements">Agecalculator</span> <br>
                                        <span id="ueberschrift-1-beiBerechnung" class="showElements">Agecalculator berechnet</span>
                                </td>
                                <td class="rechteSpalte"></td>
                        </tr>
                        <tr class="hideElements">
                                <td class="linkeSpalte"></td>
                                <td class="rechteSpalte">Wir berechnen Ihr Alter in Jahre, Monaten, Wochen, Tagen, Stunden, Minuten und Sekunden. <br> Wir kennen auch Ihr Sternzeichen.
                                </td>
                        </tr>

                        
                        <form action="eingabe.php" method="post">
                        <tr class="hideElements">
                                <td class="linkeSpalte"> <label for="GEBURTSJAHR">Geburtsjahr:</label> </td>
                                <td class="rechteSpalte"> <input type="text" name="GEBURTSJAHR" maxlength="4" class="input"> </td>
                        </tr>
                        <tr class="hideElements">
                                <td class="linkeSpalte"><label for="GEBURTSMONAT">Geburtsmonat:</label></td>
                                <td class="rechteSpalte">
                                        <select name="GEBURTSMONAT" id="GEBURTSMONAT" class="input">
                                                <option value=""></option>
                                                <option value="1">Januar</option>
                                                <option value="2">Februar</option>
                                                <option value="3">März</option>
                                                <option value="4">April</option>
                                                <option value="5">Mai</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Dezember</option>
                                        </select>
                                </td>
                        </tr>
                        <tr class="hideElements">
                                <td class="linkeSpalte"><label for="GEBURTSTAG">Geburtstag:</label></td>
                                <td class="rechteSpalte"><input type="text" name="GEBURTSTAG" maxlength="2" class="input"></td>
                        </tr>
                        <tr class="hideElements">
                                <td class="linkeSpalte"></td>
                                <td class="rechteSpalte">
                                        <input type="submit" name="SUBMIT_GEBURTSDATEN" value="Berechne mein Alter!" class="input" id="berechneMeinAlter" > 
                                </td>
                        </tr>
                        </form >
                        
                        <?php if($years && $months && $weeks && $days && $hours && $minutes && $seconds ) : ?>

                        <tr>
                                <td class="linkeSpalte" id="ueberschrift-2">...ihr Alter...</td>
                                <td class="rechteSpalte"> </td>
                        </tr>
                        <tr>
                                <td class="linkeSpalte">in Jahre:</td>
                                <td class="rechteSpalte">Ihr Sternzeichen ist:</td>
                        </tr>
                        <tr>
                                <td class="linkeSpalteDatenausgabe"><span class="schrift-2" id="theYears"><?php echo $years ?></span></td>
                                <td class="rechteSpalteDatenausgabe"><span class="schrift-2"><?php echo $displayStarSignTitel; ?></span></td>
                                
                        </tr>
                        
                        <tr class="pufferzeile"><td></td><td></td></tr>
                        <tr>
                                <td class="linkeSpalte">in Monaten:</td>
                                <td rowspan="17" class="rechteSpalte" id="displayStarSignDescription">
                                        <?php echo $displayStarSignDescription; ?>
                                </td>
                                 
                        </tr>
                        <tr>
                                <td class="linkeSpalteDatenausgabe"><span class="schrift-2" id="theMonths"><?php echo number_format($months, 0, '.', '.');  ?></span></td>
                                <td class="rechteSpalteDatenausgabe"></td>
                                
                        </tr>
                        <tr class="pufferzeile"><td></td><td></td></tr>
                        <tr>
                                <td class="linkeSpalte">in Wochen:</td>
                                <td class="rechteSpalte"></td>
                        </tr>
                        <tr>
                                <td class="linkeSpalteDatenausgabe"><span class="schrift-2" id="theWeeks"><?php echo number_format($weeks,  0, '.', '.'); ?></span></td>
                                <td class="rechteSpalteDatenausgabe"></td>
                                
                        </tr>
                        <tr class="pufferzeile"><td></td><td></td></tr>
                        <tr>
                                <td class="linkeSpalte">in Tagen:</td>
                                <td class="rechteSpalte"></td>
                        </tr>
                        <tr>
                                <td class="linkeSpalteDatenausgabe"><span class="schrift-2" id="theDays"><?php echo number_format($days,  0, '.', '.'); ?></span></td>
                                <td class="rechteSpalteDatenausgabe"></td>
                                
                        </tr>
                        <tr class="pufferzeile"><td></td><td></td></tr>
                        <tr>
                                <td class="linkeSpalte">in Stunden:</td>
                                <td class="rechteSpalte"></td>
                        </tr>
                        <tr>
                                <td class="linkeSpalteDatenausgabe"><span class="schrift-2" id="theHours"><?php echo number_format($hours,  0, '.', '.'); ?></span></td>
                                <td class="rechteSpalteDatenausgabe"></td>
                                
                        </tr>
                        <tr class="pufferzeile"><td></td><td></td></tr>
                        <tr>
                                <td class="linkeSpalte">in Minuten:</td>
                                <td class="rechteSpalte"></td>
                        </tr>
                        <tr>
                                <td class="linkeSpalteDatenausgabe">
                                        
                                        <span class="schrift-2" id="theMinutes"><?php echo $minutes; ?>
                                </td>
                                       
                                <td class="rechteSpalteDatenausgabe"></td>
                                
                        </tr>
                        <tr class="pufferzeile"><td></td><td></td></tr>
                        <tr>
                                <td class="linkeSpalte">in Sekunden:</td>
                                <td class="rechteSpalte"></td>
                        </tr>
                        <tr>
                                <td class="linkeSpalteDatenausgabe">
                                
                                        <span class="schrift-2" id="theSeconds"><?php echo $seconds; ?></span> 
                                        
                                </td>
                                <td class="rechteSpalteDatenausgabe"></td>
                                
                        </tr>
                        <tr class="pufferzeile"><td></td><td></td></tr>
                        <tr>
                                <td class="linkeSpalte">
                                        <input type="button" value="Wollen Sie ein weiteres Alter berechnen?" onClick="location.href=location.href" class="input">
                                </td>
                                <td class="rechteSpalte"></td>
                        </tr>
                        <script src="js/main.js"></script>
                        <?php endif ?>
                        
                </table>
                
        </div>
        
       
        <?php if($eingabeNichtVollstaendig) : ?>
                <div id="datenausgabe">
                        Ihre Eingabe war nicht vollständig. <br> Bitte geben Sie Ihre Daten nochmal ein.
                </div>
        <?php endif ?>
</div> 


        

</body>
</html>





       