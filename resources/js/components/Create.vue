<pre class="wp-block-syntaxhighlighter-code"><template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Create</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>

                        <form @submit.prevent="create">
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
                                &nbsp;
                                &nbsp;
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
        methods: {
            create(e){

                if (this.$data.bukus.nama_buku != null &amp;&amp; this.$data.bukus.penerbit != null &amp;&amp; this.$data.bukus.deskripsi != null) {
                    this.$swal.fire({
                        title: 'Success',
                        text: "Buku created successfully",
                        icon: 'success',
                        timer: 1000
                    })
                    let uri = '/api/buku/store';
                    this.axios.post(uri, this.bukus).then((response) => {
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
</script></pre>
