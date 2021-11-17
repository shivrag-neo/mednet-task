<template>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Submission</h1>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Submission List
                                <button style="float: right;"  v-if=accessAdd type="button" class="btn btn-primary pull-right" v-on:click="addModal()">
                                    <b-icon icon="plus" aria-hidden="true"></b-icon> Add Submission</button>
                            </div>

                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Spaid</th>
                                            <th>Hostname</th>
                                            <th>Loopback</th>
                                            <th>Mac Address</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr v-for="submission in submissions" :key="submission.id">
                                            <td>{{ submission.sapid}}</td>
                                            <td>{{ submission.hostname}}</td>
                                            <td><code>{{ submission.loopback}}</code></td>
                                            <td><code>{{ submission.mac_address}}</code></td>
                                            <td>{{ submission.created_at | dateFormat}}</td>
                                            <td>{{ submission.updated_at | dateFormat}}</td>
                                            <td>

                                                <b-button  v-if=accessEdit v-on:click="editModal(submission)" variant="primary" class="mb-2"><b-icon icon="pencil-square" aria-hidden="true"></b-icon> Edit
                                                </b-button>

                                                <b-button v-if=accessDelete  v-on:click="deleteSubmission(submission.id)" variant="danger" class="mb-2"><b-icon icon="trash" aria-hidden="true"></b-icon> Delete {{  }}
                                                </b-button>

                                            </td>
                                        </tr>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="submissionModal" tabindex="-1" role="dialog" aria-labelledby="submissionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="submissionModalLabel" v-if="editMode">Edit Submission</h5>
                            <h5 class="modal-title" id="submissionModalLabel" v-else >Add Submission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form @submit.prevent="editMode ? updateSubmission() : createSubmission()" @keydown="form.onKeydown($event)">
                            <div class="modal-body">
                                <!-- Alert -->
                                <alert-error :form="form"></alert-error>

                                <div class="form-group">
                                    <input v-model="form.sapid" type="text" name="sapid" id="sapid"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('sapid') }" placeholder="Spaid">
                                    <has-error :form="form" field="sapid"></has-error>
                                </div>

                                <div class="form-group">
                                    <input v-model="form.hostname" type="text" name="hostname" id="hostname"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('hostname') }" placeholder="Hostname">
                                    <has-error :form="form" field="hostname"></has-error>
                                </div>

                                <div class="form-group">
                                    <input v-model="form.loopback" type="text" name="loopback" id="loopback"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('loopback') }" placeholder="Loopback">
                                    <has-error :form="form" field="loopback"></has-error>
                                </div>

                                <div class="form-group">
                                    <input v-model="form.mac_address" type="text" name="mac_address" id="mac_address"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('mac_address') }" placeholder="Mac Address">
                                    <has-error :form="form" field="mac_address"></has-error>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" v-if="editMode" >Update</button>
                                <button type="submit" class="btn btn-primary" v-else>Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal End /-->

        </div>
    </div>
</template>

<script>
    export default {

        mounted() {
          this.getSubmissions()
        },

        created() {
        },
        data() {
            return {
                baseUrl: process.env.MIX_APP_URL,
                submissions:{},
                options:{},
                editMode:false,
                addMode:false,
                accessAdd : true,
                accessEdit : true,
                accessDelete : true,
                form: new Form({
                    id: '',
                    sapid: '',
                    hostname: '',
                    loopback: '',
                    mac_address: '',
                }),
            }
        },

        methods: {

            addModal () {
                this.form.reset();
                this.form.clear();
                this.editMode = false;
                this.addMode = true;
                $("#submissionModal").modal('show');
            },

            editModal (data) {
                // Make a request for a get Submissions 
                this.form.reset();
                this.form.clear();
                this.form.fill(data);
                this.editMode = true;
                this.addMode = false;
                $("#submissionModal").modal('show');
            },

            createSubmission (event) {
                // Submit the form via a POST request
                this.$Progress.start();

                this.form.post(this.baseUrl+'/api/submissions')
                .then(({ data }) => { 
                    this.getSubmissions();
                    Toast.fire({ icon: 'success', title: 'Submission created successfully' });
                    $("#submissionModal").modal('hide');
                    this.$Progress.finish()
                })
                .catch((error)=>{
                    Swal.fire('Failed!', 'Something went wrong.', 'warning');
                    this.$Progress.finish()
                });
            },

            updateSubmission (event) {
                this.$Progress.start();  
                var URL = this.baseUrl+'/api/submissions/' + this.form.id; 
                this.form.put(URL)
                .then(({ data }) => { 
                    this.getSubmissions();
                    Toast.fire({ icon: 'success', title: 'Submission updated successfully' });
                    $("#submissionModal").modal('hide');
                    this.$Progress.finish()
                })
                .catch((error)=>{
                    Swal.fire('Failed!', 'Something went wrong.', 'warning');
                    this.$Progress.finish()
                });
                
            },

            deleteSubmission (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete(this.baseUrl+'/api/submissions/'+id).then(({data})=>{
                            this.getSubmissions();
                            Swal.fire('Deleted!', 'Submission has been deleted.', 'success')
                        }).catch(({data})=>{
                            Swal.fire('Failed!', 'Something went wrong.', 'warning')
                        });
                    }
                })
            },

            async getSubmissions () {
             let res =  await this.$http({ url: `submissions`,  method: 'GET'});
             this.submissions = res.data.submissions || {}; 
            },
        }
    }
</script>
