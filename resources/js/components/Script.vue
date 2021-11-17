<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header"> <h3>Shell script to generate n num of records</h3></div>
            <div class="card-body">
                <p>Open  <kbd>Terminal</kbd> and run below commands : </p>
                <b> Step 1 : </b> PHP shell <p><code> php artisan tinker</code></p><hr>
                <b> Step 2 a : </b> Script to create 10 router records <p><code> factory(App\Router::class, 10)->create() </code></p><hr>
                <b> Step 2 b : </b> Script to create 10 user records <p><code> factory(App\User::class, 10)->create() </code></p><hr>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      //
    }
  }
</script>