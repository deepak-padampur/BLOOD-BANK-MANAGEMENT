# BLOOD-BANK-MANAGEMENT 
THIS IS ONGOING PROJECT.
 The User interface is made using react.js ,apexchart.js, material css , javascript and html.The backend is designed by PHP and MySQL
### Lets have the glimpse of the major feature of the application
## 1.User Registration:

 ![USER REGISTER](https://user-images.githubusercontent.com/48153639/56752433-defe8e00-67a5-11e9-9420-f539e9d3bf4f.png)
![REGISTER USER](https://user-images.githubusercontent.com/48153639/56752560-2dac2800-67a6-11e9-84b6-27ae346e9355.png)
### 2.Login to User Dashboard after successful registration
![USER LOGIN](https://user-images.githubusercontent.com/48153639/56753161-95af3e00-67a7-11e9-9463-ee0ee07820b2.png)
![Screenshot (29)](https://user-images.githubusercontent.com/48153639/56754695-4965fd00-67ab-11e9-9de7-a9eaf756c470.png)

### 3.upload health certificate and get approval from admin
![Screenshot (30)](https://user-images.githubusercontent.com/48153639/56755206-98f8f880-67ac-11e9-92e6-8045f8e63124.png)

![Screenshot (31)](https://user-images.githubusercontent.com/48153639/56755226-a31af700-67ac-11e9-8615-bffa584f12ee.png)

## 4.past donation history

![PAST DONATION HISTORY](https://user-images.githubusercontent.com/48153639/56755595-7d422200-67ad-11e9-9529-077c98c958a9.png)
## 5.Check blood stock
![Screenshot (32)](https://user-images.githubusercontent.com/48153639/56756325-289fa680-67af-11e9-97b4-9fe1f202adc6.png)

## 5.find donor 

![FIND DONOR](https://user-images.githubusercontent.com/48153639/56755791-efb30200-67ad-11e9-9789-d32410f3d313.png)
## 6.You can refer a friend through email incase you are not available
![REFER A FRIEND IN CASE OF ABSENCE](https://user-images.githubusercontent.com/48153639/56755822-00637800-67ae-11e9-8837-105683ea9de1.png)
## 7.recover password through email


### INSTRUCTION:
1.Here we send referal to anyone using PHPMAILER function through SMTP server in localhost.So find make the required changes in the 'sendmail' file in xampp folder.
path:  C:\xampp\sendmail\sendmail.ini
###### changes in 'sendmail.ini' file
1.smtp_server=smtp.gmail.com<br>
2.for(TLS):smtp_port=587<br>
for(SSL):smtp_port=425<br>
3.auth_username='The email-id you want to host mail from'<br>
auth_password='your password of above email-id'<br>
###### 4.important: don't forget to make the security low of your gmail account.
https://myaccount.google.com/security:<br>
switch 'on' the 
#### less secure app access
