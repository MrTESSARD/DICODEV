
<div id="contenuBox" class="col-90 px-5">
				
						
<?php	
// var_dump($BodyBloc);				
  foreach ($BodyBloc as $key1 => $value1) {//a ligne : $key - nom colonne : $y - contenu de la colonne
    echo  "<div class='class-". $BodyBloc[$key1][$tableLangageCss1]+10 ."'><h1> " . $BodyBloc[$key1][$tableLangageLangage] . " </h1></div>\n";
    echo  "<div class='class-". $BodyBloc[$key1][$tableProprieteCss1] ."'> " . $BodyBloc[$key1][$tablePropriete] . " </div>\n";
    echo  "<div class='class-". $BodyBloc[$key1][$tableProprieteCss2] ."'> " . $BodyBloc[$key1][$tableProprieteData1] . " </div>\n";
}
?>
</div>
    

