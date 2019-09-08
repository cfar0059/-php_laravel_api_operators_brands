# restfulapi
 
The REST API is built with Laravel.
 
Requirements: Before launching your Homestead environment, you must install VirtualBox 6.x, VMWare, Parallels or Hyper-V as well as Vagrant. In my case I opted to use Virtual Box.

Step 1:  Once Virtual Box and Vagrant have been installed add the laravel/homstead using the following command in the terminal. vagrant box add laravel/homestead

Step 2:  Consider cloning the repository into a Homestead folder within your "home" directory.  Enter the following command - git clone https://github.com/laravel/homestead.git ~/Homestead

Step 3:  Once you have cloned the Homestead repository, run the bash init.sh command from the Homestead directory to create the Homestead.yaml configuration file.  bash init.sh

Step 4:  In the Homestead.yaml file add the following lines under sites and save the file:
    - map: restfulapi.test
      to: /home/vagrant/Code/restfulapi/public
      
Step 5: Run vagrant up

Step 6: Run vagrant provision
     
Step 7: Run vagrant ssh to access Homestead

Step 8: Change directory to 'Code' Folder and type in laravel new restfulapi

Step 9: Once the Laravel installation is complete head over to the local machine and copy the contents from the git repository into the ~/Code/restfulapi

Step 10: Head over to Homestead and run - php artisan serve

Step 11: Find the .env file and input DB information:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=33060
DB_DATABASE=restfulapi
DB_USERNAME=homestead
DB_PASSWORD=secret

Step 12: Run - php artisan migrate:refresh --seed

Step 13: go back to .env file and change DB_HOST to DB_HOST=localhost

Step 14: Things should be running.  Tests - GET, POST and PATCH methods have been conducted through the use of PostMan.


