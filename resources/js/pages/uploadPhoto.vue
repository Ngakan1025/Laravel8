<template>
  <div>
    <h3>Upload Photo</h3>
    <img :src="previewimage" width="100" />
    <div>
      <input type="file" name="photo" @change="upload" />
    </div>
    <button @click="submit">Upload</button>
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      previewimage: null,
      photo: null,
    };
  },
  methods: {
    upload(e) {
      let files = e.target.files[0];
      this.previewimage = URL.createObjectURL(files);
      this.photo = files;
    },
    submit() {
      let formData = new FormData();
      formData.append("photo", this.photo);
      axios.post("/api/users/photo/" + this.id, formData).then((response) => {
        if (response.data.status) {
          alert(response.data.message);
          this.$router.push({
            name: "profile",
            params: { id: this.id },
          });
        }
      });
    },
  },
};
</script>