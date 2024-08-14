# Documentation

The RestAPI-Laravel-Domain-Driven-Template repository is a comprehensive template designed to facilitate the development of robust and scalable RESTful APIs using Laravel, structured according to Domain-Driven Design (DDD) principles. This template provides a solid foundation for building complex applications by organizing the codebase in a modular and maintainable manner.

## Key Features

-   **Domain-Driven Design (DDD) Principles**: Ensures maintainable and scalable code.
-   **Clean Architecture**: Clear separation of concerns with distinct layers for infrastructure, domain, and application logic.
-   **Pre-configured Commands**: Includes commands for generating middleware and service classes in the Infrastructure layer.
-   **Customizable Stubs**: Predefined stubs to easily generate custom classes.
-   **Extensible Structure**: Supports the growth and complexity of your application.

## Who is This Template For?

This template is ideal for Laravel developers who:

-   Want to adopt Domain-Driven Design (DDD) principles.
-   Are building complex applications requiring clean architecture and maintainability.
-   Need a scalable solution for managing domain logic, services, and middleware.

## Project Structure

### Commands

The `app/Console/Commands` directory contains artisan commands specifically designed for generating infrastructure classes. These commands are integral for scaffolding middleware and service classes within the Infrastructure layer of your application.

#### Purpose

These artisan commands streamline the creation of middleware and service classes, ensuring they adhere to the project's architectural conventions. By using these commands, developers can maintain a consistent structure and focus on implementing the core functionality.

#### Contents

##### 1. InfrastructureMiddlewareCommand.php

This command facilitates the generation of a new middleware class within the Infrastructure layer. Middleware classes generated through this command will be properly scaffolded, ensuring they integrate seamlessly with the application's infrastructure.

-   **Command**: `infrastructure:middleware`
-   **Description**: Generate a new middleware class in the Infrastructure layer.
-   **Usage**:

    ```bash
    php artisan infrastructure:middleware {name}
    ```

    -   **Parameters**:
        -   `{name}`: The name of the middleware class to be generated.

-   **Example**:

    To generate a middleware class named `ExampleMiddleware`, use the following command:

    ```bash
    php artisan infrastructure:middleware ExampleMiddleware
    ```

##### 2. InfrastructureServiceCommand.php

This command enables the creation of a new service class within the Infrastructure layer. Service classes generated through this command will follow the project's structure, promoting consistency and best practices.

-   **Command**: `infrastructure:service`
-   **Description**: Generate a new service class in the Infrastructure layer.
-   **Usage**:

    ```bash
    php artisan infrastructure:service {name}
    ```

    -   **Parameters**:
        -   `{name}`: The name of the service class to be generated.

-   **Example**:

    To generate a service class named `ExampleService`, use the following command:

    ```bash
    php artisan infrastructure:service ExampleService
    ```

### Infrastructure

Location: `app/Infrastructure`
Purpose: Houses all infrastructure-related code, supporting application and domain layers.
Contents:

-   **Services**: Contains service classes implementing business logic.
-   **Middleware**: Contains middleware classes handling HTTP request and response transformations.

### Domain

The `app/Domain` directory is a crucial part of your application's architecture, designed to encapsulate the core business logic and rules. This directory ensures that the business logic is decoupled from other layers of the application, such as the presentation and infrastructure layers.

#### Purpose

The purpose of the `app/Domain` directory is to organize and isolate the business logic of your application. By structuring the domain layer this way, it becomes easier to maintain, test, and extend your application. Each component within this directory serves a specific role in representing and managing the domain logic.

#### Contents

1. **Models**: These are data representations of the entities within your domain. They map the application's data to the database structure, enabling interactions with the database through ORM (Object-Relational Mapping). Models define the attributes and relationships of the domain entities.

2. **Data**: Data Transfer Objects (DTOs) encapsulate data and transfer it between different parts of the application. DTOs are used to carry data between processes, ensuring a clean separation between layers.

3. **ViewModels**: These are data specifically prepared for views. They format data in a way that is optimal for presentation, used to pass data from controllers to views, enhancing the separation of concerns.

4. **ValueObjects**: Immutable objects representing concepts in the domain. They represent a descriptive aspect of the domain with no identity of their own, ensuring their state cannot be altered once created, providing reliability in business logic.

5. **Actions**: Classes containing business logic. They encapsulate the operations that form the business processes, used to perform tasks and handle complex operations within the domain.

6. **Casts**: Custom cast classes for Eloquent models. They define how attributes are cast when retrieved from or set in the database, enhancing the handling of data types within models.

7. **Channels**: Custom broadcast channels. They define channels for broadcasting events to clients, used in real-time communication within the application.

