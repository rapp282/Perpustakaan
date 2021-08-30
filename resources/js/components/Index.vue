<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'></div>
                <div class='card-body'>
                    <router-link :to="{ name: 'create' }" class="btn btn-primary">+ Tambah</router-link>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th>Nama Buku</th>
                                    <th width="200" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(buku, index) in bukus" :key="bukus.id">
                                    <td width="50" class="text-center">{{ index + 1 }}</td>
                                    <td>{{ bukus.nama_buku }}</td>
                                    <td width="200" class="text-center">
                                        <div class="btn-group">
                                            <router-link :to="{name: 'show', params: { id: bukus.id }}" class="btn btn-primary">Detail</router-link>
                                            <router-link :to="{name: 'edit', params: { id: bukus.id }}" class="btn btn-success">Edit</router-link>
                                            <button class="btn btn-danger" @click = "deletePost(bukus.id)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</template>

<script>
  export default {
      data() {
        return {
          bukus: []
        }
      },
      created() {
        let uri = 'api/buku';
        this.axios.get(uri).then(response => {
            this.bukus = response.data;
        });
    },
    methods: {
        deletePost(id)
        {
            this.$swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Kembali'
                }).then((result) => {
                if (result.value) {
                    this.$swal.fire({
                        title: 'Success!',
                        text: 'Buku deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `api/buku/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.bukus.splice(this.bukus.indexOf(id), 1);
                    });
                    console.log("Deleted Buku with id ..." +id);
                }
            })
        }
    }
  }
</script>
