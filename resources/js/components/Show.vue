<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Detail</div>
                    <div class='card-body'>
                        <div class='form-group'>
                            <label>Nama Buku</label>
                            <input type="text" class="form-control" id="nama_buku" v-model="bukus.nama_buku" disabled>
                        </div>
                        <div class='form-group'>
                            <label>Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" v-model="bukus.penerbit" disabled>
                        </div>
                        <div class='form-group'>
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" v-model="bukus.deskripsi" disabled>
                        </div>
                        <div class='form-group'>
                            <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                        </div>
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
        }
    },
    created() {
        let uri = `/api/buku/show/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.bukus = response.data;
        });
    },
    method: {

    }
  }
</script>
