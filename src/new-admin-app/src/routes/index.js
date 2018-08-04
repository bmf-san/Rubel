import React, {Component} from "react";
import CreateCategory from "../views/category/CreateCategory";
import EditCategory from "../views/category/EditCategory";
import ListCategory from "../views/category/ListCategory";
import Dashboard from "../views/dashboard";
import Login from "../views/login";
import CreatePost from "../views/post/CreatePost";
import EditPost from "../views/post/EditPost";
import ListPost from "../views/post/ListPost";
import CreateSetting from "../views/setting/CreateSetting";
import EditSetting from "../views/setting/EditSetting";
import ListSetting from "../views/setting/ListSetting";
import CreateTag from "../views/tag/CreateTag";
import EditTag from "../views/tag/EditTag";
import ListTag from "../views/tag/ListTag";

const CreateCategoryComponent = (params) => (<CreateCategory {...params}/>);
const EditCategoryComponent = (params) => (<EditCategory {...params}/>);
const ListCategoryComponent = (params) => (<ListCategory {...params}/>);
const DashboardComponent = (params) => (<Dashboard {...params}/>);
const LoginComponent = (params) => (<Login {...params}/>);
const CreatePostComponent = (params) => (<CreatePost {...params}/>);
const EditPostComponent = (params) => (<EditPost {...params}/>);
const ListPostComponent = (params) => (<ListPost {...params}/>);
const CreateSettingComponent = (params) => (<CreateSetting {...params}/>);
const EditSettingComponent = (params) => (<EditSetting {...params}/>);
const ListSettingComponent = (params) => (<ListSetting {...params}/>);
const CreateTagComponent = (params) => (<CreateTag {...params}/>);
const EditTagComponent = (params) => (<EditTag {...params}/>);
const ListTagComponent = (params) => (<ListTag {...params}/>);

export const routes = [
  {
    path: "/login",
    component: LoginComponent
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
