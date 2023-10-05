<?php

require_once '_header.php';
require_once '_utilities.php';

// Add your code here!

$file_name= isset($_GET['name'])? sanitizeFileName($_GET['name']): null;

if($file_name){
    $file_path="cards/".$file_name;
    if(file_exists($file_path)){
        $card_content= file_get_contents($file_path);
    }else{
        $card_content= "File not found.";
    }

}else {
    $card_content="Invalid file name.";
}

?>


<div class="custom-box">
<h1 class="my-4">Card Preview</h1>


<?php if(isset($card_content)) : ?>

    <pre class="bg-light p-3"><?= htmlspecialchars($card_content)?></pre>
<?php else:?>
    <p>An error occurred. Please try again.</p>
<?php endif; ?>



</div>

<?php

require_once '_footer.php';