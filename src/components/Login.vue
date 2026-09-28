<template>
  <div class="d-flex align-items-center justify-content-center bg-dark" style="min-height: 100vh;">
    <div class="card p-4 p-md-5 shadow" style="width: 100%; max-width: 360px;">
      <h2 class="mb-1">Masuk</h2>
      <p class="text-muted mb-4">Isi akunmu untuk melanjutkan</p>

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input v-model="username" type="text" class="form-control" placeholder="Masukkan username" />
      </div>

      <div class="mb-4">
        <label class="form-label">Password</label>
        <input v-model="password" type="password" class="form-control" placeholder="Masukkan password" />
      </div>

      <button class="btn btn-dark w-100" @click="handleLogin">Masuk</button>

      <p v-if="pesan" class="text-danger text-center mt-3 mb-0">{{ pesan }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: '',
      pesan: ''
    }
  },
  methods: {
    handleLogin() {
      // Akun yang boleh masuk (dicek langsung di sini, tanpa API)
      const usernameValid = 'zikal'
      const passwordValid = 'zikal11'

      const username = this.username.trim()
      const password = this.password.trim()

      if (!username || !password) {
        this.pesan = 'Username dan password wajib diisi'
        return
      }

      if (username === usernameValid && password === passwordValid) {
        localStorage.setItem('username', username)
        this.$router.push('/home')
      } else {
        this.pesan = 'Username atau password salah'
      }
    }
  }
}
</script>