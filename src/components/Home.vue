<template>
  <div class="d-flex flex-column align-items-center justify-content-center text-center bg-dark text-white" style="min-height: 100vh;">
    <h1 class="mb-2">Selamat datang, {{ username }}!</h1>
    <p class="text-light mb-4">Kamu berhasil login ke aplikasi.</p>

    <button class="btn btn-outline-light" @click="logout">
      Logout
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: localStorage.getItem('username') || ''
    }
  },
  methods: {
    logout() {
      localStorage.removeItem('username');
      this.$router.push('/login');
    }
  }
}
</script>