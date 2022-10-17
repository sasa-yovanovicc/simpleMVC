
<h1>Welcome</h1>
<p>
It's a really simple php application, based on an MVC pattern. I'd like to
have a system which is implemented in core PHP (no framework or CMS can be
used) and it is:
</p>
<ul>
    <li>URL mapped (.htaccess rewrite)</li>
    <li>Based on an MVC pattern</li>
    <li>Object oriented</li>
    <li>Uses database (MySQL)</li>
</ul>
<p>
<strong>Requirements:</strong>
<br/>
The application should have 2 database tables: users (id, name) and
advertisements (id, userid, title).<br/>
* As a user I'd like a page that shows the list of the users existing in
the system.<a href="<?php echo APP_INNER_DIRECTORY;?>/Users/">&nbsp;(here &rarr;)</a><br/>
* As a user I'd like a page that shows the list of the existing
advertisements in the system (and the related user's name of course) <a href="<?php echo APP_INNER_DIRECTORY;?>/Ads/">&nbsp;(here &rarr;)</a><br/>
* They should be different pages<br/>
* So the system should contain 3 pages:<br/>
-> index, with the links to the user list and the advertisement list&nbsp;(this page)<br/>
-> user list<a href="<?php echo APP_INNER_DIRECTORY;?>/Users/">&nbsp;(here &rarr;)</a><br/>
-> advertisement list<a href="<?php echo APP_INNER_DIRECTORY;?>/Ads/">&nbsp;(here &rarr;)</a><br/>
-> The whole system should have a minimalist design (css)<a href="<?php echo APP_INNER_DIRECTORY;?>/css/main.css" target="_blank">&nbsp;(here &rarr;)</a><br/>
</p>
<p>
<strong>In summary:</strong>
<br/>
So it's a 3 paged application, with a minimal design, and database access,
which is URL mapped, and based on an MVC pattern. No framework or CMS
allowed to use.<br/>
I need the source of the application, wich I expect to be about 6-8 files.
Here can be a difference of course.<br/><br/>

<strong>Requirements regarding the implementation:</strong><br/>
<ul>
    <li>Must be object oriented!</li>
    <li>Must have at least 1 layer under the Controller layer</li>
    <li>Model and service methods should be separated. Model here should be
clear, used only for representation.</li>
    <li>Must have a nice, and well documented code</li>
    <li>A very simple css, in minimal style</li>
</ul>
</p>