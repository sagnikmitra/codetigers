<?php

$message = " Hey <teamname>,\n
             Thank you for registering in DECOV 2020. Your unique id is <u_id>. Please don’t share the id with anyone. For Round 2, the process is written below.\n
             HOW TO ENTER THE DETAILS OF THE ROUND 2? \n

                1. After registration, you will get an option to Download PPT Template. Download the template by clicking the button. Through that particular template, you have to submit your idea. You can add additional slides but the total slides must not exceed 10.\n

                2. Once, you finish your video and presentation, upload the links in the 2nd Round in the form for 2nd round where you have to submit Your ID (the unique id that you got in mail), Video Lin & PPT Link.\n

                3. Now click submit and you are done with the 2nd Round Registration.\n 

                Best of luck for your Project. You can contact us through our official mail id codetigers@codetigers.net. Download our mobile application on Play Store: Code Tigers. \n
                
                Join Our Official Whatsapp Group : \n
                https://bit.ly/2yDgB8o \n
                Join Our Official Slack Channel : \n
                https://bit.ly/2WKc6AN \n
                Follow us on our Social Media Handles to get further information about DECOV.\n
                GitHub: https://github.com/code-tigers \n

                Facebook: https://www.facebook.com/TIGCodeTigers \n
                
                Instagram: https://www.instagram.com/codetigers/ \n
                
                Twitter: twitter.com/code_tigers \n
                
                LinkedIn: linkedin.com/company/code-tigers/ \n
                
                Blog Channel: https://codetigers.netlify.app/ \n
                
                Forum: https://codetigers.org/forum.codetigers.org/index.php \n
                
                
                Regards,
                
                Team Code Tigers.
                

";

mail("suvhradip@gmail.com", "Thanks for Registration", $message);

echo "Done";

?>