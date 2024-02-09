# Todo API

This is a simple CRUD API for managing todo items built using Laravel.

## API Endpoints

### Authentication
- `POST /api/register`: Register a new user.
- `POST /api/login`: Log in.
- `POST /api/logout`: Log out.

### Todo
- `GET /api/todos`: Retrieve all todo items for the authenticated user.
- `GET /api/todos/{id}`: Retrieve a specific todo item by ID.
- `POST /api/todos`: Create a new todo item.
- `PUT /api/todos/{id}`: Update an existing todo item.
- `DELETE /api/todos/{id}`: Delete a todo item by ID.

## Frontend (Vue.js)

The frontend of this application is developed using Vue.js and is located in the `view` submodule or you can click this link: https://github.com/juwitans/todoapp-view
