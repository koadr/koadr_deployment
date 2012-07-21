namespace :nginx do
  desc "Setup nginx configuration for rails application"
  task :setup, roles: :web do
    template "nginx_unicorn.erb", "/tmp/nginx_conf"
    run "#{sudo} mv /tmp/nginx_conf /etc/nginx/sites-available/#{application}"
    run "ln -s /etc/nginx/sites-available/#{application} /etc/nginx/sites-enabled"
    run "#{sudo} rm -f /etc/nginx/sites-available/default"
    restart
  end
  after "deploy:setup", "nginx:setup"

  %w[start stop restart].each do |command|
    desc "#{command} nginx"
    task command, roles: :web do
      run "#{sudo} service nginx #{command}"
    end
  end
end

