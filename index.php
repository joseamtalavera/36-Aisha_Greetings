<?php

require_once '_header.php';
require_once '_utilities.php';

// Add your code here!
function makeGreetingCard($sender, $recipient, $template){
    $file_name = "{$sender}-{$recipient}.txt";
    $sanitized_file_name = sanitizeFileName($file_name);
    $smessage = file_get_contents($template);

    

    //creating a card
    $file_path = "cards/".$sanitized_file_name;
    $my_file= fopen($file_path, "w");

    if($my_file){
        fwrite($my_file,"Dear {$recipient},\n\n ");
        fwrite($my_file,$smessage."\n\n");
        fwrite($my_file,"Sincerely,\n" );
        fwrite($my_file,$sender);

        fclose($my_file);
        return $sanitized_file_name;
    }else{
        return "An error occurred while creating the card.";
    }  
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $sender= $_POST['sender'];
    $recipient=$_POST['recipient'];
    $template=$_POST['template'];

    $file_name= makeGreetingCard($sender, $recipient, $template);

    if (isset($file_name)) {
        header("Location: card.php?name=" . urlencode($file_name));
        exit;
    }
}
?>




<div class="custom-box mt-5">
<h1 class="my-4">Create a Greeting Card</h1>
<form method="post">
    <div class="my-3">
        <label for="sender" class="form-label">Sender Name</label>
        <input type="text" name="sender" class="form-control" required>
    </div>

    <div class="my-3">
        <label for="recipient" class="form-label">Recipient Name</label>
        <input type="text" name="recipient" class="form-control" required>
    </div>

    <div class="my-3">
        <label for="template" class="form-label">Template</label>
        <select name="template" class="form-select" required>
            <option value="">Choose a Template</option>
            <option value="birthday.txt">Birthday</option>
            <option value="thank_you.txt">Thank You</option>
        </select>
    </div>

    <button type="submit" class="btn btn-red mt-1">Create Card</button>
</form>
</div>

<?php

// This is for testing only. Remove it after confirming it works.
//$result = makeGreetingCard('Sal', 'Mary', 'thank_you.txt');
//echo $result;  // This should output the generated file name, like 'Sal-Mary.txt'

require_once '_footer.php';