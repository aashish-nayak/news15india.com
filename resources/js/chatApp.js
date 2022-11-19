/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 import { createApp } from 'vue';
 
 import chat from "./components/Chat.vue";
 import EmojiPicker from 'vue3-emoji-picker';
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = createApp({});
 
 app.component('chat', chat);
 app.component('EmojiPicker', EmojiPicker);
 
 app.mount("#app");