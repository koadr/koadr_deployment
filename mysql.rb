set_default(:mysql_host, "localhost")
set_default(:mysql_user) { application }
set_default(:mysql_password) { Capistrano::CLI.password_prompt "Mysql Password: " }
set_default(:root_password) { Capistrano::CLI.password_prompt "Root Password: " }
set_default(:mysql_database) { "#{application}_production" }

namespace :mysql do
  desc "Create a database for this application."
  task :create_database, roles: :db, only: {primary: true} do
    run "mysql -u root -h #{mysql_host} -p"
    run "#{root_password}"
    run %Q{ CREATE DATABASE #{mysql_database};}
    run %Q{ CREATE USER '#{mysql_user}' IDENTIFIED BY '#{mysql_password}'; }
    run %Q{ GRANT ALL PRIVILEGES ON #{mysql_database}.* TO '#{mysql_user}';}
    run "exit"
    run "/etc/init.d/php-fastcgi restart "
  end
  after "deploy:setup", "mysql:create_database"
end