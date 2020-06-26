#  PHP(Symfony) JS( Vuejs(Vuetify) ) 

Soo my boss decided  that our next SaaS should be in the stack PHP Symfony with a front-end technology that uses Javascript Vue.js Library (Yep atleast one decision that makes sense)  , don't ask me why PHP im not the decision maker.
After hours online trying to look for a tutorial that integrated both stacks, i found a few that tried to but werent up to date and werent fully integrating both technologies to the fullest, Inspired by a few tutorials i decided to make my own just incase anybody found themself in the same situation and need some guidlines on how to integrate them.
This isnt a full project with an ORM, a database or  business logic just a small setup so that both technology can speak between them.
 It doesnt require a intermediate understanding of both stack to go thru the tutorial but to be able to move forward with the skeleton and uses for a specific business logic an understand of both stacks is without a question.
 ## BACK-END
 (You need to have installed PHP the latest-stable version the better)
 ### Installing Symphony
 
 LinuxOS the command : 
  ```
  wget https://get.symfony.com/cli/installer -O - | bash
```
MacOS the command : 
  ```
 curl -sS https://get.symfony.com/cli/installer | bash
 ```
Head to this link if you need more information :
https://symfony.com/download

After installing Symfony CLI, you will be able to create a new projet.
```
symfony new --full name_of_your_project
```
#### Installing Encore component
Symfony has a fast library of component, we are gonna be using encore-webpack, a component that will connect our back en front, if you are familiar with axios it is the same principle but the setups are different.
```
composer require symfony/webpack-encore-bundle
```
After running the previous command do not forget to : 
``` 
npm install
```
Once the process is done at the root of your project find the file webpack.config.js and add this line to the file (webpack will enable the usage of Vuejs)
```
.enableVueloader()
```
We need to install additional npm modules to integrate all of this :
```
npm install vue-loader@^15.0.11 vue-template-compiler --save-dev
npm install @symfony/webpack-encore vue vue-router vuetify
```
All of this steps are necessary for our component Encore that we installed using composer the understand and compile Vue templates. vue-router is to setup our front side routing logic.
#### Twig
Twig is a template language for PHP we are going to use it to push our content.
Find in your templates folder the file base.html.twig if doesnt exist create the file and insert this :

```
//path = ./templates/base.html.twig

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Home{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
    </head>
    <body>
        {% block content %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>

```
The Next step is to create our file app.html.twig, this file is our entry point using Encore for the content on our Vue components. (certaine people rather call the file from a js project main.js or app.js you can name it how you want to, but make sure you call the right files when necessary). Like you have noticed we call on our base.html.twig file : 
```
//path = ./templates/app.html.twig
{% extends 'base.html.twig' %}
{% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
{% endblock %}
{% block content %}
    <div id="app">
    </div>
{% endblock %}
{% block javascripts %}
     {{ encore_entry_script_tags('app') }}
{% endblock %}
```
#### Symfony Routing logic
There is multiple ways of implementing this but i rather use this method :
```
//path = ./config/routes
index:
    path: /
    controller: App\Controller\DefaultController::index
```
#### Default Controller
From that we can now create our first controller that has our index method from the default controller(you can add more controller later on with the same logic) :
```
//path = ./src/Controller/DefaultController.php
<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    class BaseController extends AbstractController
    {
        public function index()
        {
            return $this->render('app.html.twig');
        }
    }
    
?>
```

Now that our router system from our back-end is directed on our template that we created we can now move on to the vuejs side of our application.

 ## FRONT-END
The npm command we did early created the necessary files and installed the modules we need, now lets do some editing, find your app.js file add those lines to it :

```
//path = ./assets/js/app.js or main.js (whatever you want to name it)

import Vue from 'vue'
import Vuetify from 'vuetify';
import Routes from './routes.js';
import App from './views/App';
import 'vuetify/dist/vuetify.min.css'


Vue.config.productionTip = false
Vue.use(Vuetify);

const app = new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    router: Routes,
    render: h => h(App)
});

export default app;
```
#### Unfortunately the usual directory structure we are use to on vuejs app wasn't installed
We need to set up our directory for our front end assets.
It shoud look like this (Create the missing files and directories) : 
```
|assets
|--js
|  |--components
|  |--layouts
|  |--pages
|  |--stores
|  |app.js
|  |App.vue
|  |routes.js
```

#### Components logic :
After you r done creating everything edit your App.vue file

```
//path = ./assets/js/App.vue
<template>
    <v-app>
        <v-main>
            <v-container fluid>
                <router-view>

        <!---             <router-link to="<my_route>">My Component</router-link> -->
                </router-view>
            </v-container>
        </v-main>
    </v-app>
</template>
<script>
export default {
    name: "App"
}
</script>
<style scoped>

</style>

```
Like you have noticed this is going to be our point of access to the Vue application

Time to create our first component : 
```
//path = ./assets/js/components/Home.vue
<template>
    <div>
        Home Component content  by : 
    {{author_Name}} :)
    </div>
</template>
<script>
export default {
    name: 'Home',
    data() {
        var data = {
            author_Name: "Dezz",
        };
        return data;
    }
}
</script>
</style>
<style scoped>
```
#### Vue Router logic :
we previously created a routes.js file it is time to edit your routes file
```
//path = ./assets/js/routes.js
import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './components/Home'
import Login from './components/Login'
Vue.use(VueRouter)

const router = new VueRouter({
  //  mode: 'history',
    routes:
    [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
      //  {
        //    path: '/login',
          //  name: 'Login',
           // component: Login
        // }
    ]
})

export default router

```
If needed i created a login route, so you can see the logic for future components, all you have to do is to uncomment it  :).

 ## ALMOST DONE :)
 Now that every thing is setup, we should launch again composer/npm to make sure everything is installed
 #### Compiling front-end :
 if you are familiar with Nodejs Vuejs or ReactJs, you have noticed that our front side is using webpack, so all you have to do is to call on our friendly buddy npm : 
 ```
npm run dev // develoment 
npm run build // production
```
During develoment its better to use :
 ```
npm run watch 
```
We are using Encore to watch our JS so every changes is ini real time : )
#### Symfony Server :
 ```
symfony server:start
```
And thats done, depending on what port you symfony is listening to you can find your project on your browser.
If you have followed the steps, everything should be fine if not my means, i may have type the wrong key or whatever, so debugging comes in play but i doubt it would take you more than 10min ;).
 
