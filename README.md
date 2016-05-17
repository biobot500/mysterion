# Mysterion
Mysterion is yet another MVC based PHP Application Framework and also a CMS, which means you can use it to develop web applications from the scratch using its MVC features and libraries OR you can create and manage your web application content from an admin panel like wordpress or joomla (though stil its not big like them)
About an year ago, I started this project, I was focusing on creating a modular application platform where each feature will be hosted & distributed centrally for client applications. so once a module is made it can be used in anywhere following the DRY principal.

Mysterion is the past of this idea, it is the application framework which is suppose to assemble modules from a central server.

anyways, enough of the history, now lets see to install and configure Mysterion in your local mechine

# HOW TO INSTALL:

step1 : download Mysterion – 0.0.3

step2 : unzip the archive and place it into you htdocs folder

step3 : now you need to dump the sql file app_engine.sql into mysql from your phpmyadmin

step4 : open the config/system.php and replace the BASE_URL constant value according to your system.

step5 : open the config/database.php and replace the DB_HOST,DB_USER,DB_PASS,DB_NAME constant value according to your mysql settings.

thats it, it should be up and running.

now goto http://localhost/Mysterion from your browser, you should see the framework frontpanel

for admin panel goto http://localhost/Mysterion/admin,

username: admin

password: demo#admin

# Create an URL:

the first step in creating a page you need to create its url first then create the layout of the page. to create an url goto PAGES & LAYOUT link from admin panel

there click on Create New Page you will get a form.

lets create an about me url

here enter the Name of the url , eg: AboutME

the enter the Title of the page of that url, eg ALL about me

then enter what will be the URL: eg /aboutme, overall it will look like

http://localhost/Mysterion/aboutme

if you want to USE the MVC feature then you have to enter the controller name/method name into route field or else leave it as is.

ok now click Create

your about me url is ready, goto http://localhost/Mysterion/aboutme,

i know it says “Unable to load XML string!”

that’s because we have create an URL for about me but we didn’t mention any layout for the page.

so lets mention the layout now.

# Create a layout for your URL:

layout is the module definition of a page. through which system understand what module to load in which DOM container. its simple some XML, below is the layout XML for our URL about me.

<Modules>
<module name=”archive” container=”left” />
<module name=”categories” container=”left” />
<module name=”license” container=”right” />
<module name=”article” container=”right” />
</Modules>

here you can see we are loading 4 modules which by the way comes with Mysterion

the name attribute specify which module to load, and container tell where to load it on the Template.

now, copy the above code and goto Pages & Layout section from admin panel there click on the edit layout link of URL aboutme.

you will get a text area below the fields there you need to paste the above code. click update

and thats it. now goto http://localhost/Mysterion/aboutme you should see the page now.
