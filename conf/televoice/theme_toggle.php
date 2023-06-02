<?php
lll
   if(isset($_REQUEST["theme-toggle"])) {
        if($darkMode == 1) {
            $darkMode = 0;
        }
        else {
            $darkMode = 1;
        }
    }
    header("location: usuarios.php");
?>

<div class="theme-toggle">
    <form action="theme_toggle.php" method="post" class="theme-toggle">
        <button type="submit" name="theme-toggle" class="button-light-mode <?php if ($darkMode == 0) { echo "active";}; ?>">
            <span class="material-symbols-rounded ">light_mode</span>

        </button>
        <button type="submit" name="theme-toggle" class="button-dark-mode <?php if ($darkMode == 1) { echo "active";}; ?>">

            <span class="material-symbols-rounded <?php if ($darkMode == 1) { echo "active";} ;?>">dark_mode</span>
        </button>
        </form>
</div>