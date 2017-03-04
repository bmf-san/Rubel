**Under Development**

# Table Of Contents
+ [Post](#post)
+ [Category](#category)
+ [Tag](#tag)

# Post

## Create a post

### URL
+ `/admin/post/create`
+ Required: `id=[integer]`

### Method
+ `GET`

### Request
+ **Content:**
```
{
  "admin_id": 1,
  "category_id": 1,
  "title": "here is a title",
  "content": "here is contents",
  "thumb_img_path": "/path/to/thumb_img_path",
  "status": "public",
  "tag": [
    {
      "name": "new-or-old-tag-name"
    },
    {
      "name": "new-or-old-tag-name-2"
    }
  ]
}
```

### Success Response
+ **Code:** `200`
+ **Content:**
```
{
  "id": 1
}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Edit a post

### URL
+ `/admin/post/:id/edit`
+ Required: `id=[integer]`

### Method
+ `GET`

### Request
+ **Content:**
```
{
  "admin_id": 1,
  "category_id": 1,
  "title": "here is a title",
  "content": "here is contents",
  "thumb_img_path": "/path/to/thumb_img_path",
  "status": "public",
  "tag": [
    {
      "name": "new-or-old-tag-name"
    },
    {
      "name": "new-or-old-tag-name-2"
    }
  ]
}
```

### Success Response
+ **Code:** `200`
+ **Content:**
```
{
  "id": 1
}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Update publication status of post

### URL
+ `/admin/post/:id/status`
+ Required: `id=[integer]`

### Method
+ `GET`

### Requst
+ **Content:**
```
{
  "status": "public"
}
```

### Success Response
+ **Code:** `200`
+ **Content:**
```
{
  "id": 1
}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Delete a post

### URL
+ `/admin/post/:id`
+ Required: `id=[integer]`

### Method
+ `DELETE`

### Success Response
+ **Code:** `200`
+ **Content:**
```
{}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Show posts

### URL
+ `/posts`
+ Required: `id=[integer]`
+ Parameter: `?page=[integer]`

### Method
+ `GET`

### Success Response
+ **Code:** `200`
+ **Content:**
```
[
  {
    "id": 1,
    "admin":{
      "id": 1,
      "name": "bmf",
      "email": "bmf.infomation@gmail.com",
      "created_at": "2017-02-19 02:41:30",
      "updated_at": "2017-02-19 02:41:30"
    },
    "category":{
      "id": 1,
      "name": "category-1",
      "created_at": "2017-02-19 02:41:30",
      "updated_at": null,
      "deleted_at": null
    },
    "title": "Title-1",
    "content": "This is 1 content.",
    "thumb_img_path": "http://sns-gazo.co/twitterheader/images/new/twitter-new-header_01994.jpg",
    "status": "draft",
    "tags":[
      {
        "id": 1,
        "name": "tag-1",
        "created_at": "2017-02-19 02:41:30",
        "updated_at": null,
        "deleted_at": null
      }
    ],
    "publication_date": "2017-02-19 02:41:30"
  },
  {
    "id": 1,
    "admin":{
      "id": 1,
      "name": "bmf",
      "email": "bmf.infomation@gmail.com",
      "created_at": "2017-02-19 02:41:30",
      "updated_at": "2017-02-19 02:41:30"
    },
    "category":{
      "id": 2,
      "name": "category-2",
      "created_at": "2017-02-19 02:41:30",
      "updated_at": null,
      "deleted_at": null
    },
    "title": "Title-2",
    "content": "This is 2 content.",
    "thumb_img_path": "http://sns-gazo.co/twitterheader/images/new/twitter-new-header_01994.jpg",
    "status": "draft",
    "tags":[
      {
        "id": 2,
        "name": "tag-2",
        "created_at": "2017-02-19 02:41:30",
        "updated_at": null,
        "deleted_at": null
      }
    ],
    "publication_date": "2017-02-19 02:41:30"
  }
]
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
  {
    "message": "NOT FOUND",
    "errors": []
  }
```

## Show a post

### URL
+ `/post/:id`

### Method
+ `GET`

### Success Response
+ **Code:** `200`
+ **Content:**
```
{
  "id": 1,
  "admin":{
    "id": 1,
    "name": "bmf"
  },
  "category":{
    "id": 1,
    "name": "category-1",
    "created_at": "2017-02-19 01:10:10",
    "updated_at": null,
    "deleted_at": null
  },
  "title": "Title-1",
  "content": "This is 1 content.",
  "thumb_img_path": "http://sns-gazo.co/twitterheader/images/new/twitter-new-header_01994.jpg",
  "status": "draft",
  "tags":[
    {
      "id": 1,
      "name": "tag-1",
      "created_at": "2017-02-19 02:41:30",
      "updated_at": null,
      "deleted_at": null
    },
    {
      "id": 2,
      "name": "tag-2",
      "created_at": "2017-02-19 02:41:30",
      "updated_at": null,
      "deleted_at": null
    }
  ],
  "publication_date": "2017-02-19 02:41:30"
}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

****

# Category
## Create a category

### URL
+ `/admin/category/create`
+ Required: `id=[integer]`

### Method
+ `GET`

### Request
+ **Content:**
```
{
  "name": "new-categorys"
}
```

### Success Response
+ **Code:** `200`
+ **Content:**
```
{
  "id": 1
}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Edit a category

### URL
`/admin/category/:id/edit`
Required: `id=[integer]`

### Method
+ `GET`

### Request
+ **Content:**
```
{
  "name": "new-categorys"
}
```

### Success Response
+ **Code:** `200`
+ **Content:**
```
{
  "id": 1
}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Delete a category

### URL
+ `/admin/category/:id`
+ Required: `id=[integer]`

### Method
+ `DELETE`

### Success Response
+ **Code:** `200`
+ **Content:**
```
{}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Show categories

### URL
+ `/categories`

### Method
+ `GET`

### Success Response
+ **Code:** `200`
+ **Content:**
```
[
  {
    "id": 1,
    "name": "Uncategorized",
    "created_at": "2017-02-19 04:00:28",
    "updated_at": null,
    "deleted_at": null
  },
  {
    "id": 2,
    "name": "category-2",
    "created_at": "2017-02-19 04:00:28",
    "updated_at": null,
    "deleted_at": null
  }
]
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
  {
    "message": "NOT FOUND",
    "errors": []
  }
```

****

# Tag
## Edit a tag

### URL
+ `/admin/tag/:id/edit`
+ Required: `id=[integer]`

### Method
+ `GET`

### Request
+ **Content:**
```
{
  "name": "new-tag"
}
```

### Success Response
+ **Code:** `200`
+ **Content:**
```
{
  "id": 1
}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Delete a tag

### URL
+ `/admin/category/:id`
+ Required: `id=[integer]`

### Method
+ `DELETE`

### Success Response
+ **Code:** `200`
+ **Content:**
```
{}
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
{
  "message": "NOT FOUND",
  "errors": []
}
```

## Show tag

### URL
+ `/tags`

### Method
+ `GET`

### Success Response
+ **Code:** `200`
+ **Content:**
```
[
  {
    "id": 1,
    "name": "tag-1",
    "created_at": "2017-02-19 04:00:28",
    "updated_at": null,
    "deleted_at": null
  },
  {
    "id": 2,
    "name": "tag-2",
    "created_at": "2017-02-19 04:00:28",
    "updated_at": null,
    "deleted_at": null
  }
]
```

### Error Response
+ **Code:** `404 NOT FOUND`
+ **Content:**
```
  {
    "message": "NOT FOUND",
    "errors": []
  }
```
