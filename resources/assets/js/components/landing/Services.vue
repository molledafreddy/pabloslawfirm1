<template>
    <section id="services" class="zona-3" >
        <div class="py-5">
            <H2><strong>NUESTROS SERVICIOS</strong></H2>  
        </div>
        <div class="container-fluid pr-0 pl-0">
            <button v-if="admin" class="btn btn-danger text-center align-self-center" style="margin: 10px" @click.prevent="showModal = true">Add Services</button>
            <new-services :show="showModal" @close="showModal = false"/>
            <div class="row py-3">
                <transition-group v-bind:name="effect" class="row">
                <div v-for="(content,index) in contents" :key="index" tag="div"  class="text-center col-compo col-sm-12 col-md-6 " >
                        <img  class="img-fluid m-5 services pic" :src="content.image" style="height: 100px; width=100px">
                        <h3>{{content.title}}</h3>
                        <p class="text-justify">{{content.description}}</p>
                        <button type="button" class="btn btn-danger ml-auto mr-auto d-block" v-if="content.detailmodal.modal_text" 
                            style="margin-bottom: 10px" @click="setCurrent(index)">{{content.detailbutton.button_name}}</button>

                        <a :href="content.detailbutton.button_link" class="btn btn-danger ml-auto " v-if="content.detailbutton.button_link" style="margin-bottom: 10px">
                            {{content.detailbutton.button_name}}
                        </a>
                </div>
                </transition-group>

                   <!--  v-if="content.id!=draft.id"  -->
                        <!--<img  class="img-fluid m-5 services pic" :src="content.image" style="height: 100px; width=100px">
                        <h3>{{content.title}}</h3>
                        <p class="text-justify">{{content.description}}</p>
                            <button type="button" class="btn btn-danger ml-auto mr-auto d-block" v-if="content.detailmodal.modal_text" 
                                style="margin-bottom: 10px" @click="setCurrent(index)">{{content.detailbutton.button_name}}</button>

                            <a :href="content.detailbutton.button_link" class="btn btn-danger ml-auto " v-if="content.detailbutton.button_link" style="margin-bottom: 10px">
                                {{content.detailbutton.button_name}}
                            </a>-->
                        <!--<template v-if="admin">
                            <button class="btn btn-info" @click="edit(content)"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger" @click.prevent="remove(content.id)" @click="$loading.startLoading('deleteComponent'+content.id)" :disabled="$loading.isLoading('deleteComponent'+content.id)"  >
                                <v-loading :loader="'deleteComponent'+content.id" message='eliminando...'>
                                    <template slot='spinner'>
                                        <loading-spinner width="1em" height="1em"/>
                                    </template>
                                    <i class="far fa-trash-alt"></i>
                                </v-loading>
                            </button>
                        </template>-->

                    <!--<template v-else >
                        <div class="form-group">
                            <label for="formGroupExampleInput">Image</label>
                            <input class="form-control" type="file" @change.prevent="processFile($event)">
                        </div>
                         <div class="form-group">
                            <label for="formGroupExampleInput">Title</label>
                            <input class="form-control" type="text" v-model="draft.title">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Description</label>
                            <textarea class="form-control"  v-model="draft.description" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Button</label>
                            <input class="form-control" type="text"  v-model="draft.detailbutton.button_name">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" @click.prevent='save()' @click='$loading.startLoading("updateComponent")' :disabled='$loading.isLoading("updateComponent")'  >
                                <v-loading loader='updateComponent' message='guardando...'>
                                    <template slot='spinner'>
                                        <loading-spinner width="1em" height="1em"/>
                                    </template>
                                    <i class="fas fa-check"></i>
                                </v-loading>
                            </button>
                            <button class="btn btn-danger" @click.prevent="cancel(content,index)"><i class="fas fa-ban"></i></button>
                        </div>
                    </template>-->
            </div>
        </div>
        <b-modal ref="modal1" size="lg" :title="currentContent.modal_title" hide-footer>
            <p class="text-justify" d-block v-html="contentExpanded">
            </p>
            <b-btn class="mt-3" variant="outline-danger" block @click="hideModal">Cerrar</b-btn>
        </b-modal>
    </section>
</template>
<script>
let marked = require('marked');
    export default{
        props:['component'],
        data(){
            return{
                
                effect: 'fadeLeft', /*fadeOutDown*/
                currentContent: 0,
                showModal:false,
                someData:null,
                admin: true,
                draft:{},
                section:2
            }
        },
        mounted(){},
        methods:{
            edit(content){
                this.draft = clone(content);
            },
            save(){
                this.$store.dispatch('saveComponent',this.draft).then(() => {
                        var sfl=this;
                        setTimeout(function(){
                            sfl.$loading.endLoading('updateComponent');
                            sfl.draft = {};
                        },2000);
                })
                .catch(() => {
                    console.log('error');
                })
            },
            cancel(content,index){
                this.draft = {};
            },
            remove(idComponent){
                var obj={};
                obj.section=this.section;
                obj.idcomponent=idComponent;
                this.$store.dispatch('removeComponent',obj).then(() => {
                    this.draft = {};
                    this.$loading.endLoading('deleteComponent'+idComponent);         
                })
                .catch(() => {
                    console.log('error');
                })
            },

            //pendientes
            processFile(e){
                 var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                    this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;
                reader.onload = (e) => {
                    vm.draft.img = e.target.result;
                };
                reader.readAsDataURL(file);
            },

            //modal
            setCurrent(index){
                this.currentContent = this.contents[index]['detailmodal'];
                this.$refs.modal1.show()
            },

            hideModal(){
                this.$refs.modal1.hide()
            },
            shortExpanded(index) {
                marked.setOptions({
                renderer: new marked.Renderer(),
                gfm: true,
                tables: true,
                breaks: true,
                pedantic: false,
                sanitize: true,
                smartLists: true,
                smartypants: false,
                breaks: true,
                });
                var content = marked(this.contents[index] ? this.contents[index].modal_text : '').substring(0, 600) + '...'
                return content
            },addItem: function ()
            {
                this.classItem='hide';
                var slf=this;
                setTimeout(function(){
                    slf.items=[];
                    slf.items.push('hola');
                    slf.items.push('lala');
                    slf.classItem='show';
                },700);
                /*this.items.push('lala');
                return false;*/
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
</script>
<style>

    .col-compo{
        flex: 1 0 0;
    }

    @media (max-width: 991px){
       .col-compo{
         flex:none;
       }
    }
</style>
