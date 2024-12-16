
# Simple PHP MVC Framework

This is a minimalistic PHP MVC framework designed for learning the core concepts of MVC architecture (Model-View-Controller).

## Demo
[Live Demo] (http://lookmaniak.atwebpages.com)

## Features
This framework has some basic features:
- **Routing**: Handles HTTP requests and maps them to controller actions.
- **Model**: Interacts with the database using PDO with connection pooling and basic CRUD operation.
- **View**: Renders HTML content and supports dynamic content injection.
- **Controller**: Handles business logic and data manipulation.
- **Example CRUD Operations**: Provides basic Create, Read, Update, and Delete functionality for posts.

## Requirements

- PHP 7.4 or higher
- MySQL or MariaDB

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/lookmaniak/myfwork.git
   cd myfwork
    ```
2. **Setup Database:**

    Create a MySQL or MariaDB database and update the credentials in the ``config.php`` file or directly within the code:

    ```php
    define("DB_HOST", "localhost");
    define("DB_NAME", "db_test");
    define("DB_USER", "your_user");
    define("DB_PASSWORD", "your_password");
    ```
    
3. **Create Database Tables:**

    The framework uses a simple posts table for demonstration purposes. You can run the following SQL to create it:

    ```sql
    CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    topic VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

    then optionally, you can import dummy posts from ``db_test.sql`` file.

4. **Accessing the Application**

    Open ``index.php`` in your browser. The app will be accessible at ``http://localhost/index.php/``.

    **Note** that this framework uses PATH_INFO, so it reqires to use ``index.php`` in the URL to access all routes.
 
## Example of Routes
   Open ``/app/routes/web.php`` file to create your own routes. Here is how routes are defined:

   ```php
    Route::set([
        "get:about" => [PageController::class, "about"],
        "get:posts" => [PostController::class, "index"],
        "get:posts/modify" => [PostController::class, "modify"],
        "post:posts/modify" => [PostController::class, "update"],
        "get:posts/new" => [PostController::class, "create"],
        "post:posts/new" => [PostController::class, "insert"],
    ]);
  ```
    
    
   Routes follow the pattern: ``{HTTP_METHOD}:{URL_PATH}``. For example, ``get:posts`` maps to the ``index()`` method in ``PostController``, which displays a list of posts.

   To access index page, use ``"get:"`` without ``URL_PATH``.

   ```php
   Route::set(["get:", [PageController::class, "home"]]);
   ```

## Example of a Controller
   This is how ``PostController`` should looks like:

   ```php
   <?php
   require_once  locate('/app/models/Post.php'); 
   require_once  locate('/app/views/posts.php');  
   require_once  locate('/app/views/post_form.php');
   
   class PostController {
       public function index(Request $request) {
           $posts = Post::all(["order_by" => "id DESC"]);
           return view(new Posts(), ["articles" => $posts, "title" => "Latest Articles"]);
       }

       public function create() {
           return view(new PostForm());
       }

       public function insert(Request $request) {
           $post = Post::create([
               "title" => $request->input("title"),
               "topic" => $request->input("topic"),
               "content" => $request->input("content")
           ]);

           if ($post) {
               return redirect_to("posts");
           }
       }
   }
   ```
   
   Import required files using:
   
   ```php
   <?php
   require_once locate('/app/models/Post.php');
   require_once locate('/app/views/posts.php');
   require_once locate('/app/views/post_form.php');
   ```

## Basic Usage

The framework supports the following operations for managing posts:

1. Viewing Posts

   ``Route: GET /posts``
   This displays a list of all posts.

2. Viewing a Single Post

   ``Route: GET /posts?id={post_id}``
   This displays the details of a single post by its id.

3. Creating a New Post

   ``Route: GET /posts/new``
   This displays a form to create a new post.
   Form Fields: Title, Topic, Content.

   ``Route: POST /posts/new``
   This saves the new post into the database.

4. Editing an Existing Post

   ``Route: GET /posts/modify?id={post_id}``
   This displays a form to modify an existing post.

   ``Route: POST /posts/modify?id={post_id}``
   This updates the post in the database.

5. Deleting a Post

   ``Route: POST /posts/delete?id={post_id}``
   This deletes the post from the database (this functionality can be added as needed).

6. About Page
   ``Route: GET /about``
   Displays information about the framework.
  
## Helpers

``tag()``: Generates HTML tags with optional attributes.
```php
echo tag('h1', 'Welcome to the Blog');
```

``safe_text()``: Strips unsafe HTML tags from user inputs but allows certain tags.
```php
$safe_content = safe_text($user_input);
```
``create_excerpt_by_words()``: Trims content to a specified word count and adds an ellipsis.
```php
$excerpt = create_excerpt_by_words($post_content);
```

``redirect_to()``: Redirects the user to a specific path.
```php
redirect_to("posts");
```

## Customizing the Framework
1. You can extend the framework by Adding more controllers and actions for different parts of the application.
2. Modifying the views to include custom HTML, CSS, and JavaScript.
3. Adding more models for interacting with different tables in the database.
4. Implementing user authentication and authorization for restricting access to certain pages.

# Conclusion
This framework provides a simple and structure to get started with MVC in PHP. You can use it as a learning tool to understand the MVC design pattern.

Feel free to contribute or extend the framework to suit your needs!

## License
This project is open-source and available under the MIT License. See the LICENSE file for more information.
