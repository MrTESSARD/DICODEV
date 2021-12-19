<?php
// echo "fichier - '".__FILE__ ."'  ligne - ". __LINE__ ."\n";
ob_start();
?>
<div class="doc-page">
    <div class="sidebar row">
        <div class="general-sidebar">
            <div class="container-sidebar">
            

            
            <form class="search-bar">

    <input type="text" class="search" id="inputCherche" name="shearch-bar" placeholder="Qu'est-ce que vous cherchez ?" >
  
        <ul class="suggestions"> 

    <!-- <li>Filter for a laguage</li>

    <li>or a function</li> -->

        </ul>
        
</form>

                <div class="items-sidebar">
                    <div class="row container-items-sidebar" id="sidebar">
                    <?php
                    foreach ($barNavLangages as $key1 => $value1)
                    {
                    ?>
                        
                        <ul class="dropdown margin-top-dropdown">
                            <a data-toggle="dropdown" href="?<?=htmlspecialchars($route)?>=src&amp;<?=htmlspecialchars($route)?>=src&amp;<?=htmlspecialchars($table)?>=<?=htmlspecialchars($tableLangage)?>&amp;<?=htmlspecialchars($tuple)?>=<?=htmlspecialchars($barNavLangages[$key1][$tableLangageLangage])?>">
                                <i class="fas fa-caret-right">
                                </i>
                                <a href="index.php?<?=$route?>=src&amp;<?=$table?>=<?=$tableLangage?>&amp;<?=$tuple?>=<?=$barNavLangages[$key1][$tableLangageLangage]?>">
										<img class="logo"	src="
										<?= htmlspecialchars($barNavLangages[$key1][$tableLangageLogo])?>" 
										alt="LOGO">&nbsp;-&nbsp;
										
										
										<?=htmlspecialchars($barNavLangages[$key1][$tableLangageLangage])  ?>
									</a>
							<?php
                            foreach ($barNavPropriete as $key2 => $value2)
                            {
								if ($barNavLangages[$key1][$tableLangageId] == $barNavPropriete[$key2][$tableProprieteId_langage])
                                { //si ID de barNavLangages = $tableProprieteId_langage de barNavPropriete

							?>
                            <li class="dropdown-menu dropdown-menu-hidden">
                                <ul class="dropdown">
                                <a data-toggle="dropdown">
                                    <i class="fas fa-caret-right"></i>
                                    
                                    <span>
												<a  href="index.php?<?=$route?>=src&amp;<?=$table?>=<?=$tablePropriete?>&amp;<?=$tuple?>=<?=$barNavPropriete[$key2][$tableProprietePropriete]?>">
													<?php echo $barNavPropriete[$key2][$tableProprietePropriete]?>
												</a>
										</span>
                                <?php 
                                foreach ($barNavFonctions as $key3 => $value3)
                                {
									if ($barNavPropriete[$key2][$tableProprieteId] == $barNavFonctions[$key3][$tableFonctionId_propriete])
                                    {
								?>
                                    <li class="dropdown-menu dropdown-menu-hidden">
                                        <ul>
                                            <a class="lastchild" href="?<?=htmlspecialchars($route)?>=src&amp;<?=htmlspecialchars($table)?>=<?=htmlspecialchars($tableFonctions)?>&amp;<?=htmlspecialchars($tuple)?>=<?=htmlspecialchars($barNavFonctions[$key3][$tableFonctionFonction])?>">
                                            <?=htmlspecialchars($barNavFonctions[$key3][$tableFonctionFonction])?>
                                            </a>
                                        </ul>
                                    </li>
                                <?php 
									}
								}
                                ?>
                                </ul>
                            </li>
                            <?php 
                                }
                            }	
                            ?>
                        </ul>
                        <?php
					}
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-close">
            <button class="btn-sidebar"></button>
        </div>
    </div>
    <main class="bg1">
        <section class="main-content bg-2">
<?php 
    $output_sidebar = ob_get_clean();
?> 