8. **Commands**: Domain-specific commands. They encapsulate a method call with all the information needed to perform an action or trigger an event, used to delegate tasks within the application.

9. **Enums**: Enumerations for fixed sets of constants. They define a collection of related constants, providing type safety and improving code readability.

10. **Events**: Domain events signal that something of importance has happened within the domain. They decouple different parts of the application by providing a publish-subscribe pattern.

11. **Exceptions**: Custom exception classes handle errors and exceptional situations in a controlled manner, providing a way to manage and respond to error conditions.

12. **Factories**: Model factories for testing. They generate instances of models with predefined attributes for testing purposes, simplifying the creation of test data.

13. **Jobs**: Queueable jobs encapsulate tasks that should be performed asynchronously, used to offload time-consuming tasks from the main execution flow.

14. **Listeners**: Event listeners handle events triggered within the application. They execute code in response to specific events, facilitating event-driven architecture.

15. **Mail**: Mailable classes define the content and configuration of emails, simplifying sending emails by providing a structured way to compose and send them.

16. **Notifications**: Notification classes send notifications via different channels, providing a consistent interface for sending alerts and messages to users.

17. **Observers**: Model observers listen to model events and execute code in response. They encapsulate and manage the behavior that should occur in response to model events.

18. **Policies**: Authorization policy classes determine user permissions for specific actions, centralizing authorization logic, making it easier to manage and maintain.

19. **Providers**: Service providers bootstrap and configure services within the application. They register services, bind interfaces to implementations, and set up configuration.

20. **Resources**: API resource classes transform models and collections into JSON responses, providing a way to format and structure API responses.

21. **Rules**: Custom validation rules encapsulate complex validation logic, extending validation capabilities beyond the built-in rules.

22. **Scopes**: Query scopes encapsulate reusable query logic, enhancing query readability and reusability within models.

23. **Traits**: Reusable sets of methods share common functionality across multiple classes, providing a mechanism for code reuse, reducing duplication, and improving maintainability.

### Shared

The `app/Domain/Shared` directory contains common classes and utilities that are shared across various domains within the application. This ensures that common functionality is centralized, promoting code reuse and reducing duplication.

#### Purpose

The purpose of the `Shared` directory is to house shared resources that can be used by multiple domains. This includes custom casts, data structures, and base models that provide common functionality needed across different parts of the application.

#### Contents

##### 1. **Casts**

-   `StringArrayCast.php`: Casts an attribute to and from an array of strings, allowing for storage of string arrays in a single database column.

##### 2. **Data**

-   `AccessTokenData.php`: Represents data related to access tokens, encapsulating token information.
-   `PaginationData.php`: Manages pagination information, including current page, total pages, and items per page.
-   `PaginationLinkData.php`: Handles pagination links for navigating between pages of results.
-   `ResponseMetaData.php`: Encapsulates metadata related to API responses, including status codes and messages.

##### 3. **Models**

-   `BaseModel.php`: The base model class that other domain models extend, providing shared functionality such as common query scopes and utility methods.

### User

The `app/Domain/User` directory is dedicated to managing user domain logic, including data management and role-based permissions. This directory encompasses all user-related functionality, ensuring that user management is modular and well-organized.

#### Purpose

The purpose of the `User` directory is to encapsulate all logic related to users, including managing their data, roles, and permissions. This ensures that user-related functionality is isolated and can be managed independently from other parts of the application.

#### Contents

-   **Description**: Manages user domain logic, including data management and role-based permissions.
-   **Purpose**: To handle all aspects of user management, from data storage and retrieval to role-based access control.
-   **Usage**: This directory includes models, services, and utilities specifically tailored to manage users and their roles within the application.

##### Roles Managed:

-   **Admin**: Users with the highest level of permissions, capable of managing all aspects of the application.
-   **Operator**: Users responsible for day-to-day operations, typically with elevated permissions.
-   **Member**: Regular users of the application with standard access rights.
-   **Customer**: Users who interact with the application primarily for purchasing or service usage.
-   **Client**: Business clients or partners with specific access rights.
-   **Worker**: Users who perform tasks or services within the application, often with limited permissions.
-   **Owner**: Users who own resources or entities within the application, with permissions to manage those resources.

## Customization

Customize your classes using the stubs provided in the `resources/stubs` directory.

-   **resources/stubs/ddd**: Stubs for generating DDD-related classes.
-   **resources/stubs/infrastructure**: Stubs for generating infrastructure-related classes.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss any changes.

## License

This project is licensed under the [MIT License](LICENSE).

ukuran APIMetaData = 300 - 320 byte
