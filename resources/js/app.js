
import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import LoginComponent from './components/Authentication/Login.vue';
import ProfileComponent from './components/Profile.vue';
import NewsComponent from './components/News/News.vue';
import NewsDetailComponenet from './components/News/Detail.vue';


app.component('example-component', ExampleComponent);
app.component('login-component', LoginComponent);
app.component('profile-component', ProfileComponent);
app.component('news-component', NewsComponent);
app.component('news-detail-component', NewsDetailComponenet);

app.mount('#app');
