Title: IMDB (Insense Movie DataBase) :D

Description: Some production houses who want to publish their content like movies online. There are viewers who want to subscribe to these contents so that they 				 receive notifications whenever their favorite content is released. System where producers can register the content and subscribers can subscribe for 				 it. On the release date, subscribers gets notifications

Author: ATUL KUMAR
		atul.kumar0401@gmail.com

Directory:		|  IMDB
					|
					| -> cron (Daily crons)	 
					| -> lib (All libraries)
						  |
						  | -> core(Important libraries: Movies, Subscriber, Publisher)
						  | -> utility(Extra Libraries: Logger, Cache, Query etc) 
					|
					| -> common (common data)
						  |
						  | -> config.php( contains project specific configuration file)
						  | -> backup.sql(important sql)
						  | -> keys
					|	  	
					| -> logs
						  |
						  | -> app(application, code related logs)
						  | -> access(server related logs, request, apache based)

					| -> res (resource code, Majority of code logic would be in res)
					|
					| -> web (client code)
						  |
						  | -> css
						  | -> js
						  | -> html
						  | -> images 	
						  .
						  .
						  .

Instructions: 1.) Core libraries have been written(Publisher.php, Movies.php, Susbscriber.php) Path: /IMDB/lib/core/
		  	  2.) Create Queries have been written(backup.sql) Path: /IMDB/common/backup.sql
		  	  3.) Cron to send notifications daily # wrapper needed to send email Path: /IMDB/cron/Notication.php
		  	  4.) Assumed that there are wrappers like Query.php to execute queries(and also mysql drivers). App wont work without it.
