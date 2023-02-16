<script>

import axios from 'axios';

export default{
  name: 'AppMovie',
  data(){
      return{
        movies:[]
      };
    
  },
  methods:{
      getMovies(){
          const url = 'http://localhost:8000/api/v1/movie/all';
          axios.get(url)
               .then(res=>{
                  const data = res.data;
                  const success = data.success;
                  this.movies = data.response;
                })
                .catch(err=> console.log(err));
    },
  },
  mounted(){
      this.getMovies();
  }
}
</script>

<template>

  <h1>ciao</h1>
  <ul>
    <li v-for="(movie, index) in movies" :key="index">
      <strong>Movie title:</strong> {{ movie.name }}
      <strong>Movie year:</strong> {{ movie.year }}
    </li>
    
  </ul>
</template>