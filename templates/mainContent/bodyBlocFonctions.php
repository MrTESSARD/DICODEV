
<div id="contenuBox" class="col-90 px-5">
				
						
<?php					
  foreach ($BodyBloc as $key1 => $value1) {//a ligne : $key - nom colonne : $y - contenu de la colonne
    echo  "<div class='class-". $BodyBloc[$key1][$tableFonctionCss1] ."'> " . $BodyBloc[$key1][$tableFonctionFonction] . " </div>\n";
    echo  "<div class='class-". $BodyBloc[$key1][$tableFonctionCss2] ."'> " . $BodyBloc[$key1][$tableFonctionData1] . " </div>\n";
}
?>
</div>
    

