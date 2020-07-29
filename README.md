#RodrigoXdn/Laravel Pkg

<h2>Installing pkg.</h2>
<p></p>
<p>
	Add service provider in the file config/app.php
	<br>
	/*
     * Package Service Providers...
     */
        RodrigoXdn\Laravel\XdnServiceProvider::class,
    <br>
	Enter the pkg installation command into terminal/cmd/bash.
</p>

<h2>Comands</h2>
<p>
	php artisan pkg:install
	<br>
	Install configuration of pkg.
</p>
<p>
	php artisan pkg:route
	<br>
	Writing routes of pkg in your project.
	<br>
	Note the current routes will be overwritten from the /routes/web.php file.
	<br>
	It is recommended that you back up routes if they exist.
</p>
<p>
	php artisan pkg:example
	<br>
	Displays sample files from the use of pkg.
	<br>
	The files have been copied to /resources/example/
</p>
<p>
	php artisan pkg:controller {name : The controller name}
	<br>
	Controller based on pkg configuration.
	<br>
	Note the controller only receives the name parameter.
</p>
<p>
	php artisan pkg:controller-ajax {name : The controller name}
	<br>
	Controller based on ajax pkg configuration.
	<br>
	Note the controller only receives the name parameter.
</p>