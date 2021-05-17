<template>
  <div>
    <section v-if="id">
      <img
        v-if="detailuser.photo"
        :src="'/images/' + detailuser.photo"
        width="100"
      />
      <h1>Hello {{ detailuser.name }}</h1>
      <p>
        Email : <strong>{{ detailuser.email }}</strong>
      </p>
      <router-link :to="{ name: 'user' }">kembali</router-link>
      <router-link :to="{ name: 'upload', params: { id: detailuser.id } }"
        >upload</router-link
      >
      <a href="/user" @click="handlingDelete">delete</a>
      <a href="" @click="Edit">edit</a>
      <!-- <router-link :to="{ name: 'edit' }">edit</router-link> -->
    </section>
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      detailuser: {},
    };
  },
  mounted() {
    this.getUser();
  },
  methods: {
    getUser() {
      axios.get("/api/users/" + this.id).then((response) => {
        this.detailuser = response.data;
      });
    },
    handlingDelete() {
      if (confirm("Yakin Hapus?")) {
        axios.delete("/api/users/" + this.id).then((response) => {
          if (response.data.status) {
            alert(response.data.message);
            this.$router.push({
              name: "user",
            });
          }
        });
      } else {
        return false;
      }
    },
    Edit() {
      this.$router.push({
        name: "edit",
        params: {
          id: this.id,
        },
      });
    },
  },
};
</script>