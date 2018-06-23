import React, {Component} from "react";
import Home from "./Home";
import Dashboard from "./Dashboard";
import Profile from "./Profile";
import Post from "./Post";

const HomeComponent = (params) => (<Home {...params}/>);
const DashboardComponent = (params) => (<Dashboard {...params}/>);
const ProfileComponent = (params) => (<Profile {...params}/>);
const PostComponent = (params) => (<Post {...params}/>);

export const routes = [
  {
    path: "/",
    action: HomeComponent
  }, {
    path: "/dashboard",
    action: DashboardComponent
  }, {
    path: "/profile",
    action: ProfileComponent
  }, {
    path: "/post/:id",
    action: PostComponent
  }
];
