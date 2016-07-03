# WebDiP-Web-dizajn-i-programiranje-
Web design and programming project

Project: Magazine subscription management

This project was developed for the college course web design and programming. This was my first encounter with developing web applications so it was made for the purpose of learning. Technologies used in this project are: PHP, Smarty, JavaScript, JQuery, HTML, CSS and Ajax.

Interesting thing about developing this project is that every single line of code (PHP, JavaScript, HTML, CSS) was written in Notepad++. So you can imagine what was like learning all these technologies and manually searching for syntax errors :)

Project description:
The task was to build magazine subscription management web application using PHP programming language.

Basic application requirements:
  - Login/regsiter module with validation on server and user side
  - User interface needs to be implemented using Smarty and AJAX with pagination where needed
  - An application needs to user virtual time management for easier testing
  - User actions need to be logged to the database and administrator can view those actions latter
  - Development on MySQL database
  

Application requirements by user roles:

  - Visitor
      - Can see basic sites
      - Can see magazines on which subscription is available
      - Can register using application register module or using OpenID (Google, Facebook)
      - In order to complete registration must activate account by clicking the link in received email
  
  - Registered user
      - User session lasts 30 minutes
      - After 3 unsuccessful login attempts account is blocked
      - Can browse his subscriptions and extend them
      - Every purchase is made through the basket
      - Can leave comments for magazines and subscriptions
      - Can edit his user data
      - Can create new magazine - after that admin can make him magazine moderator
  
  - Moderator
      - Can edit magazine data
  
  - Administrator
      - Can edit users data
      - Can see application statistics
      - Can set application settings (default page size, virtual time, logs, etc.)
