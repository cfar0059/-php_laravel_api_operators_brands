# restfulapi
 
The REST API is built with Laravel.
 
Requirements: Before launching your Homestead environment, you must install VirtualBox 6.x, VMWare, Parallels or Hyper-V as well as Vagrant. In my case I opted to use Virtual Box.

Step 1:  Once Virtual Box and Vagrant have been installed add the laravel/homstead using the following command in the terminal. vagrant box add laravel/homestead

Step 2:  Consider cloning the repository into a Homestead folder within your "home" directory.  Enter the following command - git clone https://github.com/laravel/homestead.git ~/Homestead

Step 3:  Once you have cloned the Homestead repository, run the bash init.sh command from the Homestead directory to create the Homestead.yaml configuration file.  bash init.sh

Step 4:  In the Homestead.yaml file add the following lines under sites and save the file:
    - map: restfulapi.test
      to: /home/vagrant/Code/restfulapi/public
      
Step 5:  Copy the contents of the git Repository in the folder found in your home directory called "code/restfulapi" created by homestead.

