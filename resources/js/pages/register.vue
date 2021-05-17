<template>
  <div>
    <h1>Register</h1>
    <form @submit.prevent="handleSubmit" action="/users" method="POST">
      <div class="input-group">
        <label>Name: </label>
        <input type="text" v-model="form.name" />
        <div class="error" v-if="errors.name">
          {{ errors.name[0] }}
        </div>
      </div>
      <div class="input-group">
        <label>Email: </label>
        <input type="text" v-model="form.email" />
        <div class="error" v-if="errors.email">
          {{ errors.email[0] }}
        </div>
      </div>
      <div class="input-group">
        <label>Password: </label>
        <input type="text" v-model="form.password" />
        <div class="error" v-if="errors.password">
          {{ errors.password[0] }}
        </div>
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
      },
      errors: {},
    };
  },
  methods: {
    handleSubmit() {
      console.log(this.form);
      axios
        .post("/api/users", this.form)
        .then((response) => {
          if (response.data.status) {
            console.log(response);

            alert(response.data.message);
            this.$router.push({
              name: "user",
            });
          }
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
  },
};
</script>

<style>
.input-group {
  margin-bottom: 5px;
}
</style>