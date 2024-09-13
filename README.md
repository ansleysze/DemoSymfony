
# DemoSynfomy

"Demo Symfony Project - A sample Symfony web application demonstrating user authentication, CRUD operations, custom login styling, basic routing, registration, with he addition of tailwind and metronic"

I made this as a warm up for my work assignment, a mini side project if you will.


## Features

- **User authentication** (login, logout)
- **CRUD operations**: Create, Read, Update, and Delete functionality for managing data entities. (Products)
- **Custom login page styling** (CSS)
- **Routing** to different pages (login, home, registration)
- **Session and security management** using Symfony





## Technologies Used
Note I am in Rocky Linux 9.3 and it is in a VM virtual box


- **Symfony 6.x** - PHP framework
- **PHP 8.2** - Backend scripting
- **HTML/CSS** - Frontend design
- **Twig** - Templating engine
- **MySQL/MariaDB** - Database
- **GitHub** - Version control
- **Doctrine** - packages

## Acknowledgements

 - [symfony security documentation](https://symfony.com/doc/current/security.html#the-user)
 - [Installing & Setting up the Symfony Framework](https://symfony.com/doc/current/setup.html)

## Steps for basic setup and CRUD (Super Summary)
1. Get Symfony first
2. make a new project

3.Log in to MariaDB as root: First, log in to MariaDB:
sudo mysql -u root -p

CREATE DATABASE symfony_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

GRANT ALL PRIVILEGES ON symfony_db.* TO 'a'@'localhost' IDENTIFIED BY '12345678';
FLUSH PRIVILEGES;

4. .env config in the symfony directory
DATABASE_URL = "mysql://a:12345678@127.0.0.1:3306/symfony_db"

5.php bin/console make:entity Product  (make the product and customize to your liking)
#[ORM\Column(length: 255, nullable: true)]
   private ?string $name;
public function setName(string $name): self
   {
       $this->name = $name;

       return $this;
   }


   public function getDescription(): ?string
   {
       return $this->description;
   }


6.Check REPOSITORY LOCATION
 POPULATE AND ADD FUNCTIONS

7. MIGRATE DATA BASEphp bin/console make:migration
php bin/console doctrine:migrations:migrate

8. implement controller actions
symfony console make:controller ProductController

9. ADD controller actions
/**
* @Route("/api/products", name="product_api")
*/
class ProductController extends AbstractController
{
     /**
    * @Route("/{id}", name="show", methods={"GET"})
    */
   public function show(Product $product, SerializerInterface $serializer): Response
   {
       $data = $serializer->serialize($product, 'json');
       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }
}

10.DEFINE API ROUTES in routes.yaml 
controllers:
   resource:
       path: ../src/Controller/
       namespace: App\Controller
   type: attribute
product_api_index:
   path: /api/products
   controller: 'App\Controller\ProductController::index'
   methods: ['GET']


product_api_show:
   path: /api/products/{id}
   controller: 'App\Controller\ProductController::show'
   methods: ['GET']


11.RUN SERVER and try the functions
12. USE POSTMAN TO TEST API
Post http://localhost:8000/api/products
 
content type - application/json
BODY = Raw
{
    "name": "Samsung ZFold ",
    "description": "This is a an android product",
    "price": 200.50
}


## Security 
For security, this website does not allow non user to enter the homepage, so we need to register first in the database using localhost:8000/register then we login with localhost:8000/login. Once Logged in, you will be routed to the home page if you are verified and if not it will stil keep you at the login page.

## License
This project is open-source and available under the MIT License.
