<?php
/**
 * Sample layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>

</div>
<?php
//hook for plugging in javascript
$hooks->run('js');
//hook for plugging in code into the footer
$hooks->run('footer');
?>

</div>
</main>
</div>
</body>
</html>
