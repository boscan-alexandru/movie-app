<template>
    <div>
        <div v-for="movie in movies" :key="movie.id" class="card mt-3 border-0 ">
            <div class="card-body d-flex">
                <div class="pr-3">
                    <img :src="movie.image" alt="movie">
                </div>
                <div class="wrapper">
                    <h1 class="card-title">{{ movie.name }}</h1>
                    <h6 class="card-subtitle mb-2 d-flex">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#f5c518" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                        <p class="m-1">{{ movie.rating }}</p>
                    </h6>
                    <div class="types">
                        <p v-for="artist in movie.artists" :key="artist.title" class="card-text">
                            <span>{{ artist.title }}:</span>
                            {{ artist.name }}
                        </p>
                    </div>
                    
                    <button class="btn btn-warning pt-2 px-4 w-100">View More</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                movies: '',
            }
        },
        methods:{
            getMovies(){
                axios.get('/api/movies',
                    {headers: {"Content-Type": "multipart/form-data"}}
                ).then((response)=> {
                    this.movies = response.data
                    console.log(response.data)
                    if(response.success){
                        console.log(response.success)
                    }
                    
                }).catch((error)=>{
                    console.log(error.error)
                })
            }
        },
        mounted() {
            this.getMovies()
            console.log('%c Movies Loaded.', 'color: white; background-color: green; padding: 10px 40px; width: 100%;')
        }
    }
</script>
