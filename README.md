# Aisha_Greetings Project

The `card.php` file is a part of a PHP application that handles the display of card content.

## How it works

1. The file starts by including the `_header.php` and `_utilities.php` files. These files likely contain common functions and variables used throughout the application.

2. It then checks if a `name` parameter is passed in the URL. If it is, it sanitizes the file name using a function likely defined in `_utilities.php`.

3. If a valid file name is provided, it checks if a file with that name exists in the `cards` directory. If it does, it reads the content of the file. If it doesn't, it sets the `$card_content` variable to "File not found."

4. If an invalid file name is provided, it sets the `$card_content` variable to "Invalid file name."

5. The HTML part of the file then creates a box with a title "Card Preview". 

6. If the `$card_content` variable is set, it displays the content of the card. The content is passed through the `htmlspecialchars` function to prevent XSS attacks. 

7. If the `$card_content` variable is not set, it displays an error message.

8. Finally, it includes the `_footer.php` file, which likely contains common footer elements for the application.

## Usage

To use this file, navigate to `http://yourwebsite.com/card.php?name=yourfilename`, replacing `yourwebsite.com` with your actual domain and `yourfilename` with the name of the file you want to display.