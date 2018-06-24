import React, {Component} from "react";
import CreateCategory from "./views/category/CreateCategory";
import EditCategory from "./view/category/EditCategory";
import ListCategory from "./views/category/ListCategory";
import Dashboard from "./views/dashboard";
import Login from "./views/login";
import CreatePost from "./view/post/CreatePost";
import EditPost from "./views/post/EditPost";
import ListPost from "./views/post/ListPost";
import CreateSetting from "./views/setting/CreatePost";
import EditSetting from "./views/setting/EditPost";
import ListSetting from "./views/setting/ListSetting";
import CreateTag from "./views/tag/CreateTag";
import EditTag from "./views/tag/EditTag";
import ListTag from "./views/tag/ListTag";

const CreateCategoryComponent = (params) => (<CreateCategoryComponent {...params}/>);
const EditCategoryComponent = (params) => (<EditCategoryComponent {...params}/>);
const ListCategoryComponent = (params) => (<ListCategoryComponent {...params}/>);
const DashboardComponent = (params) => (<DashboardComponent {...params}/>);
const LoginComponent = (params) => (<LoginComponent {...params}/>);
const CreatePostComponent = (params) => (<CreatePostComponent {...params}/>);
const EditPostComponent = (params) => (<EditPostComponent {...params}/>);
const ListPostComponent = (params) => (<ListPostComponent {...params}/>);
const CreateSettingComponent = (params) => (<CreateSettingComponent {...params}/>);
const EditSettingComponent = (params) => (<EditSettingComponent {...params}/>);
const ListSettingComponent = (params) => (<ListSettingComponent {...params}/>);
const CreateTagComponent = (params) => (<CreateTagComponent {...params}/>);
const EditTagComponent = (params) => (<EditTagComponent {...params}/>);
const ListTagComponent = (params) => (<ListTagComponent {...params}/>);

export const routes = [
  {
    path: "/login",
    component: Login
  }, {
    path: "/",
    component: DashboardComponent
  }, {
    path: "/posts",
    component: ListPostComponent
  }, {
    path: "/posts/create",
    component: CreatePostComponent
  }, {
    path: "/posts/:id/edit",
    component: EditPostComponent
  }, {
    path: "/categories",
    component: ListCategoryComponent
  }, {
    path: "/categories/create",
    component: CreateCategoryComponent
  }, {
    path: "/categories/edit",
    component: EditCategoryComponent
  }, {
    path: "/tags",
    component: ListTagComponent
  }, {
    path: "/tags/create",
    component: CreateTagComponent
  }, {
    path: "/tags/:id/edit",
    component: EditTagComponent
  }, {
    path: "/settings",
    component: ListSettingComponent
  }, {
    path: "/settings/create",
    component: CreateSettingComponent
  }, {
    path: "/settings/:id/edit",
    component: EditSettingComponent
  }
];
