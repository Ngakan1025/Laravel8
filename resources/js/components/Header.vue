<template>
  <nav>
    <router-link :to="{ name: 'home' }">Home</router-link>
    <router-link v-bind:to="{ name: 'about' }">About</router-link>
    <router-link :to="{ name: 'user' }">User</router-link>
  </nav>
</template>