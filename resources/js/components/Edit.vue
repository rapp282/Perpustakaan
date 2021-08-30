<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Edit Article</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>

                        <form @submit.prevent="update">
                            <div class='form-group'>
                                <label>Nama Buku</label>
                                <input type="text" class="form-control" id="nama_buku" v-model="bukus.nama_buku">
                            </div>
                            <div class='form-group'>
                                <label>Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" v-model="bukus.penerbit">
                            </div>
                            <div class='form-group'>
                                <label>Penerbit</label>
                                <input type="text" class="form-control" id="deskripsi" v-model="bukus.deskripsi">
                            </div>
                            <div class='form-group'>
                                <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>


                                <button class='btn btn-primary'>Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    const a = {}
      console.log(a.b?.c)

    export default {
        data(){
        return {
            bukus:{},
            errors: [],
            nama_buku: null,
            penerbit: null,
            deskripsi: null,
        }
    },
    created() {
        let uri = `/api/buku/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.bukus = response.data;
        });
    },
    methods: {
        update(e){

            if (this.$data.bukus.nama_buku != null &amp;&amp; this.$data.bukus.penerbit != null &amp;&amp; this.$data.bukus.deskripsi != null) {
                this.$swal.fire({
                    title: 'Success',
                    text: "Buku created successfully",
                    icon: 'success',
                    timer: 1000
                });
                let uri = `/api/buku/update/${this.$route.params.id}`;
                this.axios.put(uri, this.bukus).then((response) => {
                    this.$router.push({name: 'home'});
                });
                return true;
            }


            this.errors = [];

            if (!this.nama_buku) {
                this.errors.push('Nama Buku wajib diisi !');
            }
            if (!this.penerbit) {
                this.errors.push('Penerbit wajib diisi !');
            }
            if (!this.deskripsi) {
                this.errors.push('Deskripsi wajib diisi !');
            }

            e.preventDefault();
        }
    }
  }
</script>
