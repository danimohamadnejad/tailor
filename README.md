installation:
    git init
    git remote add main https://github.com/danimohamadnejad/tailor.git
    git pull main
    git checkout master
    composer install
    copy /.env.example /.env
    php artisan key:generate
    php artisan serve
/////
sending request:
  to register sweing order you need to send a post 
  request (with postman) to /taillor/orders with at least two parameters garment_type and fabric_type. additional parameters will be required based on garment type. garment types and fabric types are defined in /packs/tailor/config/tailor.php config file. current
  system supports cotton and leather as fabric types and, shirt and trouser as garment type.
  after successful request an item will be created and an invoice will be issued for corresponding item on zoho books.  