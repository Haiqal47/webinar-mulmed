# API SPECIFICATION

## CREATE BOOK

-   endpoint: /books
-   Request Method: POST
-   Request body:

```json
{
    "title": "string, required",
    "author": "string, required",
    "year": "string, required",
    "description": "string, required",
    "publisher": "string, required",
    "pages": "integer, required",
    "language": "string, required",
    "volume": "integer, optional"
}
```

-   Response body:

```json
{
    "id": "integer",
    "title": "string",
    "author": "string",
    "year": "string",
    "description": "string",
    "publisher": "string",
    "pages": "integer",
    "language": "string",
    "volume": "integer",
    "created_at": "date",
    "updated_at": "date"
}
```
