<template>
    <section id="home">
        <div class="container-fluid pl-0 pr-0">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <video controls class="w-100 video-fluid" autoplay >
                            <source src="img/video.mp4" type="video/mp4"/>
                        </video>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/slider.png" alt="First slide">
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="width:1%;">
                    <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="width:1%;">
                    <span class="carousel-control-next-icon" aria-hidden="false"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="zona-1">
                <div class="row p-0 m-0 " v-for="(content,index) in contents">
                    <template > <!-- v-if="!editing" -->
                        <div class="col-sm-12 col-md-6 col-lg-5  text-center align-self-center">
                            <h3>{{content.title}}</h3>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-5 align-self-center">
                            <p><h4>{{content.description}}</h4></p>
                        </div>
                         <div class="col-sm-12 col-md-6 col-lg-2 align-self-center">
                            <button type="button" class="btn btn-danger ml-auto mr-auto d-block">{{content.detailbutton.button_name}}</button>
                         </div>
                         <button class="btn btn-info" style="margin: 10px" @click="edit" v-if="admin"><i class="fas fa-pencil-alt"></i></button>
                    </template>
                    <!-- <template v-else>
                        <div class="col-sm-12 col-md-6 col-lg-5  text-center align-self-center">
                            <h3><input class="form-control" type="text" v-model="draft.title"></h3>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-5 align-self-center">
                            <P><h4><textarea class="form-control" v-model="draft.description"></textarea></h4></P>
                        </div>
                         <div class="col-sm-12 col-md-6 col-lg-2 align-self-center">
                            <input class="form-control" type="text" v-model="draft.button">
                         </div>
                         <button class="btn btn-success" @click.prevent="save"><i class="fas fa-check"></i></button>
                         <button class="btn btn-danger" @click.prevent="cancel"><i class="fas fa-ban"></i></button>
                    </template> -->
                </div>
            </div>
        </div>
    </section>
</template>
<script>
let marked = require('marked');
    export default{
        props:['component'],
        data(){
            return{
                currentContent: 0,
                showModal:false,
                someData:null,
                admin: false,
                section:1,
            }
        },
        mounted(){
            
        },
        methods:{
            
            setCurrent(index){
                this.currentContent = this.contents[index]['detailmodal'];
                this.$refs.modal1.show()
            },

            hideModal(){
                this.$refs.modal1.hide()
            },

        },
        computed: {
            contentExpanded() {
              marked.setOptions({
                renderer: new marked.Renderer(),
                gfm: true,
                tables: true,
                breaks: true,
                pedantic: false,
                sanitize: true,
                smartLists: true,
                smartypants: false
              });
              return marked(this.currentContent ? this.currentContent.modal_text : '' )
             },contents(){
                var list_components=this.$store.getters.getComponents(this.section);
                return list_components.components;
             }
        },
    }
    // export default{
    //     data(){
    //         return{
    //             admin: false,
    //             editing: false,
    //             content:{
    //                 title: 'LLAMANOS AL 915-543-9100',
    //                 description: 'Somos un gran equipo trabajando para ti, brindamos servicios de clase mundial con calidad y seguridad a nuestros clientes. Proporcionamos la mejor estrategia jurídica para solucionar tus problemas en materia migratoria.',
    //                 button: 'Contáctanos',
    //             },
    //             draft: null,
    //         }
    //     },
    //     methods:{
    //         edit(){
    //             this.draft = clone(this.content)
    //             this.editing = true
    //         },
    //         save(){
    //             this.content = this.draft
    //             this.editing = false
    //         },
    //         cancel(){
    //             this.editing = false
    //         }
    //     }
    // }
</script>