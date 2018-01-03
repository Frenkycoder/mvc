404 not found
<br>
<?php if (MODE === 'dev') : ?>
Error: <br>
<?php
echo 'line:'. $e->getLine()."<br>";
echo 'File:'. $e->getFile() . "<br>";
echo $e->getMessage();

endif;