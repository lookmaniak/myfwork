<?php
require_once locate('/framework/template/Tag.php');
require_once locate('/framework/helpers/string_literals.php');
require_once locate('/app/views/template.php');

class AboutPage extends Layout {
    
    public function view() {

        return $this->inject('About', tag('div', [
            tag('h4', 'About this Framework'),
            tag('small', 'Topic: ' . 'about'),
            tag('div', [
                tag('h1', 'Summary of MVC Framework for Learning PHP'),
                tag('p', 'In the ever-evolving world of web development, understanding foundational concepts like the <strong>Model-View-Controller (MVC)</strong> design pattern is crucial. PHP, being one of the most popular server-side scripting languages, provides an excellent platform for building web applications. For developers aiming to grasp the principles of MVC, creating a simple yet effective MVC framework in PHP can offer a hands-on experience to understand how applications are structured in a way that separates logic from presentation, improves maintainability, and promotes scalability.'),
                tag('p', 'This framework is designed specifically for learning the MVC design pattern in PHP, offering a minimalistic approach while still adhering to the core principles of MVC. Whether you\'re a beginner or someone looking to refine your knowledge, this framework provides an easy-to-understand structure that clearly demonstrates how each component of the MVC pattern interacts.'),
                tag('h2', 'The MVC Architecture'),
                tag('p', 'Before diving into the framework, it\'s important to understand the MVC design pattern. MVC is a software architectural pattern that divides an application into three interconnected components: <strong>Model</strong>, <strong>View</strong>, and <strong>Controller</strong>. Each of these components has a distinct role:'),
                tag('ul', [
                    tag('li', '<strong>Model</strong>: The model represents the data structure and business logic of the application. It interacts with the database, retrieves the necessary data, and processes it before sending it to the controller. The model doesn\'t concern itself with how data is presented; instead, it focuses on how data is managed and manipulated.'),
                    tag('li', '<strong>View</strong>: The view is responsible for the user interface. It displays the data received from the controller in a format that is easy for the user to interact with. In the context of this PHP framework, the view is typically HTML and can include other web technologies like CSS and JavaScript. Views are generally templates that are populated with dynamic data by the controller.'),
                    tag('li', '<strong>Controller</strong>: The controller acts as an intermediary between the model and the view. It takes input from the user via the view, processes it (often by calling methods from the model), and updates the view accordingly. The controller handles the flow of data, ensuring that the correct actions are performed based on the user\'s interaction.')
                ]),
                tag('h2', 'The Framework Structure'),
                tag('p', 'The structure of the MVC framework is simple and intuitive. Here are the core components of the framework:'),
                tag('ul', [
                    tag('li', '<strong>Model</strong>: Represents the application data and business logic. The model is responsible for database interaction and processing data before it is sent to the controller or view.'),
                    tag('li', '<strong>View</strong>: The view is a simple file or template that outputs HTML code. It receives dynamic data passed by the controller and is responsible for rendering the user interface.'),
                    tag('li', '<strong>Controller</strong>: The controller is the central point of control in the application. It acts as the mediator between the model and the view, calling the necessary methods from the model and passing the results to the view for rendering.')
                ]),
                tag('h2', 'Learning through the Framework'),
                tag('p', 'This PHP MVC framework is not only a tool for developing web applications but also a learning resource for those interested in understanding how modern applications are structured. By following the MVC principles, you will gain a clear understanding of how to separate concerns and design applications that are modular, maintainable, and scalable. As you work through various features of the framework, you will learn how controllers manage data flow, how models interact with databases, and how views are populated with dynamic content.'),
                tag('h2', 'Conclusion'),
                tag('p', 'This framework is designed with simplicity in mind, allowing developers to focus on the key principles of MVC without unnecessary complexity. It provides a solid foundation for learning PHP and developing web applications using the MVC pattern. Whether you are building a simple blog, an online store, or a complex content management system, this framework will help you understand the underlying principles of application structure, separation of concerns, and scalability.')
            ]),
        ]));
    }
}