
# Staff Rota

I have built it using Laravel 5.2 using the Homestead vagrant box

## Install

- Install Virtualbox, Vagrant and Vagrant Manager.
- Install the [Homestead Box](https://laravel.com/docs/5.2/homestead) for Laravel 5.2.
- clone this repo.
- Edit the file **~/.homestead/Homestead.yaml**
    - Add the folder mapping. 
        - map: ~/homestead/www/staffrota
          to: [Absolute path where you have the cloned repo (Ex. */home/vagrant/staffrota*)]
          
    - Add the site mapping.
        - map: staffrota.app
          to: [Absolute path where to the public folder where you have the cloned repo (Ex. */home/vagrant/staffrota/public*)]
            
    - Add the database *staffrota* in databases list.
    
- Edit the your OS hosts file and add:
    
    ```
    192.168.10.10   staffrota.app
    ```
              
- Setup the environment file copying the **.env.example** to **.env**. Adjust this file settings to your environment settings.
- Initialize the box doing *vagrant up (with provision)*.
- Connect via SSH to the virtual machine and go to the project root folder.

    ```
    $ cd [path to homestead]/Homestead
    $ vagrant ssh
    $ cd ~/homestead/www/staffrota
    ```
    
- Run these commands to install dependencies and database.

    ```
    $ composer install
    $ php artisan migrate
    $ php artisan db:seed
    ```
