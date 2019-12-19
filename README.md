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
├── client     # Frontend
└── backend    # Backend ( laravel )
```
## Backend

- [Laravel](https://laravel.com/docs/6.x/structure)
- [Database structure](#Database-structure)
- [End-point API](#End-point-API)

### Database structure

- [users](#users)
- [groups](#groups)
- [group_members](#group_members)
- [group_score](#group_score)
- [group_questions](#group_questions)
- [questions](#questions)
- [question_location](#question_location)
- [places](#places)

#### users
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| name              | VARCHAR      |           | |
| username          | VARCHAR      | UNIQUE    | Remove space and lowercase of group name Ex: Hello World -> helloworld |
| email             | VARCHAR      | UNIQUE    | |
| email_verified_at | TIMESTAMP    |           | |
| password          | VARCHAR      |           | |
| api_token         | VARCHAR(100) |           | |
| remember_token    | VARCHAR(100) |           | |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |

#### groups
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| user_id           | BIGINT       |           | foreign key of id of [users](####users) |
| group_name        | VARCHAR      | UNIQUE    | |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |


#### group_members
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| group_id          | BIGINT       |           | foreign key of id of [groups](####groups) |
| name              | VARCHAR      |           | Ex: 26377 |
| student_id        | VARCHAR(5)   | UNIQUE    | |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |

#### group_score
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| group_id          | BIGINT       |           | foreign key of id of [groups](####groups) |
| score             | INTEGER      |           | |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |

#### group_questions
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| group_id          | BIGINT       |           | foreign key of id of [groups](####groups) |
| question_id       | BIGINT       |           | foreign key of id of [questions](####questions) |
| answer            | VARCHAR      |           | |
| score             | INTEGER      |           | |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |

#### questions
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| content           | VARCHAR      |           | |
| type              | TINYINTEGER  |           | |
| answer            | INTEGER      |           | |
| score             | INTEGER      |           | |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |

#### question_location
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| question_id       | BIGINT       | PK AI     | foreign key of id of [questions](#questions) |
| place_id          | BIGINT       |           | foreign key of id of [groups](#groups) |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |

#### places
| Column Name       | Data Type    | Propeties | Comment |
| ----------------- | ------------ | --------- | ------- |
| id                | BIGINT       | PK AI     | |
| name              | VARCHAR      |           | |
| created_at        | TIMESTAMP    |           | |
| updated_at        | TIMESTAMP    |           | |

### End-point API

- [Authorization API](#Authorization-api)
  - [Login](#Login)
  - [Register](#Register)
  - [Logout](#Logout)
- [Questions API](#Questions-api)
  - [Get Question](#Get-question)
  - [Answer Question](#Answer-question)
- [Scoreboard API](#Scoreboard-api)
  - [Get Scoreboard](#Get-scoreboard)

#### Authorization

##### Login
POST `/api/login`

Request data
```json
{
  username: "[string]",
  password: "[string]"
}
```

Response data

Code : `200`
```json
{
  result: "OK"
  data: {
    api_token: "[string]"
  }
}
```

Code : `403`
```json
{
  result: "FAIL"
}
```

##### Register
POST `/api/register`

Request data
```json
{
  group_name: "[string]",
  group_members: [
    { name: "[string]", student_id: "[integer]" },
    { name: "[string]", student_id: "[integer]" },
    { name: "[string]", student_id: "[integer]" },
    { name: "[string]", student_id: "[integer]" }
  ]
}
```

Response data

Code : `200`
```json
{
  result: "OK"
  data: {
    username: "[string]",
    password: "[string]"
  }
}
```

Code : `403`
```json
{
  result: "FAIL"
  data: {}
}
```

##### Logout
GET `/api/logout`

Response data

Code : `200`
```json
{
  result: "OK"
}
```

Code : `403`
```json
{
  result: "FAIL"
  data: {
    error_message: "user haven't login"
  }
}
```

#### Questions

##### Get question
GET `/api/game/questions`

Response data

Code : `200`
```json
{
  result: "OK"
  data: [
    { id: "[integer]", content: "[string]", score: "[integer]"},
    { id: "[integer]", content: "[string]", score: "[integer]"},
    { id: "[integer]", content: "[string]", score: "[integer]"},
    { id: "[integer]", content: "[string]", score: "[integer]"}
  ]
}
```

#### Answer question
POST `/api/game/question/answer`

Request data
```json
{
  id: "[integer]",
  answer: "[string]"
}
```

Response data

Code : `200`
```json
{
  result: "OK"
  data: {
    correct: "[boolean]"
  }
}
```

#### Scoreboard

##### Get scoreboard
GET `/api/game/scoreboard`

Response data

Code : `200`
```json
{
  result: "OK"
  data: [
    { group_name: "[string]", score: "[string]" },
    { group_name: "[string]", score: "[string]" },
    ...
  ]
}
```

##### Frontend
```sh
frontend/src
├── assets
├── layouts   
├── pages
├── components
├── router    # Vue Router
├── main.js
└── App.vue   # Frontend vue entry
```

### About the server
We have not developed the server. Server is not avaliable.