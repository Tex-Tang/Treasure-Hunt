# Treasure-Hunt
Treasure Hunt Game for orientation day.

## Technologies

Let's talk about the coarse architecture of this mono repo:

- **PHP**: We use PHP to power our servers, and Vue to power our frontend.
- **Mysql** : Data storage
- **Vue** : Frontend
- **Laravel** : Backend framework

## Folder structure

```sh
TodoList
├── frontend   # Frontend
└── backend    # Backend ( laravel )
```
## Backend
Check it out [here](https://laravel.com/docs/6.x/structure)!

### Database structure
#### Users
| Column Name | Data Type | Propeties |
| ----------- | --------- | --------- |
| id          | BIGINT    | PK AI     |
| name        | VARCHAR   |           |
| email       | VARCHAR   | UNIQUE    |
| email_verified_at | TIMESTAMP | |
| password | VARCHAR | |
| remember_token | VARCHAR(100) | |
| created_at | TIMESTAMP | |
| updated_at | TIMESTAMP | |


##### Frontend
```sh
frontend/src
├── api       # Frontend API
├── assets
├── layouts   
├── pages
├── router    # Vue Router
├── utils
└── App.vue   # Frontend vue entry
```

### About the server
We have not developed the server. Server is not avaliable.