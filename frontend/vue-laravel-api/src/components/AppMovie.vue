<script>

import axios from 'axios';

export default{
  name: 'AppMovie',
  data(){
    return {

    }
  },
  mounted(){
    axios.get('http://localhost:8000/api/v1/movie/all')
         .then(res=>{
            const data = res.data;
            const success = data.success;
            const movies = data.response;

            console.log(movies);
          })
          .catch(err=> console.log(err));
  }
}
</script>

<template>

  <h1>ciao</h1>
</template>