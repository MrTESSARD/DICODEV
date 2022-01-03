
<div id="contenuBox" class="col-90 px-5">
  
  <?php					
  // var_dump($BodyBloc);		
  foreach ($BodyBloc as $key1 => $value1) {//a ligne : $key - nom colonne : $y - contenu de la colonne
    echo  "<div class='class-". htmlspecialchars($BodyBloc[$key1][$tableLangageCss1]) ."'> " . htmlspecialchars($BodyBloc[$key1][$tableLangageLangage]) . " </div>\n";
    echo  "<div class='class-". htmlspecialchars($BodyBloc[$key1][$tableLangageCss2]) ."'> " . htmlspecialchars($BodyBloc[$key1][$tableLangageData1]) . " </div>\n";
}
?>
</div>
    

