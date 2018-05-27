<template>
    <div>
        <new-process :show="showModal" @close="showModal = false"/>
        <section id="process" class="py-5 zona-3">
                <div class=" py-5 col-sm-12 col-md-12">
                    <H2><strong>NUESTRO PROCESO</strong></H2>
                </div>
                <div class=" pr-0 pl-0">
                    <div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            
                            <button class="btn btn-danger" @click.prevent="showModal = true" v-if="admin">Add Process</button>
                        </div>
                    </div>
                    <div class="row">
                        <transition-group v-bind:name="effect" class="row">
                            <div class="col-sm-12 col-md-6 mb-1" v-for="(content,index) in contents" :key="index" tag="div">
                                        <!-- v-if="content.id != draft.id" -->
                                        <h4>
                                            <img alt class="img-fluid mr-2 process pic" :src="content.image" style="height: 54px; width=54px">
                                            "{{content.title}}"
                                        </h4>
                                        <!-- <template v-if="admin">
                                            <button type="button" class="btn btn-info ml-6 mr-6" @click="edit(content,index)"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="button" class="btn btn-danger ml-6 mr-6 " @click.prevent="remove(index)"><i class="far fa-trash-alt"></i></button>
                                        </template> -->

                                    <!-- <template v-else>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Image</label>
                                            <input class="form-control" type="file" @change.prevent="processFile($event)">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Title</label>
                                            <input class="form-control" type="text" v-model="draft.title">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" @click.prevent="save(content,index)"><i class="fas fa-check"></i></button>
                                            <button class="btn btn-danger" @click.prevent="cancel(content,index)"><i class="fas fa-ban"></i></button>
                                        </div>
                                    </template> -->
                            </div>
                        </transition-group>
                    </div>
                </div>
        </section>
    </div>
</template>

<script>
let marked = require('marked');
    export default{
        props:['component'],
        data(){
            return{
                effect: 'fadeLeft',
                currentContent: 0,
                showModal:false,
                someData:null,
                admin: false,
                section:3
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
        methods:{
            edit(content, index){
                 this.draft = clone(content);
            },
            save(content,index){
                 this.contents[index] = this.draft
                 this.draft = {};
            },
             cancel(content,index){
                 this.draft = {};
             },
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
            addItem: function (){
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
         }
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
