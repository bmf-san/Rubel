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

const CreateCategory = (params) => (<CreateCategory {...params}/>);
const EditCategory = (params) => (<EditCategory {...params}/>);
const ListCategory = (params) => (<ListCategory {...params}/>);
const Dashboard = (params) => (<Dashboard {...params}/>);
const Login = (params) => (<Login {...params}/>);
const CreatePost = (params) => (<CreatePost {...params}/>);
const EditPost = (params) => (<EditPost {...params}/>);
const ListPost = (params) => (<ListPost {...params}/>);
const CreateSetting = (params) => (<CreateSetting {...params}/>);
const EditSetting = (params) => (<EditSetting {...params}/>);
const ListSetting = (params) => (<ListSetting {...params}/>);
const CreateTag = (params) => (<CreateTag {...params}/>);
const EditTag = (params) => (<EditTag {...params}/>);
const ListTag = (params) => (<ListTag {...params}/>);

export const routes = [
  {
    path: "/login",
    component: Login
  } {
    path: "/",
    component: Dashboard
  }, {
    path: "/posts",
    component: ListPost
  }, {
    path: "/posts/create",
    component: CreatePost
  }, {
    path: "/posts/:id/edit",
    component: EditPost
  }, {
    path: "/categories",
    component: ListCategory
  }, {
    path: "/categories/create",
    component: CreateCategory
  }, {
    path: "/categories/edit",
    component: EditCategory
  }, {
    path: "/tags",
    component: ListTag
  }, {
    path: "/tags/create",
    component: CreateTag
  }, {
    path: "/tags/:id/edit",
    component: EditTag
  }, {
    path: "/settings",
    component: ListSetting
  }, {
    path: "/settings/create",
    component: CreateSetting
  }, {
    path: "/settings/:id/edit",
    component: EditSetting
  }
];
